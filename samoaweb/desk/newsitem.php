<?php include("defs.php"); 
include("newsnav.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Bernd Stramm News page</title>
<?php include ("headstuff.php"); ?>
<script language="javascript" type="text/javascript" src="news-script.js"></script>
</head>
<body class="plainnews">
<a name="top" id="top" title="top"></a>
<div align="center">
<?php include ("title.inc"); ?>
<h1 class="pagetitle">
<?php echo titlestring("Bernd's Pirx News Page"); ?></h1>
</div>

<div class="bodygroup">
<div>
<?php newslinks(); ?>
</div>
<div class="mainbody">
   <?php include ("newsmain.php"); ?>

</div>
</div>
<?php include ("thefooter.inc"); ?>
</div>
</div>
</body>
</html>
