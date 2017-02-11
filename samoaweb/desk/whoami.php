<?php include("defs.php"); ?><?php 

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Bernd Stramm whoami page</title>

<?php include("headstuff.php"); ?>
</head>
<body>
<div>
<?php include ("topnav.inc"); ?>
</div>
<h2>
You are

<?php
echo $_SERVER["REMOTE_ADDR"];

?>
</h2>
<br>
<h3>
using
<?php
echo $_SERVER["HTTP_USER_AGENT"];
?>
</h3>
<?php
include ("thefooter.inc");
?>
</body>
</html>

