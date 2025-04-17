---
title: Setup Instructions
slug: setup
updated: 2025-04-17
summary: Local setup, script usage, and assistant onboarding protocol.
---

# 🧰 Setup Guide — PeterSalvato.com

## 🖥️ Local Environment

```bash
composer install
php -S 127.0.0.1:8000 -t public

🧪 Build Tools

./scripts/bootstrap.sh            # Creates empty scaffolds
./scripts/build.php               # Generates Data.php + Meta.php from YAML
./scripts/validate_structure.sh   # Lints naming, layout, and structure

🤖 Assistant Usage Protocol

    Assistants must never guess project data or structure

    All logic must flow from Config.yaml → Data.php

    File casing, slugs, and layout enums must match system spec

❌ Assistants may not:

    Inject copy into journal files

    Guess layout type or project intent

    Propose structural refactors during Savepoint lock

📦 Required Packages

PHP 8.1+
Composer dependencies:

"symfony/yaml": "^6.0"

    This file is part of the Savepoint scaffold. Do not modify structure without updating roadmap accordingly.


---