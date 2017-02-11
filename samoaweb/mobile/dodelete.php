<?php
include ("defs.php");
include ("newsdb_class.php");
   $appname = "berndprivate";
   $ses = "BHS";
   session_name($ses);
   session_start();

   $ses_id = session_id();


$filer = new NewsFiler();
$filer->LoadIndex();

$deletes = $_POST;

function keepit ($indexval, $deletearray) {
    if (!array_key_exists($indexval,$deletearray)) {
        return true;
    }
    return ! ($deletearray[$indexval] == "on") ;
}

/* don't recall what this was for
$filer->ReWriteIndexCond ("keepit",$deletes);
*/

foreach ($deletes as $delndx => $ison) {
    if ($ison == "on" ) {
        $filer->DeleteArticle(trim($delndx));
    }
}

redirect ("delete.php");


?>
<html>
<head>
</head>


<body>

<h1>Delete News Items</h1>
<?php



?>
You should not be here

</body>


</html>
