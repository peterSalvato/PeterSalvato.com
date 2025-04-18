<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . '/../Partials/Head.php'; ?>
<body>

<?php include __DIR__ . '/../Partials/Nav.php'; ?>

<?= $content ?? '<!-- no content -->' ?>

<?php include __DIR__ . '/../Partials/Footer.php'; ?>

</body>
</html>
