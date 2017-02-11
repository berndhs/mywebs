<html>
 <head>
  <title>News Test</title>
 </head>
 <body>
<div align="center">
<h1>The News test page</h1>
<hr>
<?php include('nav.html'); ?>
<hr>
<div>
<div align="left">
<hr />
 <?php 
  $now = getdate();
  echo " It is: ";
  $msg = date("r");
  echo $msg ; echo "\n<br>";
  $thenews= "/opt/shared/upload/newsbody.txt";
  $theheadline= "/opt/shared/upload/newstitle.txt";
?>
<br>
<hr>
<div>
   <!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="getnews.php" method="POST">
   <table border="5" align="center" bgcolor="lightgreen">
      <tr> <td> 
         <!-- Name of input element determines name in $_FILES array -->
         <table border="0" cellspacing="2" cellpadding="2" bgcolor="lightblue">
            <tr>
                <td>Enter your headline:</td>
                 <td><textarea type="textarea" name="newstitle" 
                      rows = "1" cols="40" /> 
                     </textarea></td>
            </tr>
            <tr>
                 <td> Enter your message:</td>
                 <td><textarea type="textarea" name="newsbody" 
                      rows = "5" cols="40" /> 
                     </textarea></td>
            </tr>
          </table>
      </td></tr>
      <tr><td>
          <div align="center"> 
             <input type="reset" />
             <input type="submit" value="Upload News" />
           </div>
      </td> </tr>
   </table>
</form>
</div>
<hr>
<h2>The News
<input type=button value="Reload" onClick="location.reload()">
</h2>
<div align="left" bgcolor="red" fgcolor="darkgreen" >
<h3> <?php readfile($theheadline); ?>
     <small>( modified 
     <?php echo date("r",filemtime($theheadline)); ?> 
     )</small>
</h3>
<?php readfile($thenews);  ?>
</div>
<hr>
<?php include('nav.html'); ?>
</body>
</html>
