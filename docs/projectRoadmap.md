## 📘 `docs/BUILD-PLAN.md`  

**PeterSalvato.com — Canonical System Architecture**  
_Last updated: 2025-04-16 — Savepoint Locked ✅_

---

# 🧠 Purpose

PeterSalvato.com is a semantic publishing system designed to:

- Preserve symbolic and structural creative work  
- Publish essays, explainers, and visual projects with schema-driven clarity  
- Enable long-term authorship and institutional visibility  
- Prevent entropy across assistants, rebuilds, or resets

This site is not a brand. It is a modular infrastructure.

---

# 🧱 Folder Structure

```
/src/
  /Journal/YYYY-MM-DD-Title/
    Entry.md
    Images/
    Meta.php

  /Projects/ProjectName/
    Config.yaml
    Images/
    Data.php

  /Static/
    About.md
    Contact.md
    Home.md
    Signals.md

  /Router/
    JournalEntry.php
    Project.php
    Static.php

  /Layout/
    Layout.php

  /Partials/
    Head.php, Nav.php, Footer.php

/scripts/
  /journal/
  /projects/
  /static/
  build.php
  validate_structure.sh
  schema.php
  navBuilder.php
  indexBuilder.php

/docs/
  BUILD-PLAN.md
```

---

# ✍️ Content ==================================================================            
| Type       | Folder       | Format                     | Output              |
|------------|--------------|----------------------------|---------------------|
| Journal    | `/Journal/`  | `Entry.md` + frontmatter   | `Meta.php`          |
| Project    | `/Projects/` | `Config.yaml`              | `Data.php`          |
| Static     | `/Static/`   | `.md` (or `.php`)          | Rendered directly   |
| Signals    | (reserved)   | TBD (Phase 7)              | Not yet implemented |
| Savepoints | Any Markdown | `<Savepoint>` block        | Styled output       |
|==============================================================================|
---

# 🔀 Group vs Layout System

Projects are classified by two independent axes:

- `group:` → symbolic category (e.g. `CaseStudies`, `Systems`)  
- `layout:` → rendering mode (`Explainer`, `Gallery`)

All projects live in `/Projects/`.  
Group controls **nav/index**, layout controls **frontend behavior**.

---

# 📜 Schemas

### Journal Entry (`Entry.md`)
```yaml
title: string
date: YYYY-MM-DD
slug: kebab-case
tags: [string, string]
status: draft | published
summary: string
```

### Project (`Config.yaml`)
```yaml
title: string
slug: kebab-case
group: CaseStudies | ConceptualProjects | Artifacts | Systems
layout: Explainer | Gallery
summary: string

sections:    # if Explainer
  - title: string
    text: string (Markdown)
    image: Images/foo.png
    imageAlt: string
    caption: optional

images:      # if Gallery
  - src: Images/foo.png
    alt: string
    caption: optional
```

> ⚠️ `Config.yaml` is the canonical content source.  
> It must be authored intentionally — not scaffolded or generated.

---

# 🖼 Image Viewer Component

- Used in both `Explainer` and `Gallery` layouts  
- Supports: `src`, `alt`, `caption`  
- Lazy loads images  
- Lightbox/modal built in **vanilla JS**  
- Output: `<figure><img><figcaption>`  
- Componentized in PHP + JS  
- Final behavior designed in Phase 4

---

# 🔍 Routing & URLs

| URL | Route |
|-----|-------|
| `/journal/on-building-systems` | JournalEntry router |
| `/project/math-on-tape` | Project router |
| `/about` | Static router |
| `/systems/savepoint-protocol` | Group alias (same router) |

### Clean URLs via `.htaccess`
```apache
RewriteRule ^journal/(.*)$ /index.php?page=journalEntry&entry=$1 [L]
RewriteRule ^project/(.*)$ /index.php?page=project&project=$1 [L]
RewriteRule ^systems/(.*)$ /index.php?page=project&project=$1 [L]
RewriteRule ^(about|contact|home|signals)$ /index.php?page=$1 [L]
```

---

# 🎨 Rendering

- All pages routed through `Layout/Layout.php`  
- Markdown parser used across all `.md` and `text:` fields  
- Layout switches based on `layout:`  
- Savepoints parsed as semantic blocks  
- Image Viewer reused in both layouts

---

# ⚙️ Build & Validation

### `build.php`
- Parses journal and project files
- Validates against schema
- Generates `Meta.php` and `Data.php`
- Enforces slug uniqueness
- Skips drafts

### `validate_structure.sh`
- Verifies:
  - PascalCase folders
  - kebab-case slugs
  - Required fields
  - Enum validity
  - Alt/caption presence
  - Slug collision

