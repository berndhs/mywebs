<?php

include_once("once.php");

class DelibDebug extends OnlyOne {

private static $dbg = null;


public static function open($filename) 
{
return;
  $dbg = fopen ($filename,"w");
}

public static function checkOpen () 
{
return;
  if ($dbg === null) {
    self::open("~/debug.log");
  }
  $stamp = date("c",time());
  $msg = "auto-opened\n";
  fwrite($dbg,$stamp . $msg);
  fflush($dbg);
}

public static function debug($msg)
{
return;
  self::checkOpen();
  $stamp = date("c",time());
  fwrite($dbg,$stamp . $msg);
  fflush($dbg);
}

public static function debugNotice($bigData)
{
return;
  self::checkOpen();
  self::debug("length ".strlen($bigData));
  fflush($dbg);
}

public static function closeDebug() 
{
return;
echo "closing\r\n<br>";
  fclose($dbg);
}

}

?>
