<?php

$title = "Welcome to PeterSalvato.com";
$content = <<<HTML
  <main>
    <h1>$title</h1>
    <p>This is the home page.</p>
  </main>
HTML;

include __DIR__ . '/../Layout/Layout.php';
