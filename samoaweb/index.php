
<!DOCTYPE html>

<html>
<head>
<title><?php include ("sethostvar.php"); ?> Server</title>
</head>

<body>

<script>
 function daRedirect(whereto) {
   var uag = navigator.userAgent;
   var yorn = uag.includes("ndroid");
   var loco = whereto + "/";
   var pro = document.location.protocol + "//";
   var host = document.location.hostname;
   var path = pro + host + "/" + loco + "index.php";
   document.location.assign(path);
   return path;
 }
</script>

<dev align="center">
<h1>
</dev>


<h1>
<div align="left">
 <button onclick="daRedirect('desk')">Go To Desk</button>
<br>
<br>
 <button onclick="daRedirect('mobile')">Go To Mobile</button>
 </div>
 <br>
 <p id="showhere">
 </p>

</body>
</html>
