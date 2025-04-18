<?php

require __DIR__ . '/../vendor/autoload.php';

$page = $_GET['page'] ?? 'home';

// Map known routes
$routes = [
    'journal-entry' => __DIR__ . '/../src/Router/JournalEntry.php',
    'journal'       => __DIR__ . '/../src/Router/Journal.php',
    'project'       => __DIR__ . '/../src/Router/Project.php',
    'home'          => __DIR__ . '/../src/Router/Home.php', // future
];

if (array_key_exists($page, $routes)) {
    require $routes[$page];
} else {
    http_response_code(404);
    echo "🔍 Page not found: $page";
}
