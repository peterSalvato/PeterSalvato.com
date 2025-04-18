<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  echo "<!-- trying to load head -->";
  include __DIR__ . '/Partials/Head.php';
  echo "<!-- head loaded -->";
  ?>
</head>
<body>
  <?php
  echo "<!-- trying to load nav -->";
  include __DIR__ . '/Partials/Nav.php';
  echo "<!-- nav loaded -->";
  ?>

  <?= $content ?>

  <?php
  echo "<!-- trying to load footer -->";
  include __DIR__ . '/Partials/Footer.php';
  echo "<!-- footer loaded -->";
  ?>
</body>
</html>
