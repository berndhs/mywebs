<?php

// 
// helps with standardised links
//

class Link {

var $url;
var $tag;
var $special;


function Link($the_url = "http://",$the_tag = "") {
    $this->url = $the_url;
    $this->tag = $the_tag;
    $this->special = array();
}

function Url() {
    return $this->url;
}

function Tag() {
    return $this->tag;
}

function Special () {
    return $this->special;
}

function AddSpecial($spc) {
    $this->special[] = $spc;
}

function HtmlAnchor() {
    $html = '<a href="' . $this->url . '"' ;
    foreach ($this->special as $i => $spc) {
         $html .= ' ' . $spc;
    }
    $html .= '>' . $this->tag . '</a>';
    return $html;
}

function HtmlAnchorSpecial ($mspc ) {
    $html = '<a href="' . $this->url . '"' ;
    foreach ($this->special as $i => $spc) {
         $html .= ' ' . $spc ;
    }
    $html .= $mspc . '>' . $this->tag . '</a>';
    return $html;
}


}

class LinkGroup {

var $links;
var $count;

function LinkGroup () {
   $this->html = "";
   $this->links = array();
   $this->count = 0;
   $this->iterate = 0;
}

function AddLink1 ($lnk) {
    $this->count++;
    $this->links[] = $lnk;
}

function AddLink2 ($url, $tag) {
    $this->links[] = new Link($url,$tag);
}

function AddLink3 ($url, $tag, $special) {
    $lnk = new Link ($url, $tag);
    $lnk->AddSpecial($special);
    $this->links[] = $lnk;
}

function Count() {
    return $this->count;
}

function Links() {
    return $this->links;
}

function HtmlAllAnchors($sep = " ") {
    $anch = array();
    foreach ($this->links as $i => $lnk) {
        $anch[] = $lnk->HtmlAnchor();
    }
    return implode ($sep,$anch);
}


function HtmlAllAnchorsSpecial($sep, $spc) {
    $anch = array();
    foreach ($this->links as $i => $lnk) {
        $anch[] = $lnk->HtmlAnchorSpecial($spc);
    }
    return implode ($sep,$anch);
}

}



