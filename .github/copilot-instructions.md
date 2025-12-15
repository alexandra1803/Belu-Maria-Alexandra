<!-- Generated: concise Copilot instructions for this repository. If you already had content, merge manually. -->
# Copilot instructions — quick start for this project

This is a small static volunteering site (HTML/CSS/JS, one PHP placeholder). Below are the minimal, actionable conventions and hotspots that an AI coding agent should know to be immediately productive.

- Big picture
  - The site is a client-side static site: pages are individual HTML files (e.g. `pagina-principala.html`, `pagina-login.html`, `atelier-educational-pentru-copii.html`). There is no build step.
  - Dynamic behaviour is implemented in vanilla JavaScript embedded in pages. Key data flows are in `pagina-principala.html` (an `activities` array used to render cards) and `pagina-login.html` (localStorage-based user handling).

- Hotspots & examples (scan these first)
  - `pagina-principala.html` — activities array: each entry has {name, description, img, form}. Use this mapping when adding new activity pages or linking buttons to forms.
  - `pagina-login.html` — authentication is purely client-side using localStorage key `voluntariat_users_v1`. Search for that string to find and update auth behavior.
  - `folder2.php` — currently empty; treat as a placeholder for server-side logic only if you add backend code.
  - `folder1.css` — project-level CSS file (some pages use internal styles); prefer updating this for site-wide styles where appropriate.

- Patterns and conventions
  - Files are named in Romanian and map directly to routes (open `pagina-principala.html` and click cards to confirm `form` file names). Keep filenames and links consistent.
  - Scripts are page-scoped. When adding logic, prefer small, focused functions and keep DOM-manipulating code next to the page that uses it.
  - Accessibility is used in `pagina-login.html` (ARIA attributes). Preserve `aria-*` attributes when editing tabs/forms.

- Developer workflows (how to run/test)
  - No build system. To preview locally open `pagina-principala.html` in a browser or run a simple static server from the project root. Example (PowerShell):

```powershell
# from project root
python -m http.server 8000
# then open http://localhost:8000/pagina-principala.html
```

  - Debugging: use browser DevTools. For the login flow, inspect `localStorage` and the key `voluntariat_users_v1` to view registered users.

- Do / Don’t (repo-specific)
  - Do: Update `activities` in `pagina-principala.html` when adding new pages; keep the `form` filename exact. Use existing image URLs or add local assets.
  - Don’t: Introduce server-side assumptions unless you add and wire a backend; `folder2.php` is empty and adding server code will require running PHP locally.

- Quick search terms to use
  - voluntariat_users_v1 (localStorage key)
  - activities (array in `pagina-principala.html`)
  - "Înscrie-te" (button text used by cards)

If anything in this file is unclear or you want me to expand a section (examples, more file references, or merge into an existing Copilot doc if you have one), tell me which parts to adjust.