---

# 🧩 Components

| Component | Purpose |
|----------|---------|
| `ImageViewer` | Used by Gallery + Explainer |
| `SavepointRenderer` | Renders styled `<Savepoint>` |
| `MarkdownRenderer` | Shared parser (Journal, Static, Explainers) |
| `NavRenderer` | (Optional) navBuilder-generated |
| `AudioEmbed` | Iframe only, external (Spotify, etc.) |

---

# 🗺 Navigation & Indexing

- Canonical `nav.php` returns site-wide structure
- Project indexes grouped by `group:`
- Journal index sorted by date
- Optional builders:
  - `indexBuilder.php`
  - `navBuilder.php`
- `groups.yaml` (optional) adds label, description per group

---

# 🔐 Savepoint Support

```plaintext
<Savepoint
  protocol_version:3.0
  category:[symbolic_structure]
  function:[state_marker]
  timestamp:2025-04-16T23:55:00-04:00
/>
```

- Used in any Markdown content  
- Styled and preserved for clarity and traversal  
- Schema enforced (version, timestamp required)

---

# ⚠️ Coding Conventions

- All slugs → `kebab-case`  
- All folders → `PascalCase`  
- No HTML inside YAML  
- Minimal HTML allowed in Markdown (`<figure>`, `<div>`)  
- JS hooks use `data-*`, not class names  
- All structured output rendered via PHP, not interpolated

---

# 🚧 Phase Roadmap

## 🔒 Phase 0: Lockpoint
- [x] Savepoint declared
- [x] Folder conventions enforced
- [x] Scaffolds in place

---

## 🧱 Phase 1: Content Scaffolding
- [x] Journal & Project folders created
- [x] Static files (`about.md`, etc.) written
- [x] Placeholder `Config.yaml` per project

---

## 📚 Phase 1.5: Project Content Completion

> Populate each project’s `Config.yaml` with finalized written content.

### Projects:
- [ ] SavepointProtocol  
- [ ] MathOnTape  
- [ ] Altrueism  
- [ ] AidenJae  
- [ ] OrderOfTheAetherwright  
- [ ] TheDeepCuts  
- [ ] EchoAndBone  
- [ ] Photogeography  
- [ ] Versograms  

### Tasks:
- [ ] Set `title`, `slug`, `group`, `layout`
- [ ] Add full `sections:` or `images:` with text
- [ ] Verify all image paths exist
- [ ] Write `alt:` for every image
- [ ] Add `caption:` (optional)
- [ ] Fill in `summary:` (index + SEO)
- [ ] Run `validate_structure.sh` to confirm completion

---

## 🛠 Phase 2: Build & Validate
- [ ] `build.php`
- [ ] `schema.php`
- [ ] `validate_structure.sh`
- [ ] Slug collision detection

---

## 🧭 Phase 3: Routing
- [ ] JournalEntry router
- [ ] Project router
- [ ] Static page router
- [ ] 404 fallback
- [ ] `.htaccess` rewrite rules

---

## 🎨 Phase 4: Rendering
- [ ] Layout shell + injection
- [ ] Markdown rendering engine
- [ ] Savepoint styling block
- [ ] Image Viewer component (PHP + vanilla JS)

---

## 🧭 Phase 5: Navigation & Indexes
- [ ] Journal index
- [ ] Project group indexes
- [ ] `navBuilder.php`
- [ ] Optional tag filters

---

## 🛡 Phase 6: System Hardening
- [ ] Manifest / registry of all slugs
- [ ] Accessibility review
- [ ] Meta + Open Graph support
- [ ] Image optimization
- [ ] Print/export CSS
- [ ] Build cache logic

---

## 🚀 Phase 7: Post-Launch Enhancements
- [ ] RSS feed for Journal
- [ ] Signals system
- [ ] Savepoint diff/changelog viewer
- [ ] CLI tooling (`--entry`, `--group`)
- [ ] Test coverage

---

# ⏱ Timeline Estimate

| Phase | Time |
|-------|------|
| 0–1.5 | 2–3 days |
| 2–4   | 5–6 days |
| 5–6   | 3–4 days |
| 7     | Optional |

---

# 🔖 Savepoint

```plaintext
<Savepoint
  protocol_version:3.0
  category:[master_plan]
  function:[final_alignment]
  timestamp:2025-04-16T23:55:00-04:00
  # System logic, routing, structure, rendering, and content schema are now complete.
  # This plan is the single source of truth. All assistants and contributors must follow it.
  #
/>
```

---

Let me know if you want this output as a `touch + cat` command to write into your repo at `docs/BUILD-PLAN.md`.