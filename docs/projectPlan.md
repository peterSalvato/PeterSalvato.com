# 🧭 PeterSalvato.com — System Design & Planning Doc

This file captures the foundational philosophy, architecture, and structural decisions that govern the entire site.

---

## 🔒 System Principles

| Principle               | Enforcement                                                                 |
|-------------------------|-----------------------------------------------------------------------------|
| Encapsulation           | Each project and journal entry lives in its own PascalCase folder           |
| Slug Authority          | All slugs use kebab-case, converted by slug_to_pascal()                     |
| Data Immutability       | Data.php and Meta.php are generated, never hand-written                     |
| No AI Inference         | All structure comes from user-defined source files                          |
| Savepoint Protocol Lock | No structural edits may violate confirmed design without formal override    |

---

## 📁 Canonical File Layout

/public/ index.php assets/

src/ Projects/ProjectName/ Config.yaml Data.php Images/

Journal/YYYY-MM-DD-Title/ Config.yaml Entry.md Meta.php Images/

Layout/ Layout.php layout.project.explainer.php layout.project.gallery.php (TODO)

Router/ Project.php Journal.php JournalEntry.php

Partials/ Nav.php, Head.php, Footer.php

/scripts/ build.php bootstrap.sh reset.sh validate_structure.sh (TODO)


---

## 🧭 Navigation Logic

| Section             | URL Format                                      |
|---------------------|--------------------------------------------------|
| Case Studies        | `?page=project&project=altrueism`               |
| Conceptual Projects | `?page=workshop/conceptual-projects/slug`      |
| Artifacts           | `?page=project&project=the-deep-cuts`          |
| Systems             | `?page=systems/savepoint-protocol`             |
| Journal             | `/index.php?page=journal`                      |

---

## 📚 Journal Schema

Each journal folder contains:

- `Config.yaml` → metadata (title, date, slug, tags)  
- `Entry.md` → Markdown content  
- `Meta.php` → generated via `build.php`  
- `Images/` → optional

---

## 🧱 Project Schema

### Explainer
```yaml
layout: Explainer
sections:
  - title: ...
    text: ...
    image: Images/...
    imageAlt: ...

Gallery

layout: Gallery
images:
  - src: Images/...
    alt: ...

🔐 Savepoint Mode

This file is not to be rewritten by AI assistants.
It is the canonical design document for structural continuity.

If a future Savepoint evolves this system, that evolution must be recorded separately.

📌 Savepoint: 2025-04-17-infra-canonical


---

## 📄 `projectRoadmap.md`

```markdown
# 📦 PeterSalvato.com — Build Roadmap

Tracks real-world implementation progress of journal, projects, and system scripts.

---

## ✅ Phase 1: Bootstrap & Scaffolding

- [x] Initial repo + file structure
- [x] `build.php` generates all data
- [x] Journal entry scaffolding complete
- [x] Project folder scaffolding complete
- [x] Explainer layout rendering cleanly
- [ ] Gallery layout rendering (TODO)
- [ ] `signals.php` route/view (TODO)
- [ ] `validate_structure.sh` (pending)
- [ ] 404 fallback rendering (missing)

---

## 🗓 Status Snapshot — 2025-04-17

### ✅ Projects

| Name               | Group              | Layout    | Slug              |
|--------------------|--------------------|-----------|-------------------|
| AidenJae           | CaseStudies        | N/A       | aiden-jae         |
| Altrueism          | CaseStudies        | Explainer | altrueism         |
| MathOnTape         | CaseStudies        | N/A       | math-on-tape      |
| EchoAndBone        | Artifacts          | Explainer | echo-and-bone     |
| TheDeepCuts        | Artifacts          | Gallery   | the-deep-cuts     |
| Photogeography     | ConceptualProjects | Gallery   | photogeography    |
| Versograms         | ConceptualProjects | Gallery   | versograms        |
| OrderOfTheAetherwright | Systems      | Explainer | the-order-of-the-aetherwright |
| SavepointProtocol  | Systems            | Explainer | savepoint-protocol |

---

### ✅ Journal Entries

- Savepoint Protocol  
- On Building Systems  
- The Order of the Ætherwright  
- Poetic Infrastructure  
- Signals System  
- Self-Sufficient Design  
- On Emergence (stub)

📌 Snapshot tag: `2025-04-17-scaffold-complete`

