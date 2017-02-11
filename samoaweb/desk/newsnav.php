<?php
include_once("defs.php");

function PlainLink($link, $plain_name) {
   echo '<a href="' . $link .'" > ' ;
   echo $plain_name . "</a>";

}

function spacing ($numspaces = 2) {
  for ($spc=0; $spc<$numspaces; $spc++ ) {
    echo "&nbsp;";
  }
}

function style ()
{
  $mystyle = "border-style:solid; border-width:1px; text-align:left;"
             . " text-transform:capitalize;border-color:#D0D000";
  return $mystyle;
}

function newslinks () { 
  $mylinks = array (
    "home" => "index.php",
    "news" => "newsitem.php",
    "submit" => "submit.php",
    "delete" => "delete.php"
  );
  printf ("<div style=\"%s\">\r\n",style());
  printf ("News nav:&nbsp");
  foreach ($mylinks as $name => $link) {
    spacing();
    PlainLink ($link,$name);
  }
  printf ("\r\n</div>\r\n");
}

?>
