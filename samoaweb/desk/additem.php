<?php include("defs.php"); ?>
<?php 
/*
   error_reporting(0);
*/
include ("newsnav.php");
   
?>
<?php
   include ("newsdb_class.php");

$nowname = (string) time();
$article = new NewsObj($nowname);
$filer = new NewsFiler();


$article->SetTitle($_POST["newtitle"]);
$article->SetAbstract($_POST["newabstract"]);
$article->SetArticle($_POST["newmessage"]);

$article->Normalize();
$filer->WriteItem($article);

redirect ("submit.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
 <head>
 
  <title>Add News</title>
 </head>
 <body>


<div align="center">
   <h1>Add News Item</h1>
</div>

<br>


</body>
</html>
