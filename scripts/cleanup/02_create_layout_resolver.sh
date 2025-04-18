#!/bin/bash
set -e

echo "🧠 [02] Creating LayoutResolver via bash..."

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_ROOT="$(dirname "$(dirname "$SCRIPT_DIR")")"
LAYOUT_DIR="$PROJECT_ROOT/src/Layout"
TARGET_FILE="$LAYOUT_DIR/LayoutResolver.php"

mkdir -p "$LAYOUT_DIR"

cat > "$TARGET_FILE" <<'PHP'
<?php

namespace Layout;

class LayoutResolver
{
    const LAYOUT_PATH = __DIR__;

    public static function resolve(string $type, string $context): string
    {
        $filenames = [
            "layout.{$type}.{$context}.php",
            "layout.{$type}.php"
        ];

        foreach ($filenames as $file) {
            $fullPath = self::LAYOUT_PATH . DIRECTORY_SEPARATOR . $file;
            if (file_exists($fullPath)) {
                return $fullPath;
            }
        }

        throw new \RuntimeException(
            "No layout found for type '{$type}' with context '{$context}'. Tried: " .
            implode(', ', $filenames)
        );
    }
}
PHP

echo "✅ [02] LayoutResolver created at $TARGET_FILE"
