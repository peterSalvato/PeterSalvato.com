<main class="explainer">
  <h1><?= htmlspecialchars($data['title']) ?></h1>
  <p class="summary"><?= htmlspecialchars($data['summary']) ?></p>

  <?php foreach ($data['sections'] as $section): ?>
    <section class="explainer-section">
      <div class="explainer-text">
        <h2><?= htmlspecialchars($section['title']) ?></h2>
        <p><?= nl2br(htmlspecialchars($section['text'])) ?></p>
      </div>

      <?php if (!empty($section['image'])): ?>
        <div class="explainer-image">
          <img src="<?= htmlspecialchars($section['image']) ?>" alt="<?= htmlspecialchars($section['imageAlt'] ?? '') ?>">
        </div>
      <?php endif; ?>
    </section>
  <?php endforeach; ?>
</main>
