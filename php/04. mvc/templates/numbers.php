<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Numbers</title>
</head>
<body>
  <?php if (!empty($r)): ?>
    Последовательность от 1 до <?= count($r) ?>:
    <ul>
    <?php foreach ($r as $i): ?>
      <li><?= $i ?></li>
    <?php endforeach; ?>
  </ul>
  <?php else: ?>
    Введите GET параметр n
  <?php endif; ?>
</body>
</html>
