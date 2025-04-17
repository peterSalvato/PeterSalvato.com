# 🛣️ Roadmap – Build Checklist to Launch

This is the **active step-by-step build sequence** for PeterSalvato.com.

At the **end of each session**, update this file with ✅ checkmarks.

---

## ✅ Phase 0: Bootstrapping

- [x] Create clean repo and `/docs` structure
- [x] Define architectural rules (layout, casing, config sources)
- [x] Write savepoint constraints
- [x] Establish canonical nav structure

---

## 🚧 Phase 1: Foundation Scripts

- [ ] `scripts/build.php` – generates `Data.php` / `Meta.php` from `Config.yaml`
- [ ] `scripts/validate_structure.sh` – validates folder names, casing, required keys
- [ ] `scripts/bootstrap.sh` – scaffolds project or journal folder from template
- [ ] `scripts/reset.sh` – clears generated files safely

---

## 🚧 Phase 2: Routing Layer

- [ ] `/Router/Project.php` – loads a project from slug or query param
- [ ] `/Router/JournalEntry.php` – loads journal entry by date-slug
- [ ] `/Router/Journal.php` – lists all journal entries
- [ ] `/public/index.php` – handles `?page=...` param, dispatches router

---

## 🚧 Phase 3: Templating & Layouts

- [ ] `Layout/Layout.php` – handles layout() and slot() logic
- [ ] `Partials/Head.php`, `Nav.php`, `Footer.php` – site shell
- [ ] Create `Explainer` and `Gallery` layout templates
- [ ] Create static fallback templates for export

---

## 🚧 Phase 4: Content Conversion

- [ ] Convert `src/Projects/*/Config.yaml` → `Data.php`
- [ ] Convert `src/Journal/*/Config.yaml` → `Meta.php`
- [ ] Ensure image paths resolve properly in layouts
- [ ] Add fallback rendering for empty fields

---

## ✅ Phase 5: System Enforcement

- [x] Write `SAVEPOINT.md` with immutables
- [x] Write this roadmap to enforce sequencing
- [ ] Lock casing rules and field names
- [ ] Add CI/lint step for `validate_structure.sh`

---

## 🏁 Final Phase: Static Export & Deployment

- [ ] CLI script to render full site to `/static/`
- [ ] Export `index.html` for each project + journal
- [ ] Minify output HTML
- [ ] Push to Netlify or static host of choice
