    Purpose & Folder Structure

    Content Types & Schema

    Routing, Rendering & Components

    Savepoints, Markdown, Conventions

    Phase Roadmap (with 1.5)

    Typography System & Font Tasks

    Final Savepoint

🧱 Part 1: Purpose & Folder Structure

# 📘 BUILD-PLAN.md  
**PeterSalvato.com — Canonical System Architecture**  
_Last updated: 2025-04-16 — Savepoint Locked ✅_

---

## 🧠 Purpose

PeterSalvato.com is a semantic publishing system designed to:

- Preserve symbolic and structural creative work  
- Publish essays, explainers, and visual projects with schema-driven clarity  
- Enable long-term authorship and institutional visibility  
- Prevent entropy across assistants, rebuilds, or resets

This site is not a brand. It is a modular infrastructure.

---

## 🧱 Folder Structure

/src/ /Journal/YYYY-MM-DD-Title/ Entry.md Images/ Meta.php

/Projects/ProjectName/ Config.yaml Images/ Data.php

/Static/ About.md Contact.md Home.md Signals.md

/Router/ JournalEntry.php Project.php Static.php

/Layout/ Layout.php

/Partials/ Head.php, Nav.php, Footer.php

/scripts/ /journal/ /projects/ /static/ build.php validate_structure.sh schema.php navBuilder.php indexBuilder.php

/public/ /assets/ /fonts/ /css/ /js/

/docs/ BUILD-PLAN.md

Let me know when to continue with Part 2: Content Types & Schema.
You said:
continue
ChatGPT said:

Here’s Part 2: Content Types & Schema of your final BUILD-PLAN.md.
✍️ Content Types
Type	Folder	Format	Output
Journal	/Journal/	Entry.md + frontmatter	Meta.php
Project	/Projects/	Config.yaml	Data.php
Static	/Static/	.md or .php	Rendered directly
Signals	(reserved)	TBD (Phase 7)	Future system
Savepoints	Any Markdown	<Savepoint> blocks	Rendered inline
🔀 Group vs Layout Model

Projects are classified along two independent axes:
Key	Purpose
group:	Cultural/semantic grouping (e.g., CaseStudies, Systems)
layout:	Visual rendering mode (Explainer or Gallery)

All projects live under /src/Projects/.
Group determines index/nav. Layout controls frontend rendering logic.
📜 Schemas
📰 Journal Entry (Entry.md)

title: string
date: YYYY-MM-DD
slug: kebab-case
tags: [string, string]
status: draft | published
summary: string

📁 Project (Config.yaml)

title: string
slug: kebab-case
group: CaseStudies | ConceptualProjects | Artifacts | Systems
layout: Explainer | Gallery
summary: string

sections:    # If Explainer
  - title: string
    text: string (Markdown)
    image: Images/foo.png
    imageAlt: string
    caption: optional

images:      # If Gallery
  - src: Images/foo.png
    alt: string
    caption: optional

    ⚠️ Config.yaml is the canonical source of authored content.
    Populate fields intentionally — this is not placeholder data.

