<?php
include_once ("newsdb_class.php");

function news_par ($news) {
   echo '<div class="newsheadline" id="left'. $news->indextag . '">' ;
   echo "\n".'<p style="text-indent:0;">';
   echo '<a style="text-decoration:none" onClick=' . "'showAbstract(" . '"' 
         . "abst" . $news->indextag . '")' . "'" 
         . " onMouseOver='headUnderline(" . '"left' . $news->indextag . '")' . "'"
         . " onMouseOut='headNoUnderline(" . '"left' . $news->indextag . '")' . "'"
         .  " > " ;
   echo stripslashes($news->title) ;
   echo ' <span style="font-size:x-small;text-decoration:underline">[short]</span>';
   echo "</a>\n";
   echo '<span style="font-size:x-small; color:#00FF00;">';
   echo '&nbsp;<a href="newsitem.php?item=' . $news->indextag  . '">[full&nbsp;story]</a>';
   echo "</span>\n</p></div>\n";
   echo "\n\n";

}
$newsfiler = new NewsFiler();

$newsfiler->CallLatestN ("news_par",10);

?>


