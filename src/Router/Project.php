<?php
declare(strict_types=1);


$slug = $_GET['project'] ?? null;
if (!$slug) {
    http_response_code(400);
    exit('Missing ?project=');
}

// --- 🔍 Map slugs to PascalCase folder names (manual for now) ---
$map = [
    'aiden-jae' => 'AidenJae',
    'altrueism' => 'Altrueism',
    'math-on-tape' => 'MathOnTape',
    'savepoint-protocol' => 'SavepointProtocol',
    'order-of-aetherwright' => 'OrderOfTheAetherwright',
];

if (!isset($map[$slug])) {
    http_response_code(404);
    exit("Project not found: $slug");
}

$folder = $map[$slug];
$path = __DIR__ . "/../Projects/$folder/Data.php";

if (!file_exists($path)) {
    http_response_code(500);
    exit("Missing Data.php for $folder");
}

$data = require $path;

// --- 🧭 Layout Routing ---
$layout = $data['layout'] ?? null;

ob_start();
if ($layout === 'Explainer') {
    include __DIR__ . '/../Layout/layout.project.explainer.php';
} elseif ($layout === 'Gallery') {
    include __DIR__ . '/../Layout/layout.project.gallery.php';
} else {
    http_response_code(500);
    exit("Unknown layout: $layout");
}

$content = ob_get_clean();

// --- 🧱 Wrap in full layout ---
