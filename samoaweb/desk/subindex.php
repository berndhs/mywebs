<!DOCTYPE html>

<html>
<head>
<title><?php include ("sethostvar.php"); ?> Server</title>

<link rel="stylesheet" type="text/css" href="berndhs-styles.css" >
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" >
<?php $_SERVER = $_ENV; ?>

</head>

<body>
<script>
function popupDeskMobile() {
  alert("Desk or Mobile goes here");
}

</script>
<?php include_once("google-measure.php") ?>
<div align="left">
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #ff8e00;
}
</style>

 <div class="dropdown">
  <input type="image" src="burger.png" class="dropbtn">
  <div class="dropdown-content">
    <a href="/desk/subindex.php">Desktop</a>
    <a href="/mobile/subindex.php">Mobile</a>
    <a href="/index.php">Top</a>
  </div>
</div>
</div>
<div class="critter" align="center">
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
