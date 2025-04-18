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
$content = file_get_contents($entryPath);
$html = \Parsedown::instance()->text($content);

layout('Journal', [
    'title' => $meta['title'] ?? 'Untitled',
    'date' => $meta['date'] ?? substr($entry, 0, 10),
    'tags' => $meta['tags'] ?? '',
    'content' => $html
]);
