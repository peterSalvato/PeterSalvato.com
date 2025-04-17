# 🛠️ PeterSalvato.com — Setup & Assistant Onboarding

---

## ⚙️ Local Setup

```bash
composer install
php scripts/build.php
php -S localhost:8000 -t public

    Requires PHP 8+, Composer, Symfony YAML

🤖 Assistant Guidelines

    DO NOT invent folder structure

    DO NOT rewrite projectPlan.md

    DO generate Data.php and Meta.php using build.php

    DO follow all slug, group, and layout casing rules exactly

    DO enforce Savepoint protocol: no breaking structural shifts without formal record

📚 Script Glossary
Script	Purpose
build.php	Converts all YAML to PHP
bootstrap_remaining.sh	Fills any missing scaffolds
validate_structure.sh	Slug/group/layout linter (TODO)
layout.project.explainer.php	Renders explainer content
layout.project.gallery.php	Needed for gallery content (TODO)

📌 Savepoint: 2025-04-17-handoff-ready