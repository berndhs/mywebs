<!DOCTYPE html>

<html>
<head>
<title><?php include ("sethostvar.php"); ?> Server</title>

<link rel="stylesheet" type="text/css" href="bernd-styles.css" >
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" >
<?php $_SERVER = $_ENV; ?>

</head>

<body class="critter">
<?php include_once("google-measure.php") ?>
<div align="center">
<h1>
<?php echo "Welcome to $THIS_HOST_NAME" ?>
</h1>
<h4>(on _SERVER["HTTP_HOST"] <?php echo $_SERVER["HTTP_HOST"]; ?>)</h4>
<br>
<h5> at _SERVER["SERVER_ADDR"] <?php echo $_SERVER["SERVER_ADDR"]; ?></h5>
<br>
<h5> from _SERVER["REMOTE_ADDR"] <?php echo $_SERVER["REMOTE_ADDR"]; ?></h5>
<a href="https://berndhs.wordpress.com">my worpress site</a>
<br>
<a href="https://github.com/berndhs">me at github</a>
<br>
<a href="phpinfo.php">what is here</a>
<br>
More to follow.
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=10188606; 
var sc_invisible=1; 
var sc_security="e6f4ceb4"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="web stats"
href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="//c.statcounter.com/10188606/0/e6f4ceb4/1/" alt="web
stats"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
</body>
</html>
