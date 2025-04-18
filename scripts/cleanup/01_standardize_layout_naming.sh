#!/bin/bash
set -e

echo "🧼 [01] Standardizing layout file naming..."

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_ROOT="$(dirname "$(dirname "$SCRIPT_DIR")")"
LAYOUT_DIR="$PROJECT_ROOT/src/Layout"

cd "$LAYOUT_DIR" || { echo "❌ Layout directory not found: $LAYOUT_DIR"; exit 1; }

# Matches: layout.[object] or layout.[object].[context]
INVALID_FILES=$(find . -maxdepth 1 -type f -name "*.php" ! -regex './layout\.[a-z]\+\(\.[a-z]\+\)\?\.php')

if [ -z "$INVALID_FILES" ]; then
  echo "✅ All layout files already follow naming convention."
else
  echo "⚠️ Found layout files with inconsistent naming:"
  echo "$INVALID_FILES"
  echo ""

  for FILE in $INVALID_FILES; do
    BASENAME=$(basename "$FILE")
    case "$BASENAME" in
      "Layout.php")
        echo "🔸 Preserving 'Layout.php' — assumed to be layout engine, not template."
        ;;
      *)
        echo "🔸 Unrecognized layout file: $BASENAME — manual review may be required."
        ;;
    esac
  done

  echo ""
  echo "📝 Suggest: Manually rename the above if they are intended as templates."
  echo "           Valid pattern is: layout.[object].php or layout.[object].[context].php"
fi

cd - > /dev/null
echo "✅ [01] Layout filename normalization complete."
