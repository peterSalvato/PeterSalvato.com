<?php

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Layout/Layout.php';

use Symfony\Component\Yaml\Yaml;

$entry = $_GET['entry'] ?? null;
$dir = __DIR__ . '/../Journal/' . $entry;

if (!$entry || !is_dir($dir)) {
    http_response_code(404);
    echo "Journal entry not found.";
    return;
}

$configPath = "$dir/Config.yaml";
$entryPath = "$dir/Entry.md";

if (!file_exists($configPath) || !file_exists($entryPath)) {
    http_response_code(500);
    echo "Entry is missing required files.";
    return;
}

$meta = Yaml::parseFile($configPath);
$markdown = file_get_contents($entryPath);
$html = \Parsedown::instance()->text($markdown);

// Extract vars used in layout
$title = $meta['title'] ?? 'Untitled';
$date  = $meta['date'] ?? substr($entry, 0, 10);
$tags  = $meta['tags'] ?? '';

// Render page content
ob_start();
include __DIR__ . '/../Layout/layout.journal.php';
$content = ob_get_clean();

// Output wrapped layout
include __DIR__ . '/../Layout/Layout.php';