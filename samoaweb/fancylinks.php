<?php
function TwoLinks($link, $plain_name, $new_window_name = NULL) {
   echo '<a href="' . $link .'" > ' ;
   echo $plain_name . "</a>";
   if ($new_window_name) {
      echo '&nbsp;&nbsp;&nbsp;<span style="font-size:small"><a href="' . $link .'" target="_blank" >' ;
      echo $new_window_name . "</a></span>";
   }

}
?>