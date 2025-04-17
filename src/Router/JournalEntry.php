<?php
declare(strict_types=1);

$slug = $_GET['slug'] ?? null;
if (!$slug) {
    http_response_code(400);
    exit('Missing ?slug=');
}

// 🔍 Find journal entry by matching slug in Meta.php
$journalDirs = glob(__DIR__ . '/../Journal/*', GLOB_ONLYDIR);

$found = null;
foreach ($journalDirs as $dir) {
    $metaFile = "$dir/Meta.php";
    $mdFile   = "$dir/Entry.md";

    if (!file_exists($metaFile) || !file_exists($mdFile)) continue;

    $meta = require $metaFile;
    if (($meta['slug'] ?? '') === $slug) {
        $found = ['meta' => $meta, 'md' => file_get_contents($mdFile)];
        break;
    }
}

if (!$found) {
    http_response_code(404);
    exit("No entry found for slug: $slug");
}

$entry = $found;

// 💾 Load into layout
ob_start();
include __DIR__ . '/../Layout/layout.journal.php';
$content = ob_get_clean();

// Wrap
