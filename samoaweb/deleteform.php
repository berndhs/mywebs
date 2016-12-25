<?php
   $allowed_html = "<b><i><em>";
   $allowed_html_text = htmlentities($allowed_html);

   include_once("newsdb_class.php");
   function logged_in() {
     return true;
   }
?>

<?php
   function make_table_row ($news) {
       echo "<tr>";
       echo "<td>";    // checkmark
       echo '<input type="checkbox" name="' . $news->indextag . '"'
            . "> delete &nbsp;" ;
       echo "</td>";
       echo "<td>";    // article headline  with linking

       echo '<div class="newsheadline" >' ;
       echo "\n";
       echo '<a style="text-decoration:none" onClick=' . "'showAbstract(" . '"'
             . "abst" . $news->indextag . '")' . "' > " ;
       echo stripslashes($news->title) ;
       echo '<span style="font-size:medium">+</span></a>';
       echo '<span style="font-size:small; color:#00FF00;">';
       echo '&nbsp;<a href="newsitem.php?item=' . $news->indextag  . '">[Story]</a>';
       echo "</span>\n</div>\n";

       echo "</td>";
       echo "</tr>";
   }
?>

   <strong>Status:&nbsp;&nbsp;</strong>
   <div style="color:red; text-align:baseline;">
   <?php
   
      $verify_func="delete";
      include_once ("verify.inc");
   
      $user_ok = logged_in();
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
   $user_ok = logged_in();
   if ($user_ok) {
?>

<div>
   <!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" name="deleteform" action="dodelete.php" method="POST">
   <table class="deletetable">
<?php
      $filer = new NewsFiler();
      $filer->CallLatestN("make_table_row",20);
?>
      <tr><td colspan="2">
          <div align="center"> 
             <input type="reset" value="Reset" >
             <input type="submit" value="Delete Checked Articles" >
           </div>
      </td> </tr>
   </table>
</form>
</div>

<?php
   } /* user ok */
?>
