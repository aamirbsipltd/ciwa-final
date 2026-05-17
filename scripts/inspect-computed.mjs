#!/usr/bin/env node
/**
 * Dump computed styles for the program-card and testimonial-card to verify
 * whether our v0.9.1 CSS is being applied.
 */
import { mkdtempSync } from "node:fs";
import { spawn } from "node:child_process";
import { tmpdir } from "node:os";
import { join } from "node:path";

const BASE = process.argv[2] || "https://ciwa-final-production.up.railway.app";
const CHROME = "C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe";
const port = 9400 + Math.floor(Math.random() * 100);
const profile = mkdtempSync(join(tmpdir(), "chrome-i-"));

const chrome = spawn(CHROME, [
	"--headless=new", "--disable-gpu",
	`--remote-debugging-port=${port}`,
	`--user-data-dir=${profile}`,
	"--window-size=1920,1080",
	"--no-first-run",
	"about:blank",
]);

async function waitCDP() {
	for (let i = 0; i < 40; i++) {
		try { const r = await fetch(`http://localhost:${port}/json/version`); if (r.ok) return; } catch {}
		await new Promise(r => setTimeout(r, 200));
	}
	throw new Error("CDP not ready");
}
await waitCDP();

const tab = await (await fetch(`http://localhost:${port}/json/new?${encodeURIComponent("about:blank")}`, { method: "PUT" })).json();
const ws = new WebSocket(tab.webSocketDebuggerUrl);
await new Promise((r, j) => { ws.onopen = r; ws.onerror = j; });

let id = 1;
const pend = new Map();
ws.onmessage = (e) => { const m = JSON.parse(e.data.toString()); if (m.id && pend.has(m.id)) { pend.get(m.id)(m.result || m); pend.delete(m.id); } };
const send = (method, params = {}) => new Promise(r => { pend.set(id, r); ws.send(JSON.stringify({ id: id++, method, params })); });

await send("Page.enable");
await send("Runtime.enable");
await send("Page.navigate", { url: `${BASE}/?cb=${Date.now()}` });
await new Promise(r => setTimeout(r, 5000));

async function inspect(sel) {
	const r = await send("Runtime.evaluate", {
		expression: `
			(function(){
				const el = document.querySelector(${JSON.stringify(sel)});
				if (!el) return { error: 'not found' };
				const cs = getComputedStyle(el);
				return {
					selector: ${JSON.stringify(sel)},
					tag: el.tagName,
					classes: el.className,
					backgroundColor: cs.backgroundColor,
					borderTop: cs.borderTopWidth + ' ' + cs.borderTopStyle + ' ' + cs.borderTopColor,
					borderLeft: cs.borderLeftWidth + ' ' + cs.borderLeftStyle + ' ' + cs.borderLeftColor,
					borderRadius: cs.borderTopLeftRadius,
					padding: cs.paddingTop + ' ' + cs.paddingRight + ' ' + cs.paddingBottom + ' ' + cs.paddingLeft,
					color: cs.color,
					width: cs.width,
				};
			})()
		`,
		returnByValue: true,
	});
	return r.result?.value;
}

console.log(JSON.stringify(await inspect(".ciwa-program-card"), null, 2));
console.log(JSON.stringify(await inspect(".ciwa-program-card__icon img"), null, 2));
console.log(JSON.stringify(await inspect(".ciwa-testimonial-card"), null, 2));
console.log(JSON.stringify(await inspect(".ciwa-testimonial-card__quote"), null, 2));

ws.close();
chrome.kill();
process.exit(0);
