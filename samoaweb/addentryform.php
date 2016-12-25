<?php
   $allowed_html = "<b><i><em><a>";
   $allowed_html_text = htmlentities($allowed_html);
?>

   <strong>Status:&nbsp;&nbsp;</strong>
   <div style="color:red; text-align:baseline;">
   <?php
   
      $verify_func="submit";
   
      $user_ok = true;
      if ($user_ok) {
          echo "User <strong>" . $user_ok . "</strong> logged in";
          echo '&nbsp;<input type="button" value="Logout" '; 
          echo "onClick='" . 'document.location="logout.php"' . "'><br>\n";
      } else {
          echo "unknown visitor<br>\n";
          include ("login.inc");
      }
   ?>
   </div>
   <br>

<?php
   $user_ok = true;
   if ($user_ok) {
?>

<div>
   <!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" name="articleform" action="additem.php" method="POST">
   <table class="addtable">
      <tr> <td> 
         <!-- Name of input element determines name in $_FILES array -->
         <table class="addentry" >
            <tr>
                <td> Title:</td>
                 <td><input type="text" name="newtitle" size="60" maxlength="256"></td>
            </tr>
            <tr>
                 <td> Article Abstract:</td>
                 <td><textarea type="textarea" name="newabstract" 
                      rows="3" cols="48" ></textarea></td>
            </tr>
            <tr>
                 <td> Article Body:</td>
                 <td><textarea type="textarea" name="newmessage" 
                      rows="8" cols="48" ></textarea></td>
            </tr>
            <tr>
                 <td> &nbsp; </td>
                 <td>
                       <small> allowed html: <?php echo $allowed_html_text; ?> </small> </td>
            </tr>
          </table>
      </td></tr>
      <tr><td>
          <div align="center"> 
             <input type="reset" value="Reset" >
             <input type="submit" value="Add Article" >
           </div>
      </td> </tr>
   </table>
</form>
</div>

<?php
    }  /* user was ok */
?>
