
<!DOCTYPE html>

<html>
<head>

<link rel="stylesheet" type="text/css" href="berndhs-styles.css" >

<title><?php echo $_SERVER["HOST_NAME"]; ?> Server</title>
</head>

<body>
<script>
var uag = navigator.userAgent;
var isMobile = uag.includes("ndroid");
if (isMobile) {
  loco = "Mobile";
} else {
  loco = "Desk";
}
var txt = document.createTextNode(loco);
document.body.appendChild(txt);

   document.getElementsByName("deskbutton").[0].setAttribute("class",loco);
   document.getElementsByName("mobilebutton").[0].setAttribute("class",loco);
</script>
<script>
 function daRedirect(whereto) {
   var uag = navigator.userAgent;
   var yorn = uag.includes("ndroid");
   var loco = whereto + "/";
   var pro = document.location.protocol + "//";
   var host = document.location.hostname;
   var filename = "subindex.php";
   var path = pro + host + "/" + loco + filename;
   document.location.assign(path);
   return path;
 }
</script>

<div align="center">
<h1>
</div>

The Index
<h1>
<div align="left">
 <button name="deskbutton" onclick="daRedirect('desk')">Go To Desk</button>
<br>
<br>
 <button name="mobilebutton" onclick="daRedirect('mobile')">Go To Mobile</button>
 </div>
 <br>
 <p id="showhere">
 </p>

</body>
</html>
