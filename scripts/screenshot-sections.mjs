#!/usr/bin/env node
/**
 * Render the live frontend at 1920px wide and crop the two Path-B sections
 * (programs + voices) into separate PNGs for STATUS.md.
 *
 * Crops the full-page screenshot by scanning the rendered HTML for the
 * section's wrapper element and reading getBoundingClientRect via CDP.
 *
 * Usage:
 *   node scripts/screenshot-sections.mjs <url>
 */
import { mkdtempSync, writeFileSync } from "node:fs";
import { spawn } from "node:child_process";
import { tmpdir } from "node:os";
import { join } from "node:path";

const BASE = process.argv[2] || "https://ciwa-final-production.up.railway.app";
const CHROME = "C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe";
const port = 9300 + Math.floor(Math.random() * 100);
const profile = mkdtempSync(join(tmpdir(), "chrome-sect-"));

const chrome = spawn(CHROME, [
	"--headless=new",
	"--disable-gpu",
	"--hide-scrollbars",
	`--remote-debugging-port=${port}`,
	`--user-data-dir=${profile}`,
	"--window-size=1920,1080",
	"--force-device-scale-factor=1",
	"--no-first-run",
	"--no-default-browser-check",
	"about:blank",
]);

async function waitCDP(maxMs = 8000) {
	const start = Date.now();
	while (Date.now() - start < maxMs) {
		try {
			const r = await fetch(`http://localhost:${port}/json/version`);
			if (r.ok) return await r.json();
		} catch {}
		await new Promise((r) => setTimeout(r, 200));
	}
	throw new Error("Chrome CDP not ready");
}
await waitCDP();

const tabRes = await fetch(`http://localhost:${port}/json/new?${encodeURIComponent("about:blank")}`, { method: "PUT" });
const tab = await tabRes.json();
const ws = new WebSocket(tab.webSocketDebuggerUrl);
await new Promise((res, rej) => { ws.onopen = res; ws.onerror = rej; });

let nextId = 1;
const pending = new Map();
ws.onmessage = (ev) => {
	const m = JSON.parse(ev.data.toString());
	if (m.id && pending.has(m.id)) { pending.get(m.id)(m.result || m); pending.delete(m.id); }
};
function send(method, params = {}) {
	const id = nextId++;
	return new Promise((resolve) => {
		pending.set(id, resolve);
		ws.send(JSON.stringify({ id, method, params }));
	});
}

await send("Page.enable");
await send("DOM.enable");
await send("Runtime.enable");
const cb = Date.now();
await send("Page.navigate", { url: `${BASE}/?cb=${cb}` });
// wait for load
await new Promise((r) => setTimeout(r, 5000));

async function snapshotSection(selector, outName) {
	const rectResult = await send("Runtime.evaluate", {
		expression: `(function(){const el=document.querySelector(${JSON.stringify(selector)});if(!el)return null;const r=el.getBoundingClientRect();const top=window.scrollY+r.top;return {x:Math.round(r.left),y:Math.round(top),width:Math.round(r.width),height:Math.round(r.height)};})()`,
		returnByValue: true,
	});
	const rect = rectResult.result?.value;
	if (!rect) {
		console.error(`  ✗ ${selector} not found in DOM`);
		return;
	}
	console.log(`  ${selector}: ${rect.width}×${rect.height} at y=${rect.y}`);
	const shot = await send("Page.captureScreenshot", {
		format: "png",
		clip: { x: rect.x, y: rect.y, width: rect.width, height: rect.height, scale: 1 },
		captureBeyondViewport: true,
	});
	const png = Buffer.from(shot.data, "base64");
	writeFileSync(outName, png);
	console.log(`  ✓ wrote ${outName} (${png.length} bytes)`);
}

console.log(`→ ${BASE} @ 1920×1080`);
await snapshotSection(".ciwa-programs", "C:\\tmp\\ciwa-final\\screenshots\\v091-programs.png");
await snapshotSection(".ciwa-voices", "C:\\tmp\\ciwa-final\\screenshots\\v091-voices.png");

ws.close();
chrome.kill();
process.exit(0);
