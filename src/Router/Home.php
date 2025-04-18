<?php

$title = "Peter Salvato";

ob_start();
?>
<main class="home">
  <h1><?= $title ?></h1>
  <p>This is the home page.</p>
</main>
<?php

$content = ob_get_clean();

include __DIR__ . '/../Layout/Layout.php';
