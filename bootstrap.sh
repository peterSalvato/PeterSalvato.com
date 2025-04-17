#!/bin/bash

# ─────────────────────────────────────────────────────────────
# BOOTSTRAP: Initial directory structure for PeterSalvato.com
# Version: 1.0.0
# Author: Architect (you)
# Purpose: Establish secure modular structure prior to first commit
# ─────────────────────────────────────────────────────────────

echo "🔧 Bootstrapping secure site directory structure..."

# Public web root (ONLY this is served by Apache/Nginx)
mkdir -p public/assets
touch public/assets/.gitkeep

# Source logic (not web accessible)
mkdir -p src/Projects
mkdir -p src/Journal
mkdir -p src/Layout
mkdir -p src/Partials
mkdir -p src/Router
mkdir -p src/Assets/css
mkdir -p src/Assets/js
touch src/Assets/css/.gitkeep
touch src/Assets/js/.gitkeep

# Script tools and build scaffolding
mkdir -p scripts

# Root scaffolding / docs
touch README.md
touch BUILD-CHECKLIST.md
touch .gitignore

# Basic .gitignore (optional — can refine later)
cat > .gitignore <<EOF
/vendor/
node_modules/
.env
.DS_Store
*.log
*.bak
public/assets/*
!public/assets/.gitkeep
EOF

# Public entry point placeholder
cat > public/index.php <<'EOF'
<?php
// Site router entry point
echo "Router initialized — dispatch logic pending.";
EOF

# Router stubs
touch src/Router/Project.php
touch src/Router/Journal.php
touch src/Router/JournalEntry.php

echo "✅ Bootstrap complete. Directory structure initialized."
