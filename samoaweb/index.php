<?php 

function is_local () {
  $client_address = $_SERVER["REMOTE_ADDR"];
  $pos192 = strpos ($client_address,"192.168.1.");
  $pos127 = strpos ($client_address,"127.0.0.1");
  $pos1 = strpos ($client_address,"::1");
  $pos_fec0 = strpos ($client_address,"fec0::");
  $pos_fe80 = strpos ($client_address,"fe80::");
  return (($pos192 === 0) || ($pos127 === 0) || ($pos1 === 0)
          || ($pos_fec0 === 0) || ($pos_fe80 === 0));
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional //EN">

<html>
<head>
<title><?php include ("sethostvar.php"); ?> Server</title>

<link rel="stylesheet" type="text/css" href="bernd-styles.css" >
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" >

</head>

<body class="critter">
<div align="center">
<h1>
<?php echo "Welcome to $THIS_HOST_NAME" ?>
</h1>
<h4>(on <?php $_SERVER ?>)</h4>
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
