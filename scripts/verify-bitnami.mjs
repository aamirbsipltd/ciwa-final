#!/usr/bin/env node
// Verify a Bitnami-deployed CIWA site post-bootstrap:
//   1. Check root URL serves 200
//   2. Check Home page contains CIWA theme markup
//   3. Check all 20 inner pages exist and render
//   4. Screenshot Home for visual review
//
// Bitnami auto-installs WP and (via our post-init hook) auto-activates the theme,
// so we don't need to POST install.php or do a login flow — just curl the public URL.
//
// Usage:
//   node verify-bitnami.mjs https://your-app.up.railway.app

import { writeFileSync } from "node:fs";
import { execSync } from "node:child_process";

const BASE = process.argv[2]?.replace(/\/$/, "");
if (!BASE) {
	console.error("usage: node verify-bitnami.mjs https://your-app.up.railway.app");
	process.exit(1);
}

const paths = [
	"/",
	"/who-we-are/", "/leadership-governance/", "/board-of-directors/",
	"/awards-recognition/", "/annual-reports/", "/volunteer-with-us/",
	"/donate/", "/partner-with-us/", "/become-a-member/",
	"/settlement-supports/", "/employment-skills-training/",
	"/family-parenting-supports/", "/language-training/", "/language-training-2/",
	"/news/", "/events/", "/newsletter/", "/useful-links/", "/contact/",
];

console.log(`→ verifying ${BASE}`);
const results = [];
for (const p of paths) {
	try {
		const r = await fetch(BASE + p, { redirect: "follow" });
		const body = await r.text();
		const themeActive = body.includes("ciwa-topbar") || body.includes("ciwa-header") || body.includes("CIWA");
		const ok = r.status === 200 && themeActive;
		results.push({ path: p, status: r.status, themeActive, ok });
		console.log(`  ${ok ? "✓" : "✗"} ${p} (${r.status}${themeActive ? "" : ", no CIWA markup"})`);
	} catch (e) {
		results.push({ path: p, status: 0, themeActive: false, ok: false, err: e.message });
		console.log(`  ✗ ${p} (ERR: ${e.message})`);
	}
}

// Screenshot Home for visual review
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
	try {
		execSync(`"${chromePath}" --headless=new --disable-gpu --hide-scrollbars --window-size=1440,2400 --user-data-dir=C:\\tmp\\chrome-${nonce} --screenshot="${shotPath}" "${BASE}/"`, { stdio: "inherit" });
		console.log(`\n✓ screenshot → ${shotPath}`);
	} catch (e) {
		console.log(`⚠ screenshot failed: ${e.message}`);
	}
}

const failed = results.filter(r => !r.ok);
console.log(`\n=== SUMMARY ===`);
console.log(`URL: ${BASE}`);
console.log(`Admin: ${BASE}/wp-admin/`);
console.log(`User: ciwa-admin`);
console.log(`Pass: Xn1O4XNP6DOQlKpIxspr`);
console.log(`Pages OK: ${results.length - failed.length} / ${results.length}`);
if (failed.length) {
	console.log("Failed:");
	for (const f of failed) console.log(`  ${f.path} → status=${f.status} themeActive=${f.themeActive}`);
}
writeFileSync("C:\\tmp\\ciwa-railway-credentials.txt",
	`URL: ${BASE}\nAdmin: ${BASE}/wp-admin/\nUser: ciwa-admin\nPass: Xn1O4XNP6DOQlKpIxspr\n`);
console.log(`\nCredentials saved → C:\\tmp\\ciwa-railway-credentials.txt`);
process.exit(failed.length ? 1 : 0);
