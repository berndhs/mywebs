<?php

class HtmlPage {

var $html;

function HtmlPage ($thefile = "tmpl.html") {

   if (file_exists($thefile)) {
      $this->html = implode("",file($thefile));
   } else {
      $this->html 
          = "<html>\n<head><title>Empty</title></head><body>Empty</body></html>";
   }
}

function get_php ($filename) { // do a translation into a variable
    ob_start();   
    include($filename);
    $buf = ob_get_contents();
    ob_end_clean(); 
    return $buf;
}

function replace_tags($newvalues)
{
    if (sizeof($newvalues) > 0) {
        foreach ($newvalues as $tag => $data) {
            $realtag = "{" . $tag . "}";
            if (substr($tag,0,1) == '@') {
                if (file_exists($data)) {
                    $data = $this->get_php($data);
                    $realtag = "{" . substr($tag,1) . "}";
                }
            }
            $this->html = eregi_replace($realtag , $data,
                    $this->html);
        }
    } else {
        die("No tags designated for replacement.");
    }
}

function output() {
  print_r ($this->html);
}


}



?>
