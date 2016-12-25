<?php
  include ("defs.php");
  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
<?php include ("headstuff.php"); ?>
<link rel="stylesheet" type="text/css" href="bernd-styles.css" >
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" >

	</head>

	<body class="plainnews">
	
<?php   include ("title.inc"); ?>
<div align="center">
<h1 class="pagetitle"><?php echo titlestring("Submit News"); ?></h1>
</div>
<?php
   include ("topnav.inc");
   include ("newsnav.php");
   newslinks();
?>

<div class="bodygroup">

<div class="seeback">
<?php include ("addentryform.php"); ?>

</div>
<div class="mainbody">
   <?php include ("newsmain.php"); ?>

</div>
</div>

<?php include ("thefooter.inc"); ?>

</body>

</html>
