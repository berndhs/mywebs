
<!DOCTYPE html>

<html>
<head>
</head>

<body>

 <script>
 function daFunc(whereto) {
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


<h1>
<div align="left">
 <button onclick="daFunc('desk')">Go To Desk</button>
 <br>
 <button onclick="daFunc('mobile')">Go To Mobile</button>
 </div>
 <br>
 <p id="showhere">
 </p>

</body>
</html>
