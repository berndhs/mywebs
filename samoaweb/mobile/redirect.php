<html>
<head>
</head>
<body>
<h1>
Header One
</h1>
<a name="bar">
Bar
</a>
<br>
&nbsp;
<h1>
Header Two
</h1>
<p>
<a name="foo">
<?php

//
//  Copyright (C) 2009 - Bernd H Stramm
//
echo "<xmp>";
var_dump ($_GET);
var_dump ($_REQUEST);
var_dump ($_SERVER);
$newplace = 'Location: http://www.bernd-stramm.com/miniscsim.php';
var_dump ($newplace);
echo "</xmp>";
// header($newplace);
?>
Foo
</p>
</body>
