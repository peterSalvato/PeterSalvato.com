#!/bin/bash

echo "⚠️ WIPING scaffolded files from src/Projects/..."

# Remove lowercase 'images' folders
find src/Projects -type d -iname 'images' -exec rm -rf {} +

# Remove Data.php files from all project directories
find src/Projects -type f -name 'Data.php' -exec rm -f {} +

# Remove known scaffold scripts from root
rm -f scaffold_explainers.sh
rm -f scaffold_aidenjae_strict.sh

# Confirm remaining project structure
echo "✅ Remaining tree:"
tree src/Projects

echo "🧼 Clean slate. Ready for Config-driven build."
