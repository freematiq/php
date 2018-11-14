<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hello</title>
</head>
<body>
  <?php if (isset($_GET['n'])): ?>
    <?php $n = (int) $_GET['n']; ?>
    Последовательность от 1 до <?= $n ?>:
    <ul>
    <?php for($i = 1; $i <= $n; $i++): ?>
      <li><?= $i ?></li>
    <?php endfor; ?>
  </ul>
  <?php else: ?>
    Введите параметр n
  <?php endif; ?>
</body>
</html>
