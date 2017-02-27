<!DOCTYPE html>
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
?>


function login ()
{
    
    $the_host = "localhost";
    $the_user = "berndsat";
    $the_pass = "";
    $the_db = "satview";
    $con = mysql_connect($the_host, $the_user, $the_pass);
    $ok = mysql_select_db($the_db,$con);

    return $con;

}

function give_index($db_con, $imin, $imax)
{
    $query = "select ident, picname, storetime, remark from `satpics` where 1";
    
    if ($imin != "") {
        $query .= " and ident >= " . $imin;
    }
    if ($imax != "") {
        $query .= " and ident <= " . $imax;
    }
    $result = mysql_query ($query,$db_con);
   
    $nrows = mysql_num_rows($result);
    if ($nrows > 0) {
      echo "SATVIEW-INDEX\r\n";
      $r = 0;
      $fields = array("ident","picname","storetime","remark");
      while ($r<$nrows) {
        $row_array = mysql_fetch_assoc($result);
        echo "record " . $r . "\r\n";
        foreach ($fields as $f) {
          $rawval = trim($row_array[$f]);
          if (strlen($rawval) == 0) {
            $rawval = "0";
        	}
  	      $val = bin2hex($rawval);
  	      echo $f . " - " . $val . "\r\n";
        }
        $r++;
      }
    } else {
      header ("HTTP/1.0 204 No Data\r\n",false,204);
    }
}

function give_image($db_con, $ident, $picname)
{
  $query = "select `image` from `satpics` where "
       . "`ident`='"
    . mysql_real_escape_string($ident)
    . "' and `picname`='"
    . mysql_real_escape_string($picname)
    . "'";
  $res = mysql_query ($query, $db_con);
  $nrows = mysql_num_rows($res);
  if ($nrows > 0) {
    $row_array = mysql_fetch_row($res); 
    $len_array = mysql_fetch_lengths($res);
    echo "SATVIEW-ITEM\r\n" ;
    echo "LEN ". $len_array[0] . "\r\nx";
    echo bin2hex($row_array[0]);
  } else {
  
      header ("HTTP/1.0 204 No Data\r\n",false,204);
    
  }
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


// start page code

$supported = array ("index","item");
$funct= $_REQUEST["fn"];


$was_ok = FALSE;
if (in_array($funct,$supported)) {
  $con = login();
  if ($funct == "index") {
    $ndxmin = $_REQUEST["min"];
    $ndxmax = $_REQUEST["max"];
    
    give_index ($con,$ndxmin,$ndxmax);
    $was_ok=TRUE;
  } else if ($funct == "item") {
    $key1=  $_REQUEST["k1"];
    $key2=  $_REQUEST["k2"];
    $real_k1 = pack('H*',$key1);
    $real_k2 = pack('H*',$key2);
    give_image ($con,$real_k1,$real_k2);
    $was_ok=TRUE;
  }
  if ($con) {
    mysql_close($con);
  }
} else {
  $funct = "unknown funct";
}
if (isset ($berndscounterisdefined)) {
   if ($berndscounterisdefined == "yesitis") {
      countme();
      count_serve('query ' . $_SERVER['PHP_SELF'] . ' ' . $funct);
   }
}
if (!$was_ok) {
  report_bad_request();
}

?>
