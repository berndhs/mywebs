<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<?php include_once("defs.php"); ?>
<?php include_once("homelinkvar.php"); ?>
<head>
<meta HTTP-EQUIV="refresh" content="900">
<title><?php echo my_hostname(); ?> Weather Page</title>
</head>

<body bgcolor="silver">
<div align="center">
<h1>
<?php echo $homelink; ?>
&nbsp;
<a id="topofpage">
Welcome to <?php echo my_hostname(); ?> Weather
</a>
&nbsp;
<?php echo $homelink; ?>
</h1>
</div>
<hr>
<div align="center">
<table bgcolor="silver">
<tr><td>
<?php include ("nav.php"); ?>
</td></tr>
</table>
</div>
<h3>Recent Satellite Pictures</h3>
The pictures here are downloaded every 15 minutes, assuming all
servers and the network are cooperating. The pictures here are the
last download that worked, and the data may be substantially older than that,
depending on the source. So far we have 
<a href="#europe">Europe</a>,
<a href="#canada">Eastern Canada</a>,
<a href="#goes-east">US lower 48 East (GOES-East)</a> and 
<a href="#goes-west">US lower 48 West (GOES-West)</a>. 
<?php 
function inpage_links() {
    echo '<span style="font-size:smaller">';
    echo '&nbsp;<a href="#europe">[Europe]</a>' ;
	echo '&nbsp;<a href="#canada">[Canada East]</a>' ;
    echo '&nbsp;<a href="#goes-east">[lower48-E]</a>' ;
    echo '&nbsp;<a href="#goes-west">[lower48-W]</a>' ;
    echo '</span>';
}
?>
<br>
Click on the images to go to
the agency which provides it (this will take you off site).
<?php
   function toplink() {
    echo '<span style="font-size:smaller;"><a href="#topofpage">[top of page]</a></span>';
   }
   function img_and_date ($file,$site) {
	  $time_now = time(0);  
	  printf ("<br>\nTime now: %s UTC &nbsp; &nbsp; %s local<br>\n",
	                gmdate ("Y-m-d H:i",$time_now),
					date ("r",$time_now));  
      echo '<a href="' . $site . 
             '" name="' . $site . 
             '" id="' . $site . 
             '" title="' . $site . 
               '">';
	  echo "<br>";  
      echo "\n" . '<img width="600" src="' . $file . '" alt="' . basename($file) . '">';
      echo "\n</a>\n";
   }
?>

<table bgcolor="silver" >

<tr>
<td>
<?php  printf ("<br>\n<hr width=\"%s\"><br>\n","20%");   ?>
<a id="goes-east">
<big>North America East</big> <small> from NOAA </small></a>
<?php toplink(); inpage_links(); ?>
<?php img_and_date("/pictures/daily/ECIR.JPG",
                  "http://www.noaa.gov");
?>
</td>
</tr>

<tr>
<td>
<?php  printf ("<br>\n<hr width=\"%s\"><br>\n","20%");   ?>
<a id="goes-west"> </a>
<big>North America West</big> <small> from NOAA </small>
<?php toplink(); inpage_links(); ?>
<?php img_and_date("/pictures/daily/WCIR.JPG",
                   "http://www.noaa.gov");
?>
</td>
</tr>
<tr>
<td>
<?php  printf ("<br>\n<hr width=\"%s\"><br>\n","20%");   ?>
<a id="canada"> </a>
<big>Canada</big> <small>from <a href="http://www.weatheroffice.gc.ca">http://www.weatheroffice.gc.ca</a> </small>
<?php toplink(); inpage_links(); ?>
<?php img_and_date("/pictures/daily/can.jpg",
                  "http://www.weatheroffice.gc.ca");
?>
</td>
</tr>
<tr>
<td>
<?php  printf ("<br>\n<hr width=\"%s\"><br>\n","20%");   ?>
<a id="europe">
<big>Europe</big> <small>from meto.gov.uk </small></a>
<?php toplink(); inpage_links(); ?>
<?php img_and_date("/pictures/daily/euro.jpg",
                  "http://www.meto.gov.uk");
?>
</td>
</tr>
</table>

</body>
</html>
