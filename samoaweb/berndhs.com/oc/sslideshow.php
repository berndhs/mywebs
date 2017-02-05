<?php
/*
	PHP image slideshow - auto version - PHP5
*/
// set the absolute path to the directory containing the images
define ('IMGDIR', 'images/');
// same but for www
define ('WEBIMGDIR', 'images/');
// set session name for slideshow "cookie"
define ('SS_SESSNAME', 'slideshow_sess');
// global error variable
$err = '';
// start img session
session_name(SS_SESSNAME);
session_start();
// init slideshow class
$curr=""; $first=""; $list="";
$ss = new slideshow($err);
$ss->init();
// if (($err = $ss->init()) != '')
//{
//	header('HTTP/1.1 500 Internal Server Error');
//	echo $err;
//	exit();
//}
// get image files from directory
$ss->get_images();
// set variables, done.
list($curr, $caption, $first, $prev, $next, $last) = $ss->run();
/*
	slideshow class, can be used stand-alone
*/
class slideshow
{
	private $files_arr = NULL;
	private $err = NULL;
	
	public function __construct(&$err)
	{
		$this->files_arr = array();
		$this->err = $err;
	}
	public function init()
	{
		// run actions only if img array session var is empty
		// check if image directory exists
		if (!$this->dir_exists())
		{
			return 'Error retrieving images, missing directory';
		}
		return '';
	}
	public function get_images()
	{
		// run actions only if img array session var is empty
		if (isset($_SESSION['imgarr']))
		{
			$this->files_arr = $_SESSION['imgarr'];
		}
		else
		{
			if ($dh = opendir(IMGDIR))
			{
				while (false !== ($file = readdir($dh)))
				{
					if (preg_match('/^.*\.(jpg|jpeg|gif|png)$/i', $file))
					{
						$this->files_arr[] = $file;
					}
				}
				closedir($dh);
			}
			sort ($this->files_arr, SORT_LOCALE_STRING);
			$_SESSION['imgarr'] = $this->files_arr;
		}
	}
	public function run()
	{
		$curr = 1;
		$last = count($this->files_arr);
		if (isset($_GET['img']))
		{
			if (preg_match('/^[0-9]+$/', $_GET['img'])) $curr = (int)  $_GET['img'];
			if ($curr <= 0 || $curr > $last) $curr = 1;
		}
		if ($curr <= 1)
		{
			$prev = $curr;
			$next = $curr + 1;
		}
		else if ($curr >= $last)
		{
			$prev = $last - 1;
			$next = $last;
		}
		else
		{
			$prev = $curr - 1;
			$next = $curr + 1;
		}
		// line below sets the caption name...
		$caption = str_replace('-', ' ', $this->files_arr[$curr - 1]);
		$caption = str_replace('_', ' ', $caption);
		$caption = preg_replace('/\.(jpe?g|gif|png)$/i', '', $caption);
		$caption = ucfirst($caption);
		return array($this->files_arr[$curr - 1], $caption, 1, $prev, $next, $last);
	}
	private function dir_exists()
	{
		return file_exists(IMGDIR);
	}
	
}
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Slideshow</title>
    <style type="text/css">
	body{margin: 0;padding: 0;font: 100% Verdana, Arial, Helvetica, sans-serif;font-size: 14px;}
	div#gallery{border: 1px #ccc solid;width: 80%;margin: 20px auto;text-align: center;}
	div#gallery img{margin: 20px;border: 2px #004694 solid;}
	div#gallery p{color: #004694;}
	div#gallery div.pn{padding: 10px;margin: 0 5px;border-top: 1px #ccc solid;}
	a{color:#333;}
	a:hover{color:#cc0000;}
	a.sp{padding-right: 40px;}
    </style>
</head>
<body> 
<p id="demo"></p>

<button onclick="clearInterval(myVar)">Stop time</button>

<script>
var myVar = setInterval(function () {myTimer()}, 1000);
var count = 799;
var imgname = "IMG_0"+count+".JPG";
function myTimer() {
    var d = new Date();
    count += 1;
    document.getElementById("target").click();
}
</script>
    	<img src="<?=WEBIMGDIR;?><?=$curr;?>" alt="<?=WEBIMGDIR;?><?=$curr;?> not found" width="75%" />
	<div id="gallery">
        <p><?=$caption;?></p><div class="pn">
        	<a href="?img=<?=$first;?>">First</a> | <a href="?img=<?=$prev;?>" class="sp">Previous</a><a id="target" href="?img=<?=$next;?>">Next</a> 
		| <a href="?img=<?=$last;?>">Last</a>
        </div>
    	
    </div>
</body>
</html>
