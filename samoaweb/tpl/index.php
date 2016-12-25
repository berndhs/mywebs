<?php

include_once("front.php");

$mypage = new HtmlPage("smith.html");

$values = array ('owner' => 'Smith, Smythe & Brown',
                 'title' => 'SSB Company',
                 'today' => 'today.php',
                 'picfile1' => '"foo.jpg"' );

$mypage->replace_tags($values);

$mypage->output();

?>

