<?php
include ("defs.php");
include_once ("newsdb_class.php");

function StartChannel ($title, $hostlink, $descr)
{
  $default_author = "webmaster@pirx.com";
  $text =  "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\r\n";
  $text .= "<rss version=\"2.0\">\r\n";
  $text .= "<channel>\r\n";
  $text .= "<title>" . $title . "</title>\r\n";
  $text .= "<link>" . $hostlink . "</link>\r\n";
  $text .= "<dc:creator>" . $default_author . "</dc:creator>\r\n";
  $text .= "<description>" . $descr . "</description>\r\n";
  return $text;
}

function FinishChannel ()
{
  $text = "</channel>\r\n</rss>\r\n";
  return $text;
}

function RSSHost ()
{
  $h = "localhost";
  
  return $h;
}

function MakeRssItem ($newsitem)
{
  $r="";
  $host = RSShost();
  $scheme = "http://";
  $itempage = $scheme . $host . "/newsitem.php?item=" . $newsitem->indextag;
  $r .= "<item>\r\n";
  $r .= "<title>" . $newsitem->title . "</title>\r\n";
  $r .= "<link>" . $itempage . "</link>\r\n";
  $r .= "<description>" . 
               htmlentities($newsitem->article) . 
         "</description>\r\n";
  $r .= "<guid isPermaLink=\"false\">" . $scheme . $host . " article " .
                 $newsitem->indextag . "</guid>\r\n";
  $r .= "</item>\r\n";
  return $r;
}

function NoNews ()
{
  $no = "<item><title>No Title</title><link>" . $_SERVER["HTTP_HOST"] 
     . "</link><description>no news today</description></item>";
  return $no;
}

$host = RSSHost();
$scheme = "http://";
$descr = "News from Bernd's Website";
$news_source = new  NewsFiler();
$xml = StartChannel ($host . " News ", $scheme . $host, $descr);
$xml .= $news_source->AppendLatestN ("MakeRssItem", 10);
//$xml .= NoNews ();
$xml .=  FinishChannel ();
ob_start();
header ("Content-type: text/rss+xml");
echo $xml;
?>
