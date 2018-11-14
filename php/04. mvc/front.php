<?php

require_once 'controller.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/' === $uri) {
  $n = $_GET['n'] ?? 0;
  show_numbers($n);
} elseif('/hello' === $uri) {
  say_hello();
} else {
  header('HTTP/1.1 404 Not Found');
  echo '<html><body>404 Page Not Found</body></html>';
}
