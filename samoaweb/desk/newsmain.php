<?php
include_once ("newsdb_class.php");

function news_div ($news) {
   echo ("<li>\r\n");
   echo "item <strong>" . $news->indextag . " - </strong>" 
          . date ("d M Y H:i",$news->indextag) . " - "
         . "<strong>" . stripslashes($news->title) . "</strong>"
         . "\n";
   echo '<span style="font-size:small; color:#FF00BB;">' . "\n";
   echo "<p>" .stripslashes($news->abstract) . "...</p>" ;
   echo "<p>" . stripslashes($news->article) . "</p>";
   echo "\n</span>\n";
   echo ("</li>\r\n");

}

function start_nodot_list () {
  echo '<ul style="list-style-type:none;">';
}

function end_nodot_list () {
  echo ("</ul>");
}
$newsfiler = new NewsFiler();
start_nodot_list ();
$newsfiler->CallLatestN ("news_div",10);
end_nodot_list ();
?>


