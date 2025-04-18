<main class="journal-entry">
  <article>
    <h1><?php slot('title') ?></h1>
    <p class="journal-date"><?php slot('date') ?></p>
    <div class="journal-tags"><?php slot('tags') ?></div>
    <section class="journal-content">
      <?= $content ?>
    </section>
  </article>
</main>
