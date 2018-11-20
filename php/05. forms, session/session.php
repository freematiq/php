<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Session</title>
</head>
<body>
  <?php
    session_start();
    $name = $_GET['username'] ?? $_SESSION['username'] ?? null;
  ?>
  <?php if (empty($name)): ?>
  <form action="/" method="GET">
    <label for="username">Введите имя:</label>
    <input type="text" name="username" id="username" required>
    <input type="submit" value="Готово">
  </form>
<?php else: ?>
  <p>Hello, <?= $name ?></p>
  <a href="/">На главную</a>
  <?php $_SESSION['username'] = $name; ?>
<?php endif; ?>
</body>
</html>
