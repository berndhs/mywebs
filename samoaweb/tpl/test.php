<?php

include_once("linksarray.php");

$grp = new LinkGroup();

$lnk = new Link("http://marcopolo","Home");
$lnk->AddSpecial('target="_root"');
$lnk->AddSpecial('border="2"');

$grp->AddLink2("http://www.cnn.com","CNN");
$grp->AddLink3("http://aaa.cia.gov","CIA",'color="black"');
$grp->AddLink1($lnk);

$vert_html = $grp->HtmlAllAnchors('<br>\n'. "\n");
$horz_html = $grp->HtmlAllAnchors(' | ' . "\n");

echo "Dump:\n";
var_dump($grp);

echo "Vertical:\n" ;
echo $vert_html;
echo "\nHorizontal:\n";
echo $horz_html;
echo "\n";


?>