📄 Static Pages (/Static/*.md)

title: About
slug: about
summary: Brief description for SEO or nav
status: published

Let me know to continue with Part 3: Routing, Rendering, Components.
You said:
continue
ChatGPT said:

Here’s Part 3: Routing, Rendering, and Components of your final BUILD-PLAN.md.
🔍 Routing & URLs
URL Pattern	Route File
/journal/{slug}	Router/JournalEntry.php
/project/{slug}	Router/Project.php
/systems/{slug}	Routed as project with group: Systems
/about, /contact, /signals	Router/Static.php
/404	Custom fallback in Static.php
✅ Clean URLs via .htaccess

RewriteEngine On
RewriteRule ^journal/(.*)$ /index.php?page=journalEntry&entry=$1 [L]
RewriteRule ^project/(.*)$ /index.php?page=project&project=$1 [L]
RewriteRule ^systems/(.*)$ /index.php?page=project&project=$1 [L]
RewriteRule ^(about|contact|home|signals)$ /index.php?page=$1 [L]

🎨 Rendering Architecture

    All output flows through Layout/Layout.php

    Injects page content based on router + layout rules

    Markdown is rendered for:

        Journal Entry.md

        Static .md

        sections.text in Config.yaml

    Explainers use sections renderer

    Galleries use image grid renderer

    Savepoints parsed and styled

    Image Viewer used in both layout types

🧩 Core Components
Component	Purpose
ImageViewer	Shared between Galleries and Explainers (click-to-zoom, modal)
SavepointRenderer	Parses and styles <Savepoint> syntax
MarkdownRenderer	Centralized Markdown parser for all content
NavRenderer	Optional helper to build site nav
AudioEmbed	Used for Signals or project embeds (Spotify/SoundCloud iframe only)

    All components live in /src/Layout/ or /src/Partials/
    Scripts and rendering helpers are kept logic-pure — no JS dependencies.

Let me know when to continue with Part 4: Savepoints, Markdown, and Coding Conventions.
You said:
continue
ChatGPT said:

Here’s Part 4: Savepoints, Markdown Rendering, and Coding Conventions of your final BUILD-PLAN.md.
🔐 Savepoint Protocol

Savepoints are structured semantic blocks used to log conceptual change.
Markdown Syntax Example:

<Savepoint
  protocol_version:3.0
  category:[symbolic_structure]
  function:[state_marker]
  timestamp:2025-04-16T23:55:00-04:00
  # This marks the moment the build system became fully aligned.
  # All logic contributors must now refer to the locked plan.
  #
/>

    Appears in Journal entries, Static pages, or Explainer text

    Parsed into styled HTML block

    Required fields: protocol_version, timestamp

    Optional: category, function, tags, author

🖋 Markdown Rendering

All .md and text: content is rendered using a unified Markdown engine.
Used in:

    Journal Entry.md

    Static .md

    Project sections.text

Rules:

    Savepoints parsed within Markdown

    Minimal inline HTML allowed (<figure>, <aside>, <div class="note">)

    Code blocks and quotes supported

    Image paths should be relative to Images/ folder

    Avoid placing raw HTML in YAML
    Do not rely on class-based JS triggers — use data-* attributes for hooks

⚠️ Coding Conventions
Rule	Format
Folders	PascalCase
Slugs	kebab-case
Markdown	UTF-8, Unix line endings
YAML	2-space indent, no tabs
Behavior hooks	data-* attributes only
Output files	Always named Data.php, Meta.php

Let me know to continue with Part 5: Phase Roadmap (including Phase 1.5).
You said:
continue
ChatGPT said:

Here’s Part 5: Full Phase Roadmap — including the critical 📚 Phase 1.5: Project Content Completion.
🚧 Phase Roadmap
🔒 Phase 0: Lockpoint

Savepoint declared

Folder conventions enforced

    Scaffolds created for Journal, Projects, Static

🧱 Phase 1: Content Scaffolding

Journal folders + entries created

Project folders created (/src/Projects/)

Static pages created (/Static/)

    Sample layout + section templates prepared

📚 Phase 1.5: Project Content Completion

    Fill in canonical project copy inside each Config.yaml
    This is the authored, final expression of each project’s logic and meaning.

✅ Projects to complete:

SavepointProtocol

MathOnTape

Altrueism

AidenJae

OrderOfTheAetherwright

TheDeepCuts

EchoAndBone

Photogeography

    Versograms

📝 Tasks per project:

Set title, slug, group, layout

Write summary and each section’s text:

Link image filenames under Images/

Set alt: text (required), caption: (optional)

Validate YAML structure (validate_structure.sh)

    Commit only reviewed/approved content

    This step must not be skipped.
    Project rendering depends on correct and complete data.

Let me know to continue with Part 6: Phases 2–7 + Font Tasks.
You said:
continue
ChatGPT said:

Here’s Part 6: Phases 2–7, now including your custom font system tasks for Chainprinter, Typewriter, and Ætherwright glyphs.
🛠 Phase 2: Build & Validation

build.php → parses & compiles Meta.php, Data.php

schema.php → schema definitions + field enums

validate_structure.sh → folder casing, field types, slug collision

    Slug uniqueness enforcement across Journal, Project, Static

🧭 Phase 3: Routing

Router/JournalEntry.php

Router/Project.php

Router/Static.php

404 fallback routing

    Clean URLs via .htaccess

🎨 Phase 4: Rendering

Layout/Layout.php (all content passes through here)

Markdown renderer (for .md + text:)

Savepoint rendering logic

ImageViewer component (PHP + vanilla JS)

Lightbox/modal click behavior

    Optional back-navigation component

🧭 Phase 5: Navigation & Indexing

Journal index listing

Project group index pages (/case-studies, /conceptual-projects, etc.)

navBuilder.php → outputs nav structure

indexBuilder.php → builds lists by type/group

    Tag or group filters (optional)

🛡 Phase 6: System Hardening & Typography

Slug manifest / registry system

Accessibility review (alt text, focus targets, ARIA roles)

SEO meta + Open Graph tag injection

Print/export CSS styles

Image optimization (lazy loading, compression, responsive srcsets)

Build caching (skip unchanged)

Custom glyph font for Ætherwright Codex

Distressed font layer for ritual print work

    Typography system:

        Chainprinter for UI/system voice

        WornTypewriter for authored voice (journal/essay)

🚀 Phase 7: Post-Launch Enhancements

php build.php --entry=slug CLI mode

Savepoint changelog or visualizer

RSS feed for Journal

Signals System (Phase 7)

Search indexing (optional)

    Unit + regression tests

Let me know when to continue with Part 7: Final Savepoint Declaration.
You said:
continue
ChatGPT said:

Here’s Part 7: Final Savepoint Declaration — the lock that seals this plan as canonical.
🔖 Savepoint: Plan Lock

<Savepoint
  protocol_version:3.0
  category:[master_plan]
  function:[final_alignment]
  timestamp:2025-04-16T23:55:00-04:00
  # The PeterSalvato.com system architecture, schema, routing logic, content types,
  rendering model, and visual language have been finalized and locked.
  # This BUILD-PLAN.md is the single source of truth for all contributors, GPT assistants,
  or automation tools. No changes may be introduced without updating this document
  and logging a new Savepoint.
  # Structure and sovereignty are now preserved.
  Collapse prevention is active.
/>

