#!/usr/bin/env node
// Log into Bitnami-deployed WP and activate the ciwa-final theme.
//
// Usage:
//   node activate-theme.mjs <base-url> <user> <pass>

import { writeFileSync } from "node:fs";

const [BASE_RAW, USER, PASS] = process.argv.slice(2);
if (!BASE_RAW || !USER || !PASS) {
	console.error("usage: node activate-theme.mjs https://site user pass");
	process.exit(1);
}
const BASE = BASE_RAW.replace(/\/$/, "");

const jar = new Map();
function cookieHeader() { return [...jar.entries()].map(([k, v]) => `${k}=${v}`).join("; "); }
function absorb(res) {
	const raw = res.headers.getSetCookie?.() ?? [];
	for (const line of raw) {
		const [pair] = line.split(";");
		const eq = pair.indexOf("=");
		if (eq > 0) jar.set(pair.slice(0, eq).trim(), pair.slice(eq + 1).trim());
	}
}
async function req(path, opts = {}) {
	const url = path.startsWith("http") ? path : BASE + path;
	const res = await fetch(url, {
		redirect: "manual", ...opts,
		headers: {
			"User-Agent": "ciwa-activate/1.0",
			"Cookie": cookieHeader(),
			...(opts.headers ?? {}),
		},
	});
	absorb(res);
	return res;
}

// Step 1: GET login page to seed cookies + get csrf state if any
console.log("→ GET /wp-login.php");
await req("/wp-login.php");
// WP requires a "testcookie" round-trip — set it manually
jar.set("wordpress_test_cookie", "WP%20Cookie%20check");

// Step 2: POST login
console.log("→ POST /wp-login.php");
const loginRes = await req("/wp-login.php", {
	method: "POST",
	headers: { "Content-Type": "application/x-www-form-urlencoded" },
	body: new URLSearchParams({
		log: USER, pwd: PASS, "wp-submit": "Log In",
		redirect_to: BASE + "/wp-admin/", testcookie: "1",
	}).toString(),
});
console.log(`  login status: ${loginRes.status}`);
if (loginRes.status !== 302) {
	const body = await loginRes.text();
	writeFileSync("login-error.html", body);
	console.error("  login failed — wrote login-error.html");
	process.exit(2);
}

// Step 3: GET themes.php to list themes + find activate nonce for ciwa-final
console.log("→ GET /wp-admin/themes.php");
const themesRes = await req("/wp-admin/themes.php");
const themesHtml = await themesRes.text();
writeFileSync("themes-page.html", themesHtml);
// Check theme is installed via the rendered theme-name id pattern (set by WP)
if (!themesHtml.includes('id="ciwa-final-name"')) {
	console.error("  ✗ ciwa-final theme is NOT installed on the site.");
	process.exit(3);
}
console.log("  ✓ ciwa-final theme is installed");

// WP encodes & as &#038; in themes.php activate links (not &amp;)
const nonceMatch = themesHtml.match(/themes\.php\?action=activate(?:&#038;|&amp;|&)stylesheet=ciwa-final(?:&#038;|&amp;|&)_wpnonce=([a-f0-9]+)/i);
if (!nonceMatch) {
	console.error("  ✗ could not find activate nonce — is theme already active?");
	if (themesHtml.includes("ciwa-final") && themesHtml.includes("Active")) {
		console.log("  it appears ciwa-final is already active");
		process.exit(0);
	}
	process.exit(4);
}

// Step 4: POST/GET activate URL
console.log(`→ activating ciwa-final (nonce: ${nonceMatch[1].slice(0, 8)}...)`);
const activateRes = await req(`/wp-admin/themes.php?action=activate&stylesheet=ciwa-final&_wpnonce=${nonceMatch[1]}`);
console.log(`  activate status: ${activateRes.status}`);
if (activateRes.status !== 302 && activateRes.status !== 200) {
	console.error(`  ✗ activate failed (expected 302)`);
	process.exit(5);
}

// Step 5: Verify
const verifyRes = await fetch(BASE + "/", { redirect: "follow" });
const verifyHtml = await verifyRes.text();
const hasCiwa = verifyHtml.includes("ciwa-") || verifyHtml.includes("CIWA");
const hasTTF = verifyHtml.includes("twentytwentyfive");
console.log(`\n=== verification ===`);
console.log(`  HTTP: ${verifyRes.status}`);
console.log(`  CIWA markup: ${hasCiwa ? "YES" : "no"}`);
console.log(`  TTF markup: ${hasTTF ? "STILL PRESENT — activation may have failed" : "no (theme switched)"}`);
console.log(`  → site: ${BASE}/`);
console.log(`  → admin: ${BASE}/wp-admin/`);
