<?php include("defs.php"); ?>
<?php 
include ("newsnav.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
	

<link rel="stylesheet" type="text/css" href="bernd-styles.css" >
<link rel="stylesheet" type="text/css" href="addstyle.css" >
<link rel="stylesheet" type="text/css" href="image-styles.css" >
<link rel="stylesheet" type="text/css" href="news.css" >
</head>
	</head>

	<body class="plainnews">
<div align="center">
<?php include ("title.inc"); ?>
<h1 class="pagetitle">
<?php echo titlestring("Delete News"); ?>
</h1>
</div>
<?php
   include ("topnav.inc");
   newslinks();
?>

<div class="bodygroup">
<div class="leftbody">
   <h5>Recent News</h5>
</div>

<div class="seeback">
<?php  include ("deleteform.php"); ?>

</div>
<div class="mainbody">
   <?php include ("newsmain.php"); ?>

</div>
</div>

<?php include ("thefooter.inc"); ?>

</body>

</html>
