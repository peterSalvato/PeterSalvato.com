---
title: Project Roadmap
slug: project-roadmap
updated: 2025-04-17
summary: Current completion map of all Projects and Journal entries.
---

# 🗺️ Project & Journal Completion Tracker

Tracks the current status of all journal entries and projects for Phase 1 launch.

---

## ✅ Phase 1 Checklist

### 🔧 Core System Setup

- [x] Repo created and structure scaffolded
- [x] `build.php` fully implemented
- [x] Composer + Symfony YAML dependency installed
- [x] Routing (Project, Journal, JournalEntry) functional

### 📘 Journal Entries

| Date         | Title                        | Status     | Type     |
|--------------|------------------------------|------------|----------|
| 2025-04-12   | Savepoint Protocol           | ✅ Final    | Essay    |
| 2025-04-13   | On Building Systems          | ✅ Final    | Essay    |
| 2025-04-14   | The Order of the Ætherwright| ✅ Final    | Essay    |
| 2025-04-15   | Poetic Infrastructure        | 🟡 Draft    | Essay    |
| 2025-04-16   | Signals System               | ✅ Final    | Process  |
| 2025-04-17   | Self-Sufficient Design       | 🟡 Draft    | Essay    |
| 2025-04-18   | On Emergence                 | ⬜ Pending  | Essay    |

---

## 🧱 Project Scaffold

| Slug           | Title            | Layout     | Group               | Status   |
|----------------|------------------|------------|----------------------|----------|
| aiden-jae      | Aiden Jae        | Explainer  | CaseStudies          | ✅ Final |
| altrueism      | Altrueism        | Explainer  | CaseStudies          | ✅ Final |
| math-on-tape   | Math on Tape     | Gallery    | CaseStudies          | ✅ Final |
| echo-and-bone  | Echo & Stone     | Gallery    | Artifacts            | ⬜ Incomplete |
| the-deep-cuts  | The Deep Cuts    | Gallery    | Artifacts            | ⬜ Incomplete |
| photogeography | Photogeography   | Gallery    | ConceptualProjects   | ⬜ Incomplete |
| versograms     | Versograms       | Gallery    | ConceptualProjects   | ⬜ Incomplete |
| the-order-of-the-aetherwright | The Order of the Ætherwright | Explainer | Systems | ✅ Final |
| savepoint-protocol | Savepoint Protocol | Explainer | Systems | ✅ Final |

---

## 🧭 Routing Status

| Route                         | Status  |
|------------------------------|---------|
| `?page=journal`              | ✅ OK   |
| `?page=project&project=slug` | ✅ OK   |
| `?page=journalEntry&slug=...`| ✅ OK   |
| `?page=workshop/...`         | 🟡 Partial (awaits gallery layout) |
| `?page=systems/...`          | ✅ OK   |
| 404 fallback                 | ⬜ Missing |

---

## 🧩 Next Phase Targets

- [ ] Finalize journal copy: Poetic Infrastructure, Emergence
- [ ] Complete project data for all gallery-based layouts
- [ ] Implement `/Layout/layout.project.gallery.php`
- [ ] Add graceful 404 rendering
- [ ] Run `validate_structure.sh` once implemented

---

📌 Snapshot Tag: `savepoint-2025-04-17:scaffold-complete`