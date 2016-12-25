<?php
error_reporting(0);
$allowed_html = "<p><i><em><b><small><big><code>";
$orig="/</"; 
$repl="&lt;";
$tmp = preg_replace ($orig,$repl,$allowed_html);
$orig="/>/";
$repl="&gt;";
$allowed_html_text = preg_replace ($orig,$repl,$tmp);
$basedir = "/opt/www/" ;

include ('sethostvar.php');

function my_hostname() {
    if (isset($_SERVER)) {
        $my_server = $_SERVER['SERVER_NAME'];
        $uc = ucfirst($my_server);
        return $uc;
    }
    return "Localhost";
}

function proto_hdr() {
   if (isset($_SESSION['protocol'])) {
      return $_SESSION['protocol'] . '://';
   }
   return 'http://';
}


function redirect ($page) {
   $new_page = "Location: " . proto_hdr() .
                 $_SERVER['HTTP_HOST'] .
                dirname($_SERVER['PHP_SELF']) .
                 "/" . $page;
   header($new_page);
}

?>
