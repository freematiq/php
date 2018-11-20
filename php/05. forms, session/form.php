<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hello</title>
</head>
<body>
  <?php
    $name = $_POST['username'] ?? null;
  ?>
  <?php if (empty($name)): ?>
  <form action="/" method="POST">
    <label for="username">Введите имя:</label>
    <input placeholder="Введите имя:" type="text" name="username" id="username" required>
    <input type="submit" value="Готово">
  </form>
<?php else: ?>
  <p>Hello, <?= $name ?></p>
  <a href="/">Другое имя</a>
<?php endif; ?>
</body>
</html>
