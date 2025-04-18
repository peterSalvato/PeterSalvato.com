<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

ob_start();

$page = $_GET['page'] ?? 'home';

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

    case 'home':
        require __DIR__ . '/../src/Router/Home.php';
        break;

    default:
        echo "<main><h1>Router initialized — dispatch logic pending.</h1></main>";
        break;
}

$content = ob_get_clean();

require __DIR__ . '/../src/Layout/Layout.php';
