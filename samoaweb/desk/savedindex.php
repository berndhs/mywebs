<?php 
   $myid = 'marco' . session_id();
   $sc = setcookie($myid, $_SERVER['REMOTE_ADDR'], time() + 60);    
   $sctrace = "pre-header" ;
   include ("defs.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Marcopolo Server</title>

<script language="javascript">
<!--

wmtt = null;
function showToolTip (id) {
   wmtt = document.getElementById (id);
   wmtt.style.display = "block";
}

document.onmousemove = updateToolTip;

function updateToolTip(e) {
	x = (document.all) ? window.event.x + document.body.scrollLeft : e.pageX;
	y = (document.all) ? window.event.y + document.body.scrollTop  : e.pageY;
	if (wmtt != null) {
		wmtt.style.left = (x + 20) + "px";
		wmtt.style.top 	= (y + 20) + "px";
	}
}
function hideToolTip() {
   wmtt.style.display="none";
}


//-->
</script>

<link rel="stylesheet" type="text/css"
  href="bernd-styles.css" 
/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

</head>

<body >
<div align="center">
<h1 class="pagetitle">Welcome to Marcopolo</h1>
</div>
<div align="center">

<div class="mypage">
<table class="navtop">
<tr><td>
&nbsp;
<?php include ("nav.php"); ?>
&nbsp;
</td></tr>
</table>
</div>
<hr>

<div class="tooltip" id="remotesites">
   Links to sites served outside Marcopolo, you will leave 
this intranet.
</div>

<div class="tooltip" id="localsites">
   Sites on the local intranet. No outside connection is necessary.
</div>


<div align="center">
<table>
   
   <tr>
   <td >
      <div >
      <table cellspacing="2" cellpadding="2">
      <tr>
      <th><span class="hdr" 
                    onMouseOver="showToolTip('remotesites')"
                   onMouseOut="hideToolTip()"
           />
                &nbsp;Remote&nbsp;
           </span></th>
      </tr>
      <tr >
      <td>
      <div align="center"><?php include ("remotelist.inc"); ?>
      </div>
      </td>
      </tr>
      </table>
      </div>
   </td>
   <td width="25%">
      &nbsp;
   </td>


   <td>
      <div >
      <table  cellspacing="2" cellpadding="2" >
      <tr>
      <th ><span class="hdr" 
                   onMouseOver="showToolTip('localsites')"
                   onMouseOut="hideToolTip()"
           />
                &nbsp;Local&nbsp;</span></th>
      </tr>
      <tr>
      <td>
      <div align="center"><?php include ("locallist.inc"); ?></div>
      </td>
      </tr>
      <tr>
      </table>
      </div>
   </td>

   </tr>
</table>
</div>


<br>
<hr>
<div align="center" id="footer">
<table class="navbottom">
<tr><td>
 <?php include ("nav.php"); ?> 
</td></tr>
</table>
</div>
</div>
</body>
</html>
