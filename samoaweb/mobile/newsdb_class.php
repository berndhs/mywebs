<?php

  /** @brief NewsObj is a news article with some additional info
   * separated out:
   *   indextag  is a unique identifier for the object
   *   title, abstract are what you think
   *   article is the full text body of the article
   *
   */

class NewsObj {
var $title;
var $abstract;
var $article;
var $indextag;
var $limits =  array ("title" => 80, "abstract" => 300 );


    function NewsObj ($the_index = "0") {
        $this->indextag = $the_index;
        $this->title = "article without title";
        $this->abstract = "no abstract";
        $this->article = "";
    }
    function Limits () {
        return $this->limits;
    }

    function SetLimits ($the_limits) {
        $this->limits["title"] = $the_limits["title"];
        $this->limits["abstract"] = $the_limits["abstract"];
    }
    function SetArticle($the_art) {
        $this->article = $the_art;
    }
    function SetTitle($the_title) {
        if (strlen(trim($the_title)) > 0) {
            $this->title = substr(trim($the_title),0,$this->limits["title"]);
        } else {
            $this->title = "";
        }
    }
    function SetAbstract($the_abs) {
        if (strlen(trim($the_abs)) > 0) {
            $this->abstract = substr(trim($the_abs),0,$this->limits["abstract"]);
        } else {
            $this->abstract = "";
        }
    }
    function SetIndexTag($the_tag) {
      $this->indextag = $the_tag;
    }

    function Normalize() { // make sure all fields are filled, if not take data from Article
        if (strlen($this->abstract) == 0) {
            $this->abstract = substr(ltrim($this->article), 0, $this->limits["abstract"]);
        }
        if (strlen($this->abstract) > $this->limits["abstract"]) {
            $this->abstract = substr(ltrim($this->abstract), 0, $this->limits["abstract"]);
        }
        if (strlen($this->title) == 0) {
            $this->title = substr(ltrim($this->abstract), 0, $this->limits["title"]);
        }
        if (strlen($this->title) > $this->limits["title"]) {
            $this->abstract = substr(ltrim($this->title), 0, $this->limits["title"]);
        }
    }
}

class NewsFiler {

  var $host;
  var $user;
  var $pass;
  var $dbname;
  var $tablename;
  var $conn;
  var $is_open;
  var $index;

    function NewsFiler () {
      $this->host ="localhost";
      $this->user = "bernd_cronkit";
      $this->pass = "quetzalcoatl";
      $this->dbname = "bernd_thenews";
      $this->tablename = "mainpage";
      $this->conn = FALSE;
      $this->index =  array();
    }

    function Open () {
      $this->conn = mysql_connect ($this->host, $this->user, $this->pass);
      if ($this->conn) {
	$this->is_open = TRUE;
      } else {
	$this->is_open = FASLE;
      }
    }
   
    function Close() {
      mysql_close($this->conn);
    }


    function WriteItem ($news_item) {
      $this->LoadIndex();
      if (strtolower(get_class($news_item)) != "newsobj") {
            return FALSE;
        }
        if (!$this->is_open) {
          $this->Open();
	}
        $tag = $news_item->indextag;
        $news_item->Normalize();
        $query = "insert into `" . $this->tablename . "`"
           . "(`indextag`, `headline`, `abstract`, `fullarticle` ) "
           . " VALUES ( "
	  . $tag . ", "
          . "'" . mysql_real_escape_string($news_item->title) . "',"
          . "'" . mysql_real_escape_string($news_item->abstract) . "',"
          . "'" . mysql_real_escape_string($news_item->article) . "')";
        $res = mysql_db_query ($this->dbname, $query, $this->conn);
        return (mysql_affected_rows($this->conn) == 1);
    }

    function ReadItem ($indextag, $from) {
      $article = new NewsObj;
      $query = "select `indextag`, `headline`, `abstract`, `fullarticle` from `" 
        . $this->tablename . "` "
	. "where `indextag` = " . mysql_real_escape_string($indextag) ;
      if (! $this->is_open) {
	$this->Open();
      }
      $res = mysql_query ($query, $this->conn);
      $nrows = mysql_num_rows($res);
      if ($nrows > 0) {
        $row_array = mysql_fetch_assoc($res);
        $len_array = mysql_fetch_lengths($res);
        $article->SetIndexTag($row_array['indextag']);
        $article->SetTitle($row_array['headline']);
        $article->SetAbstract($row_array['abstract']);
        $article->SetArticle($row_array['fullarticle']);
      }
      return $article;
    }

    function LoadIndex() {
      if (!$this->is_open) {
        $this->Open();
      }
      $this->index = array();
      $query = "SELECT `indextag`, `headline` FROM "
          . $this->tablename. " "
	  . " WHERE 1 ORDER BY `indextag` DESC";
      $res = mysql_db_query($this->dbname, $query, $this->conn);
      $nrows = mysql_num_rows($res);
      for ($i=0; $i<$nrows; $i++) {
	$this->index[] = mysql_fetch_assoc($res);
      }
    }

    function DeleteArticle ($tag) {
      if (!$this->is_open) {
        $this->Open();
      }
      $query = "delete from `" . $this->tablename . "` "
	. " WHERE `indextag` = ". $tag ;
      mysql_db_query($this->dbname, $query, $this->conn);
      /* if it doesn't work, nothing much we can do about it */
    }

    function CallLatestN ($user_func, $n) {
        $this->LoadIndex();
	$count = 0;
        $max = min($n, count($this->index));
        for ($ndx = 0; $ndx <$max; $ndx++) {
	  $article = $this->ReadItem($this->index[$ndx]['indextag'],"CallLN");
          $user_func($article);
          $count++;
        }
	return $count;
    }
    
    function AppendLatestN ($user_func, $n) {
        $text ="";
        $this->LoadIndex();
        $max = min($n, count($this->index));
        for ($ndx = 0; $ndx <$max; $ndx++) {
       	  $article = $this->ReadItem($this->index[$ndx]['indextag'],"AppendLN");
          $text .= $user_func($article);
        }
        return $text;
    }
}



?>
