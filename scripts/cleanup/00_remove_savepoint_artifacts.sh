#!/bin/bash
set -e

echo "🧹 [00] Removing Savepoint artifacts..."

# === Remove docs/SAVEPOINT.md ===
if [ -f "docs/SAVEPOINT.md" ]; then
  echo "Archiving docs/SAVEPOINT.md to docs/_ARCHIVED_SAVEPOINT.md"
  mv docs/SAVEPOINT.md docs/_ARCHIVED_SAVEPOINT.md
else
  echo "No SAVEPOINT.md file found. Skipping."
fi

# === Remove 'savepoint' logic references from PHP source ===
echo "Scanning PHP files for 'savepoint' references..."

SAVEPOINT_OCCURRENCES=$(grep -ril 'savepoint' src/ || true)

if [ -n "$SAVEPOINT_OCCURRENCES" ]; then
  echo "Found files with 'savepoint'. Manual cleanup required:"
  echo "$SAVEPOINT_OCCURRENCES"
  echo "Suggest: Manually inspect and strip logic from these files."
else
  echo "No 'savepoint' logic found in PHP files."
fi

echo "✅ [00] Savepoint artifact removal complete."
