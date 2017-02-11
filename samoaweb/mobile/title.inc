<?php

function titlestring ($title) {
   $host = $_SERVER["HTTP_HOST"];
   if ($host == "marcopolo") {
       $img = '<a href="/" title="Home" style="border-style:none;margin:0px;padding:0px;border-width:0px;"><img src="mp.png" alt="Server Home" style="margin:0px;padding:0px;border-width:0px;vertical-align:baseline;"></a>';
       return $img . "&nbsp;" . $title . "&nbsp;" . $img ;
   }
   return $title;
}

?>
