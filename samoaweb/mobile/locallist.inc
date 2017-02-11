<?php include_once("fancylinks.php"); ?>

    <ul class="nodots">
    <li> <?php TwoLinks ("ipv6-address-types.pdf","IPv6 Address Blurb pdf","(nw)"); ?> </li>
    <li> <?php TwoLinks ("http://githost/","Git Repos","(nw)"); ?> </li>
    <li> <?php TwoLinks 
                ("books/Qt-4.7.0-doc.d/index.html",
                 "Qt 4.7 docs", "(nw)"); ?> </li>
    <li>     <?php TwoLinks ("maemo/","Maemo","(nw)"); ?> </li>
    <li>        <?php TwoLinks ("books/","e-Books","(nw)"); ?> </li>
    <li>        <?php TwoLinks ("sites/drss","DRSS","(nw)"); ?> </li>
    <li>        <?php TwoLinks ("sites/egalite","Egalite","(nw)"); ?> </li>
    <li>        <?php TwoLinks ("sites/miniweb","Miniweb","(nw)"); ?> </li>
    <li>        <?php TwoLinks ("sites/notably","Notably","(nw)"); ?> </li>
    <li>        <?php TwoLinks ("sites/chronicon","Chronicon","(nw)"); ?> </li>
    <li>        <?php TwoLinks ("sites/sfbernd","BerndHS-Sourceforge","(nw)"); ?> </li>
      
    <li>        <?php TwoLinks ("sites/bernd2009/public_html","Bernd-2009","(nw)"); ?> </li>
   
    <li>        <?php TwoLinks ("temple/","template testing","(nw)"); ?> </li>
        
    <li>        <?php TwoLinks ("sites/bernd2009/public_html/test/","satview download","(nw)"); ?>
      </li>    
		<li>            <?php TwoLinks ("sites/toystore/catalog","toystore","(nw)"); ?>
		    </li>     
		<li>            <?php TwoLinks ("sites/toystore/catalog/admin/","toystore admin","(nw)"); ?>
		 </li>
		 
    <li>  <?php TwoLinks("pictures/pics/","pictures","(nw)"); ?>
   </li>
    <li>  <?php TwoLinks("papers/online-marketing/","marketing papers","(nw)"); ?>
       </li> 
    <li>  <?php TwoLinks("downloadable/","downloadable files","(nw)"); ?>
   </li>
    <li>  <?php TwoLinks("rpms/","RPM files","(nw)"); ?>
   </li>
    <li> <?php TwoLinks ("downloadable/miniweb-references.html",
                  "MiniWeb reference", "(nw)"); ?>
 </li>
    <li>  <?php TwoLinks("sites/books/cmake/cmake.html","Cmake reference","(nw)"); ?>
 </li>
    <li>  <?php TwoLinks("sites/books/git_manual/user-manual.html","Git reference","(nw)"); ?>
       </li>
    <li>  <?php TwoLinks("books/SQLite_Docs.d","SqLite reference","(nw)"); ?>
       </li>
    <li>  <?php TwoLinks("php-manual/index.html","PHP reference","(nw)"); ?>
      </li>
      <li> <?php TwoLinks ("books/asciidoc.html","AsciiDoc short reference"); ?></li>
      </ul>
<?php 

function is_it_local () {

  $client_address = $_SERVER["REMOTE_ADDR"];
  $pos = strpos ($client_address,"192.168.1.");
  return ($pos === 0);
}

if (is_it_local()) {

$adminsection = <<<'EOT'
  <div style="text-align:center;">
    <ul class="nodots">
     <li> <a href="sites/oscom-3">OsCom3</a> </li>
    </ul>
    <em><b>Local Admin Pages</b></em> 
      </div>
      <ul class="nodots">
    <li>  <a href="phpMyAdmin3/index.php" > MySql-Admin </a>
       </li>
      </ul>

EOT
;

  echo $adminsection;
}
?>
