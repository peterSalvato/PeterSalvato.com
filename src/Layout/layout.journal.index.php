<main class="journal-index">
  <h1>Journal</h1>

  <?php if (empty($entries)): ?>
    <p>No journal entries found.</p>
  <?php else: ?>
    <ul class="journal-list">
      <?php foreach ($entries as $entry): ?>
        <li class="journal-preview">
          <h2>
            <a href="/index.php?page=journal-entry&slug=<?= htmlspecialchars($entry['slug']) ?>">
              <?= htmlspecialchars($entry['title']) ?>
            </a>
          </h2>

          <?php
          $timestamp = strtotime((string) $entry['date']);
          $formatted = $timestamp ? date('F j, Y', $timestamp) : 'Unknown date';
          ?>

          <p class="meta">
            <?= $formatted ?>
            <?php if (!empty($entry['summary'])): ?>
              | <?= htmlspecialchars($entry['summary']) ?>
            <?php endif; ?>
          </p>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</main>
