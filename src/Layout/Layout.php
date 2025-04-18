<?php
// Layout.php – Shell layout file
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include __DIR__ . '/Head.php'; ?>
</head>
<body>

  <?php include __DIR__ . '/Nav.php'; ?>

  <?= isset($content) ? $content : "<!-- no content -->" ?>

  <?php include __DIR__ . '/Footer.php'; ?>

</body>
</html>
