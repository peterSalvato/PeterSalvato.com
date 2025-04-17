<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PeterSalvato.com</title>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<?php include __DIR__ . '/../Partials/Nav.php'; ?>

<?= $content ?? '<!-- no content -->' ?>

<?php include __DIR__ . '/../Partials/Footer.php'; ?>

</body>
</html>
