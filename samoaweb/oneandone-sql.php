<?php
    $host_name  = "db670108266.db.1and1.com
";
    $database   = "db670108266
";
    $user_name  = "dbo670108266
";
    $password   = "<Enter your password here. >";


    $connect = mysqli_connect($host_name, $user_name, $password, $database);
    
    if(mysqli_connect_errno())
    {
    echo '<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>';
    }
    else
    {
    echo '<p>Verbindung zum MySQL Server erfolgreich aufgebaut.</p>';
    }
?>
