
<html>
 <head>
  <title>Upload Test</title>
 </head>
 <body>
<div align="center">
<h1>The Upload test page</h1>
<hr>
<?php require('nav.html'); ?>
<hr>
<div>
<div align="left">
<hr />
 <?php echo '<p>Hello World</p>'; ?>
 <?php 
  $now = getdate();
  echo " It is ";
  $msg = date("r");
  echo $msg ; echo "\n<br>";
  print_r($now);
?>
<br>
<hr>
<div>
   <!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="getfile.php" method="POST">
   <table border="5" align="center" bgcolor="lightgreen">
      <tr> <td> 
         <!-- MAX_FILE_SIZE must precede the file input field -->
         <input type="hidden" name="MAX_FILE_SIZE" value="204800" />
         <!-- Name of input element determines name in $_FILES array -->
         <table border="0" cellspacing="2" cellpadding="2" bgcolor="lightblue">
            <tr>
                <td> Upload your local file: </td>
                <td><input name="userfile" 
                         type="file"/> </td>
            </tr>
            <tr>
                 <td> File name on host: </td>
                 <td><input type="text" name="targetfile" 
                           value="NewFile" /> </td>
            </tr>
          </table>
      </td></tr>
      <tr><td>
          <div align="center"> 
             <input type="reset" />
             <input type="submit" value="Upload File" />
           </div>
      </td> </tr>
   </table>
</form>
</div>
<hr>
<?php require('nav.html'); ?>
</body>
</html>
