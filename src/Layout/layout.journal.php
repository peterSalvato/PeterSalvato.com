<?php
use function htmlspecialchars as h;

$meta  = $entry['meta'];
$mdRaw = $entry['md'];

// Strip frontmatter
$md = preg_replace('/^---(.*?)---/s', '', $mdRaw);
?>

<main class="journal-entry">
  <h1><?= h($meta['title']) ?></h1>
  <p class="journal-meta">
    <?= date('F j, Y', strtotime($meta['date'])) ?> |
    <?= implode(', ', $meta['tags']) ?>
  </p>

  <article>
    <?= renderMarkdown($md) ?>
  </article>
</main>

<?php
// --- Basic Markdown renderer (no external lib)
function renderMarkdown(string $text): string {
    // Escape, but allow pre blocks for Savepoints
    $text = preg_replace_callback('/```(.*?)```/s', function ($m) {
        return '<pre>' . htmlentities(trim($m[1])) . '</pre>';
    }, $text);

    // Bold, italics
    $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);
    $text = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $text);

    // Headings
    $text = preg_replace('/^# (.*?)$/m', '<h2>$1</h2>', $text);
    $text = preg_replace('/^## (.*?)$/m', '<h3>$1</h3>', $text);

    // Paragraphs
    $lines = array_map('trim', explode("\n", $text));
    $html = '';
    foreach ($lines as $line) {
        if (str_starts_with($line, '<')) {
            $html .= $line . "\n"; // already block element
        } elseif ($line !== '') {
            $html .= "<p>$line</p>\n";
        }
    }

    return $html;
}
