<?php

echo "<pre>";
$uploaddir = '/opt/shared/upload/';

$allowed_html = "<em><p><b><br><small><big><code><i>" ;

$targetfile = 'newstitle.txt';
$uploadfile = $uploaddir . basename($targetfile);
$msg = strip_tags($_POST['newstitle'],$allowed_html);
$titlemsg = $msg;
$handle = fopen($uploadfile, 'w');
$titlebytes = fwrite ($handle,$msg);
fclose($handle);

$targetfile = 'newsbody.txt';
$uploadfile = $uploaddir . basename($targetfile);
$msg = strip_tags($_POST['newsbody'],$allowed_html);
$handle = fopen($uploadfile, 'w');
$bodybytes = fwrite ($handle, $msg);
fclose($handle);

echo $thenews ;

echo "Your news item <br><br>";
echo $titlemsg;
echo " <br>has been posted<br>";
echo '<input type="button" value="Go Back" onClick="history.go(-1)" />' ;

echo "</pre>";

?> 
