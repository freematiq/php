<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Elements</title>
</head>
<body>
  <a href="/">Главная</a>
  <form action="/" enctype="multipart/form-data" method="GET">
    <!-- <div>
      <label for="username">Text:</label>
      <input placeholder="text" type="text" name="username" id="username">
    </div>

    <div>
      <label for="password">Password:</label>
      <input placeholder="password" type="password" name="password" id="password">
    </div> -->

    <div>
      <input type="button" name="button" value="Push me">
    </div>

    <div>
      <input type="reset" name="button" value="Reset">
    </div>

    <!-- <div>
      <label>Один<input type="checkbox" name="chb[]" value="ch1"></label>
      <label>Два<input type="checkbox" name="chb[]" value="ch2"></label>
      <label>Три<input type="checkbox" name="chb[]" checked></label>
    </div> -->

    <!-- <div>
      <label>Один<input type="radio" name="r"></label>
      <label>Два<input type="radio" name="r" value="r2"></label>
      <label>Три<input type="radio" name="r" checked></label>

      <label>Один r2<input type="radio" name="r2"></label>
      <label>Два r2<input type="radio" name="r2"></label>
    </div>

    <input type="hidden" name="secret" value="42"> -->

    <div>
      <input type="file" name="upload" value="Upload">
    </div>

    <div>
      <textarea name="ta" placeholder="textarea"></textarea>
    </div>

    <div>
      <select name="sel">
        <option value="v1">Выбор 1</option>
        <option value="v2">Выбор 2</option>
        <option value="v3" selected>Выбор 3</option>
        <option value="v4">Выбор 4</option>
      </select>
    </div>

    <div>
      <select name="sel_mul[]" multiple>
        <option value="v1">Много 1</option>
        <option value="v2">Много 2</option>
        <option value="v3">Много 3</option>
        <option value="v4">Много 4</option>
      </select>
    </div>

    <p><input type="submit" value="Готово"></p>
  </form>
</body>
</html>
