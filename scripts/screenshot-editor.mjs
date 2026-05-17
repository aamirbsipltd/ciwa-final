#!/usr/bin/env node
// Log in to wp-admin, navigate to the Home page editor, screenshot it.
// Use Chrome with --remote-debugging-port to drive via CDP.
// Simpler approach: do cookie-based login via fetch then visit editor URL with headless chrome carrying the session cookie.

import { writeFileSync, mkdtempSync, existsSync } from "node:fs";
import { execSync } from "node:child_process";
import { tmpdir } from "node:os";
import { join } from "node:path";

const BASE = process.argv[2]?.replace(/\/$/, "") || "https://ciwa-final-production.up.railway.app";
const USER = process.argv[3] || "ciwa-admin";
const PASS = process.argv[4] || "Xn1O4XNP6DOQlKpIxspr";

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
			"User-Agent": "ciwa-screenshot-editor/1.0",
			"Cookie": cookieHeader(),
			...(opts.headers ?? {}),
		},
	});
	absorb(res);
	return res;
}

// Login
console.log("→ logging in as", USER);
await req("/wp-login.php");
jar.set("wordpress_test_cookie", "WP%20Cookie%20check");
const loginRes = await req("/wp-login.php", {
	method: "POST",
	headers: { "Content-Type": "application/x-www-form-urlencoded" },
	body: new URLSearchParams({
		log: USER, pwd: PASS, "wp-submit": "Log In",
		redirect_to: BASE + "/wp-admin/", testcookie: "1",
	}).toString(),
});
if (loginRes.status !== 302) {
	console.error("  ✗ login failed, status", loginRes.status);
	process.exit(2);
}
console.log("  ✓ login 302");

// Find Home page ID via REST
const pages = await fetch(BASE + "/wp-json/wp/v2/pages?slug=home&_fields=id,slug,title", {
	headers: { Cookie: cookieHeader() },
}).then(r => r.json());
const home = Array.isArray(pages) ? pages.find(p => p.slug === "home") : null;
if (!home) {
	console.error("  ✗ home page not found via REST");
	process.exit(3);
}
console.log("  ✓ home id =", home.id, "title:", home.title?.rendered);

// Write cookies to a file Chrome can read (header-style)
// Easier: hit the editor URL via Chrome with --header injection… not supported by --screenshot.
// Workaround: build a tiny HTML harness that sets cookies via a redirector page. Easier still:
// Use puppeteer? Not installed. Use Chrome --remote-debugging-port + CDP.
//
// Simplest practical: use chrome's --user-data-dir profile with a saved cookies SQLite. Hard.
//
// Final approach: spit out the editor URL + cookie string, user pastes into browser.
//
// Actually for headless screenshots with auth, we can use a Page-with-Set-Cookie meta or
// just open Chrome with --auth-server-allowlist + Authorization header. Easiest CDP route:
// run chrome with --remote-debugging-port then drive via fetch to /json/list and POSTing
// Page.captureScreenshot. Let me implement that.

const port = 9223 + Math.floor(Math.random() * 100);
const profile = mkdtempSync(join(tmpdir(), "chrome-edit-"));
const chromeExe = "C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe";

// Build cookies arg-string for Chrome's --header-policy... actually just use cdp.
const chromeProc = execSync; // we'll use spawn from child_process below
const { spawn } = await import("node:child_process");
const chrome = spawn(chromeExe, [
	"--headless=new",
	"--disable-gpu",
	"--hide-scrollbars",
	`--remote-debugging-port=${port}`,
	`--user-data-dir=${profile}`,
	"--window-size=1440,2000",
	"--no-first-run",
	"--no-default-browser-check",
	"about:blank",
], { detached: false });

// Wait for chrome's CDP to be ready
async function waitDevtools(maxMs = 8000) {
	const start = Date.now();
	while (Date.now() - start < maxMs) {
		try {
			const r = await fetch(`http://localhost:${port}/json/version`);
			if (r.ok) return await r.json();
		} catch {}
		await new Promise(r => setTimeout(r, 200));
	}
	throw new Error("Chrome CDP didn't start");
}
const ver = await waitDevtools();
console.log("  ✓ chrome CDP ready:", ver.Browser);

// Open new tab pointing to the editor
const tabRes = await fetch(`http://localhost:${port}/json/new?${encodeURIComponent("about:blank")}`, { method: "PUT" });
const tab = await tabRes.json();
const wsUrl = tab.webSocketDebuggerUrl;

// Drive Chrome via the websocket. Use plain WebSocket (built into Node ≥ 22).
const ws = new WebSocket(wsUrl);
await new Promise((res, rej) => { ws.onopen = res; ws.onerror = rej; });

let nextId = 1;
const pending = new Map();
ws.onmessage = (ev) => {
	try {
		const m = JSON.parse(ev.data.toString());
		if (m.id && pending.has(m.id)) {
			pending.get(m.id)(m.result || m);
			pending.delete(m.id);
		}
	} catch {}
};
function send(method, params = {}) {
	const id = nextId++;
	return new Promise(resolve => {
		pending.set(id, resolve);
		ws.send(JSON.stringify({ id, method, params }));
	});
}

// Set cookies from our jar
const cookies = [...jar.entries()].map(([name, value]) => ({
	name, value,
	domain: new URL(BASE).hostname,
	path: "/", httpOnly: false, secure: true, sameSite: "Lax",
}));
await send("Network.enable");
await send("Network.setCookies", { cookies });
console.log("  ✓ injected", cookies.length, "cookies");

// Navigate to the editor
const editorURL = `${BASE}/wp-admin/post.php?post=${home.id}&action=edit`;
console.log("  → navigating to", editorURL);
await send("Page.enable");
await send("Page.navigate", { url: editorURL });
// Wait for load
await new Promise(r => setTimeout(r, 8000));

// Screenshot
const shot = await send("Page.captureScreenshot", { format: "png", captureBeyondViewport: true });
const png = Buffer.from(shot.data, "base64");
const out = "C:\\tmp\\gutenberg-home-editor.png";
writeFileSync(out, png);
console.log("  ✓ screenshot saved:", out, png.length, "bytes");

ws.close();
chrome.kill();
process.exit(0);
