
<!DOCTYPE html>

<html>
<head>

<link rel="stylesheet" type="text/css" href="berndhs-styles.css" >

<title>
<?php echo $_SERVER["HOST_NAME"]; 
if ($_SERVER["HOST_NAME"] == "localhost") {
  $local = "yes";
} else {
  $local = "no";
}
?> Server</title>
</head>

<body onloaded="alert('loaded')">
<script>
founction initIndex() {
var uag = navigator.userAgent;
var isMobile = uag.includes("ndroid");
var loco;
var tallness;

if (isMobile) {
  tallness = "-tall";
} else {
  alert("not mobile"):
  tallness  "-short";
}
document.getElementsByName("popbody").[0].setAttribute("class","dropdown-content" + tallness);
}
</script>
<script>
 function daRedirect(whereto) {
   var uag = navigator.userAgent;
   var yorn = uag.includes("ndroid");
   var loco = whereto + "/";
   var pro = document.location.protocol + "//";
   var host = document.location.hostname;
   var filename = "subindex.php";
   var path = pro + host + "
   /" + loco + filename;
   document.location.assign(path);
   return path;
 }
</script>

<div align="center">
<h1>
</div>

The Index
<h1>
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

.dropdown-content-tall a {
    color: black;
    padding: 24px 32px;
    text-decoration: none;
    display: block;
}

.dropdown-content-short a {
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
  <input type="image" src="burger128.png" class="dropbtn" value="">
  <div name="popbody" class="dropdown-content">
    <a href="/desk/subindex.php">Desktop</a>
    <a href="/mobile/subindex.php">Mobile</a>
  </div>
</div>
</div>
<p align="center">
<?php echo $_SERVER["SERVER_NAME"]; ?>
</p>
<p align="left">
<a href="./adminer.php">database adminer</a>
<br>
<a href="php_manual/php-chunked-xhtml/index.html">php manual</a>
<br>
<a href="phpboard/index.php">ChatBoard</a>
<br>
<a href="http://berndhs.com">Website</a>
<br>
<a href=<?php echo "\"satserv-sqli.php\""; ?> >Satellites</a>
</p>

</body>
</html>
