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
