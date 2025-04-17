<?php
declare(strict_types=1);

// Simple routing layer based on `?page=`
$page = $_GET['page'] ?? 'home';

// Set default content buffer
ob_start();

switch ($page) {
    case 'project':
        require __DIR__ . '/../src/Router/Project.php';
        break;

    case 'journal':
        require __DIR__ . '/../src/Router/Journal.php';
        break;

    case 'journal-entry':
        require __DIR__ . '/../src/Router/JournalEntry.php';
        break;

    default:
        // Fallback content for now
        echo "<main><h1>Router initialized — dispatch logic pending.</h1></main>";
        break;
}

// Capture the inner view's output
$content = ob_get_clean();

// Wrap it in the global layout
require __DIR__ . '/../src/Layout/Layout.php';
