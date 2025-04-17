<?php
// Expects $data to be available from Router/Project.php

$images = $data['images'] ?? [];
?>

<main class="gallery">
  <h1><?= htmlspecialchars($data['title']) ?></h1>
  <p class="summary"><?= htmlspecialchars($data['summary']) ?></p>

  <div class="gallery-grid">
    <?php foreach ($images as $img): ?>
      <figure class="gallery-item">
        <img src="<?= htmlspecialchars($img['src']) ?>"
             alt="<?= htmlspecialchars($img['alt'] ?? '') ?>">
        <?php if (!empty($img['alt'])): ?>
          <figcaption><?= htmlspecialchars($img['alt']) ?></figcaption>
        <?php endif; ?>
      </figure>
    <?php endforeach; ?>
  </div>
</main>
