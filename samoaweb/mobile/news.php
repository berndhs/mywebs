<?php

$newsfile = "listlinks.php";

    function interpret_page($page) 
    {
      ob_start();
      include ($page);
      $filebuf = ob_get_contents();
      ob_end_clean();
      return $filebuf;
    }

    function modify_HTML($str)
    {
       $safetags = "<HEAD><TITLE><BODY>".
            "<BR><P><LI><OL><UL>";
 //      $safetags = "<html><head><title><body><br><li><ol><ul>";
$safetags = "<html><div><i><b>";

        $search = array(
            "/<!--.+?-->/is",
            "/<script[^>]*?>.*?<\/script>/is",
            "/<style[^>]*?>.*?<\/style>/is",
            "/([\r\n])[\s]+/is",
            "/(\ \t)+/",
            "/HTTP\/1.*Content-Type: text\/html/is" ,
            "/<BODY([^>]*)>/is"
        );

        $replace = array(

            "",
            "",
           "",
	    "",  /* was rn */
            "",
            "" ,
            "<BODY BGCOLOR=\"#FFFFFF\">"
            );

        $safe_txt1 = preg_replace($search, $replace, $str);
        $safe_txt2 = strip_tags($str,$safetags);

        $safe_txt3 = preg_replace (
            array("/(<P>){2,}/i", "/(<BR>){3,}/i"),
            array("", ""),

            $safe_txt2);

      $safe_txt4= preg_replace('/[\x80-\xFF]/', '', $safe_txt3);
      $safe_txt4 = preg_replace('/\&nbsp/',' ',$safe_txt4);
      $spaces = array("  ", "\t", " \t", "\t ");
       $safe_txt4 = str_replace($spaces, "", $safe_txt4);
      $safe_txt4 = preg_replace('/(\r\n)+/',"\r\n",$safe_txt4);
      $safe_txt4 = preg_replace('/(\n)+/',"\n",$safe_txt4);
      $safe_txt4 = preg_replace('/(;)+/',";",$safe_txt4);

        return $safe_txt4;
    }

$htmlpage = $newsfile;
$site = "http://192.168.1.152/";
$newspage = $site . $htmlpage;
$rsslink = $site . "news.php";
$headline = "Something new at your local server";

$newsitem = interpret_page($htmlpage);

$return = array (
		 array("headline" => $headline,
     "link" => $newspage,
     "description" => $newsitem
		       )
		 );

$now = date("D, d M Y H:i:s T");

$output = "<?xml version=\"1.0\"?>
            <rss version=\"2.0\">
                <channel>
                    <title>Pirx RSS</title>
                    <link>" . $rsslink . "</link>
                    <description>Pirx RSS Feed</description>
                    <language>en-us</language>
                    <pubDate>$now</pubDate>
                    <lastBuildDate>$now</lastBuildDate>
                    <docs>" . $site . "</docs>
                    <managingEditor>bernd.stramm@gmail.com</managingEditor>
                    <webMaster>bernd.stramm@gmail.com</webMaster>
            ";
            
foreach ($return as $line)
{
$descr = modify_HTML($line['description']);
    $output .= "<item><title>".htmlentities($line['headline'])."</title>
                    <link>".htmlentities($line['link'])."</link>
<description>"
."<html><body>"
.
htmlentities($descr)
. "</html></body>"
//$line['description']
. "</description>
</item>
";
/*
<description>".htmlentities(strip_tags($line['description']))."</description>
                </item>";
*/
}
$output .= "\r\n" . "</channel>\r\n</rss>";
header("Content-Type: application/rss+xml");
echo $output;
?>

