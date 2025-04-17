# 🧱 Architecture – File Structure + System Logic

This document outlines the enforced architecture of the project. All assistants and contributors must follow these rules exactly.

---

## 📁 Directory Structure (Canonical)

```txt
/public/
  index.php
  assets/

/src/
  /Projects/
    ProjectName/
      Config.yaml
      Data.php       ← generated
      Images/

  /Journal/
    YYYY-MM-DD-Title/
      Config.yaml
      Entry.md
      Meta.php       ← generated
      Images/

  /Router/
    Project.php
    Journal.php
    JournalEntry.php

  /Layout/
    Layout.php
  /Partials/
    Nav.php
    Head.php
    Footer.php

/scripts/
  build.php
  validate_structure.sh
  bootstrap.sh
  reset.sh

/docs/
  *.md

📚 Routing Format

All URLs are served through /index.php?page=... style routing.

Example:

?page=workshop/caseStudies/aidenJae
?page=project&project=altrueism

🏷️ Casing + Slug Rules

    Folder names: PascalCase

    Groups: PascalCase (CaseStudies)

    Slugs: kebab-case (math-on-tape)

    YAML fields must match exact naming (layout, group, slug)

📌 Project Types
Explainer Projects

layout: Explainer
sections:
  - title: ...
    text: ...
    image: Images/...
    imageAlt: ...

Gallery Projects

layout: Gallery
images:
  - src: Images/...
    alt: ...

⚠️ Violating this structure breaks the Savepoint lock.

