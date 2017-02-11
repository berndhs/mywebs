<?php
// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.
$uploaddir = '/opt/shared/upload/';
$targetfile = $_POST['targetfile'];
$uploadfile = $uploaddir . basename($targetfile);

echo '<pre>';
print_r($_POST);
echo "Target file: " ;
echo $_POST['targetfile'] ; echo "\n<br>";
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded ";
    echo "to file " . $uploadfile ; echo "\n<br>" ;
    echo "_FILES: " ; print_r($_FILES);
} else {
    echo "Cannot create ";
    echo $uploadfile ; echo "\n<br>" ;
    echo "_FILES: ";  print_r($_FILES);
}

//echo 'Here is some more debugging info:';
//print_r($_FILES);
//
echo "</pre>";

?> 
