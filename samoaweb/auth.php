<?php
  if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Bernds Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Cancelled' ;
    exit;
  } else {
    include ("defs.php");
    echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
    $_SERVER['PHP_AUTH_USER'] = "";
    $_SERVER['PHP_AUTH_PW'] = "";
  }
?> 
