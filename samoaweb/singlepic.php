<?php


/****************************************************************
 * This file is distributed under the following license:
 *
 * Copyright (C) 2017, Bernd Stramm
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License
 *  as published by the Free Software Foundation; either version 2
 *  of the License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin Street, Fifth Floor, 
 *  Boston, MA  02110-1301, USA.
 ****************************************************************/


function login ()
{
    
    $the_host = "localhost";
    $the_user = "berndsat";
    $the_pass = "";
    $the_db = "satview";
    $con = new mysqli ($the_host, $the_user, $the_pass,$the_db);
    if ($con->connect_errno) {
        // The connection failed. What do you want to do? 
        // You could contact yourself (email?), log the error, show a nice page, etc.
        // You do not want to reveal sensitive information

        // Let's try this:
        echo "Bad database connection<br>";

        // Something you should not do on a public site, but this example will show you
        // anyways, is print out MySQL error related information -- you might log this
        echo "Error: Failed to make a MySQL connection, here is why: <br>\n";
        echo "Errno: " . $mysqli->connect_errno . "<br>\n";
        echo "Error: " . $mysqli->connect_error . "<br>\n";
    
        // You might want to show them something nice, but we will simply exit
        return "";
    }
    return $con;
}

function report_bad_request ()
{
if (isset ($berndscounterisdefined)) {
   if ($berndscounterisdefined == "yesitis") {
      count_serve('query bad: ' . $_SERVER['PHP_SELF'] . ' ' . $funct);
   }
}  
header ("HTTP/1.1 400 Bad Request Format\r\n");
}

function whole_page()
{
  $req = $_REQUEST;
  $ident = $req["t"];
  $pname = $req["pic"];
  echo "they want time " . $ident . " and pic " . $pname . "<br>\n"; 
  $con = login();
  $query = "select stamp, image from satpics where ident = '" . $ident . "'"
     . " and picname = '" . $pname . "' limit 1;";
  $result = $con->query($query);
  $result->data_seek(0);
  $allofit = $result->fetch_assoc();
  $imgdata = $allofit["image"];
  $destfile = tempnam("/tmp","img");
  $daPath =  $destfile;
  $fd = fopen($daPath,"w");
  fwrite($fd,$imgdata);
  fflush($fd);
  //fclose($fd);
  system("sync;sync");
  echo "you are here " . getcwd();
  echo "<br>wrote tile " . $daPath . " size " . filesize($daPath) . "<br>\n\r";
  return $fd ; // $daPath;
}
?>
<!DOCTYPE html>
<html>
<title>Weather Sat Image</title>
<head>
</head>
<body>
<h1>Image <?php echo $_REQUEST["pic"]; ?></h1>
<?php $imgFD = whole_page() ?>
<br>
<img width="250" height="250" src=<?php echo '"data:image/jpeg;' . imagejpeg($imgFD) . '"' ?> >
</body>
</html>

