<?php
declare(strict_types=1);


echo "<!-- Journal router loaded -->";

// Gather all journal entries
$journalDirs = glob(__DIR__ . '/../Journal/*', GLOB_ONLYDIR);

$entries = [];
echo "<!-- found " . count($journalDirs) . " journal dirs -->";

foreach ($journalDirs as $dir) {
    $metaFile = "$dir/Meta.php";

    if (!file_exists($metaFile)) continue;

    $meta = require $metaFile;

    if (!isset($meta['slug'], $meta['title'], $meta['date'])) continue;
    echo "<!-- loaded meta for {$meta['slug']} -->";

    $entries[] = $meta;
}

// Sort newest first
usort($entries, fn($a, $b) => strcmp((string)$b['date'], (string)$a['date']));
// DEBUG:
if (empty($entries)) {
    echo "<p>No journal entries found.</p>";
    exit;
}
// Load index view
ob_start();
include __DIR__ . '/../Layout/layout.journal.index.php';
$content = ob_get_clean();

