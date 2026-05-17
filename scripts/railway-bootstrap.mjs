#!/usr/bin/env node
// Bootstrap a fresh WordPress install on Railway end-to-end:
//   1. POST the install wizard form
//   2. Log in, grab nonces
//   3. Activate the ciwa-final theme
//   4. Verify Home + 20 inner pages render (HTTP 200 + content sniff)
//   5. Save a screenshot of Home via headless Chrome (if available)
//
// Usage:
//   node railway-bootstrap.mjs https://YOUR-APP.up.railway.app

import { writeFileSync } from "node:fs";
import { execSync } from "node:child_process";

const BASE = process.argv[2]?.replace(/\/$/, "");
if (!BASE) {
	console.error("usage: node railway-bootstrap.mjs https://your-app.up.railway.app");
	process.exit(1);
}

const ADMIN = {
	user: "ciwa-admin",
	pass: "CIWA-" + Math.random().toString(36).slice(2, 10) + "-" + Date.now().toString(36),
	email: "aamir.farrukh@gmail.com",
	title: "CIWA",
};

const jar = new Map();
function cookieHeader() {
	return [...jar.entries()].map(([k, v]) => `${k}=${v}`).join("; ");
}
function absorbCookies(res) {
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
		redirect: "manual",
		...opts,
		headers: {
			"User-Agent": "ciwa-bootstrap/1.0",
			Cookie: cookieHeader(),
			...(opts.headers ?? {}),
		},
	});
	absorbCookies(res);
	return res;
}

console.log(`→ target: ${BASE}`);

// Step 1: install wizard
console.log("→ step 1: POST install wizard");
const installRes = await req("/wp-admin/install.php?step=2", {
	method: "POST",
	headers: { "Content-Type": "application/x-www-form-urlencoded" },
	body: new URLSearchParams({
		weblog_title: ADMIN.title,
		user_name: ADMIN.user,
		admin_password: ADMIN.pass,
		admin_password2: ADMIN.pass,
		pass1_text: ADMIN.pass,
		pw_weak: "on",
		admin_email: ADMIN.email,
		blog_public: "0",
		language: "",
		Submit: "Install WordPress",
	}).toString(),
});
const installBody = await installRes.text();
if (installBody.includes("Success") || installBody.includes("Already Installed") || installRes.status === 302) {
	console.log("  ✓ install ok (status " + installRes.status + ")");
} else {
	console.error("  ✗ install failed, status", installRes.status);
	writeFileSync("install-error.html", installBody);
	process.exit(2);
}

// Step 2: log in
console.log("→ step 2: log in as " + ADMIN.user);
const loginRes = await req("/wp-login.php", {
	method: "POST",
	headers: { "Content-Type": "application/x-www-form-urlencoded" },
	body: new URLSearchParams({
		log: ADMIN.user,
		pwd: ADMIN.pass,
		"wp-submit": "Log In",
		redirect_to: BASE + "/wp-admin/",
		testcookie: "1",
	}).toString(),
});
if (loginRes.status !== 302) {
	console.error("  ✗ login failed, status", loginRes.status);
	process.exit(3);
}
console.log("  ✓ logged in");

// Step 3: activate theme (via wp-admin themes.php?action=activate&stylesheet=ciwa-final)
console.log("→ step 3: activate ciwa-final theme");
// First we need a _wpnonce for the activate action. Fetch themes.php and scrape it.
const themesPageRes = await req("/wp-admin/themes.php");
const themesHtml = await themesPageRes.text();
const nonceMatch = themesHtml.match(/themes\.php\?action=activate&amp;stylesheet=ciwa-final&amp;_wpnonce=([a-f0-9]+)/i);
if (!nonceMatch) {
	console.error("  ✗ could not find activate nonce for ciwa-final — is the theme present?");
	writeFileSync("themes-page.html", themesHtml);
	process.exit(4);
}
const activateRes = await req(`/wp-admin/themes.php?action=activate&stylesheet=ciwa-final&_wpnonce=${nonceMatch[1]}`);
if (activateRes.status !== 302) {
	console.error("  ✗ activate failed, status", activateRes.status);
	process.exit(5);
}
console.log("  ✓ theme activated → seed-pages.php should now fire");

// Step 4: verify Home + key inner pages
console.log("→ step 4: verify pages");
const paths = [
	"/", "/who-we-are/", "/leadership-governance/", "/board-of-directors/",
	"/awards-recognition/", "/annual-reports/", "/volunteer-with-us/",
	"/donate/", "/partner-with-us/", "/become-a-member/",
	"/settlement-supports/", "/employment-skills-training/",
	"/family-parenting-supports/", "/language-training/", "/language-training-2/",
	"/news/", "/events/", "/newsletter/", "/useful-links/", "/contact/",
];
const results = [];
for (const p of paths) {
	const r = await fetch(BASE + p, { redirect: "follow" });
	const body = await r.text();
	const hasHeader = body.includes("ciwa-topbar") || body.includes("CIWA");
	results.push({ path: p, status: r.status, ok: r.status === 200 && hasHeader });
	console.log(`  ${r.status === 200 && hasHeader ? "✓" : "✗"} ${p} (${r.status})`);
}

// Step 5: screenshot Home
console.log("→ step 5: screenshot Home (if Chrome available)");
const chromePaths = [
	"C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe",
	"C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe",
];
let chromePath;
for (const p of chromePaths) {
	try { execSync(`"${p}" --version`, { stdio: "ignore" }); chromePath = p; break; } catch {}
}
if (chromePath) {
	const shotPath = "C:\\tmp\\ciwa-railway-home.png";
	const nonce = Date.now();
	execSync(`"${chromePath}" --headless=new --disable-gpu --hide-scrollbars --window-size=1440,2400 --user-data-dir=C:\\tmp\\chrome-${nonce} --screenshot="${shotPath}" "${BASE}/"`, { stdio: "inherit" });
	console.log(`  ✓ screenshot saved → ${shotPath}`);
} else {
	console.log("  ⚠ Chrome not found, skipping screenshot");
}

// Final report
const failed = results.filter(r => !r.ok);
console.log("\n=== SUMMARY ===");
console.log(`URL: ${BASE}`);
console.log(`Admin: ${BASE}/wp-admin/`);
console.log(`User: ${ADMIN.user}`);
console.log(`Pass: ${ADMIN.pass}`);
console.log(`Pages OK: ${results.length - failed.length} / ${results.length}`);
if (failed.length) {
	console.log("Failed pages:");
	for (const f of failed) console.log(`  ${f.path} → ${f.status}`);
}
writeFileSync("C:\\tmp\\ciwa-railway-credentials.txt",
	`URL: ${BASE}\nAdmin: ${BASE}/wp-admin/\nUser: ${ADMIN.user}\nPass: ${ADMIN.pass}\n`);
console.log(`\nCredentials saved → C:\\tmp\\ciwa-railway-credentials.txt`);
