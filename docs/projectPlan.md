---
title: Project Plan
slug: project-plan
updated: 2025-04-17
summary: Core structure, principles, casing rules, and assistant constraints.
---

# 🧱 PeterSalvato.com — System Architecture & Plan

This file contains the **core structural decisions and invariants** for `PeterSalvato.com`. It is intended to guide all development and assistant support without requiring additional clarification.

## 🔒 System Principles

| Principle               | Enforced Rule |
|-------------------------|---------------|
| **Encapsulation**       | Each project and journal entry lives in its own PascalCase folder under `/src/Projects/` or `/src/Journal/` |
| **Scaffold Fidelity**   | All `Data.php` or `Meta.php` are generated from `Config.yaml` or Markdown |
| **No Assistant Guessing** | Only user-provided config determines structure |
| **Savepoint Lock**      | Assistants must not contradict previous validated architecture decisions |

## 📁 Canonical Folder Structure

```plaintext
/public/
  index.php
  assets/

/src/
  Projects/ProjectName/
    Config.yaml
    Data.php
    Images/

  Journal/2025-04-13-OnBuildingSystems/
    Config.yaml
    Entry.md
    Meta.php
    Images/

  Router/
  Layout/
  Partials/

/scripts/
  build.php
  bootstrap.sh
  validate_structure.sh

✍️ Casing + Slug Rules
Field	Format	Example
group	PascalCase	CaseStudies, Systems
slug	kebab-case	math-on-tape
title	Sentence Case	Math on Tape
🗂️ Layout Types

Projects use:

    layout: Explainer → structured sections with image/text

    layout: Gallery → visual gallery block with images only

Journal uses:

    Combined Config.yaml (frontmatter) + Entry.md content

    Output Meta.php for routing + indexing

🧠 Assistant Expectations

All assistants must:

    Use only user-defined structure (never invent logic)

    Honor casing + layout rules exactly

    Never scaffold or wrap without confirmed spec

    Obey Savepoint and navigation structure


---

## 📘 `_rebuild/projectRoadmap.md`

```md
---
title: Project Roadmap
slug: project-roadmap
updated: 2025-04-17
summary: Current completion map of all Projects and Journal entries.
---

# 🗺️ Project & Journal Completion Tracker

Tracks the current status of all journal entries and projects for launch.

## 📝 Journal Entries

| Date         | Title                        | Status     | Type     |
|--------------|------------------------------|------------|----------|
| 2025-04-12   | Savepoint Protocol           | ✅ Final    | Essay    |
| 2025-04-13   | On Building Systems          | ✅ Final    | Essay    |
| 2025-04-14   | The Order of the Ætherwright| ✅ Final    | Essay    |
| 2025-04-15   | Poetic Infrastructure        | 🟡 Draft    | Essay    |
| 2025-04-16   | Signals System               | ✅ Final    | Process  |
| 2025-04-17   | Self-Sufficient Design       | 🟡 Draft    | Essay    |
| 2025-04-18   | On Emergence                 | ⬜ Pending  | Essay    |

## 🧱 Project Scaffold

| Slug           | Title            | Layout     | Group        | Status   |
|----------------|------------------|------------|--------------|----------|
| aiden-jae      | Aiden Jae        | Explainer  | CaseStudies  | ✅ Final |
| altrueism      | Altrueism        | Explainer  | CaseStudies  | ✅ Final |
| math-on-tape   | Math on Tape     | Gallery    | CaseStudies  | ✅ Final |
| echo-and-bone  | Echo & Stone     | Gallery    | Artifacts    | ⬜ Incomplete |
| the-deep-cuts  | The Deep Cuts    | Gallery    | Artifacts    | ⬜ Incomplete |
| photogeography | Photogeography   | Gallery    | ConceptualProjects | ⬜ Incomplete |
| versograms     | Versograms       | Gallery    | ConceptualProjects | ⬜ Incomplete |

---

## 🧭 Nav + Routing Status

All routes are functional:

- `/index.php?page=project&project=altrueism`
- `/index.php?page=journal`
- `/index.php?page=journalEntry&slug=on-building-systems`

---

## ⏳ Next Priorities

- Finalize missing journal copy (`Poetic Infrastructure`, `On Emergence`)
- Build remaining `Data.php` for `EchoAndBone`, `Versograms`, etc.
- Validate casing and regenerate slugs if needed