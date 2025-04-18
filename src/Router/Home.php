<?php

$title = 'Peter Salvato — Artist, Engineer, System Designer';

ob_start();
?>
<main class="home">
  <section class="intro">
    <h1><?= $title ?></h1>
    <p>Welcome to the digital studio and system architecture of Peter Salvato.</p>
    <p>This space explores ongoing journaled thinking, conceptual works, and functional prototypes.</p>
    <p>Use the navigation above to explore journal entries, project case studies, and evolving systems.</p>
  </section>
</main>
<?php

$content = ob_get_clean();