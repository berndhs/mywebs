<?php

include_once("defs.php");
include_once("tpl/linksarray.php"); 
$nav = new LinkGroup();
$nav->AddLink3 ("http://" . my_hostname() ,
                 '<img src="/mp.png" border="0" alt="MP-Logo" style="vertical-align:text-bottom" >',
                 'title="Go to Server home" '
                 );
$nav->AddLink2 ("weather.php", "Satellite Weather");
$nav->AddLink2 ("http://githost","Git Repo Host");
$nav->AddLink2 ("index.php", "Home");

$nav_horizontal = $nav->HtmlAllAnchors (" | ");
$nav_vertical = $nav->HtmlAllAnchors ("<br>\n");

?>

