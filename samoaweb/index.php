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
<title><?php include ("sethostvar.php"); echo $THIS_HOST_NAME; ?> Server</title>

<link rel="stylesheet" type="text/css" href="bernd-styles.css" >
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" >

</head>

<body class="critter">
<div align="center">
<h1>
<?php echo "Welcome to $THIS_HOST_NAME" ?>
</h1>
<a href="books/">Books</a>
<a href="news.php">News</a>
<a href="berndhs.com/">Berndhs.com</a>
<a href="moui/">moui</a>
<br>
<a href="berndhs.com/commute/">Videos</a>
<br>
<a href="additem.php">Add News</a>
</body>
</html>
