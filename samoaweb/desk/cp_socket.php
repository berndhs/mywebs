<?php
/*
  $Id: cp_socket.php $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2009, Bernd Stramm

  Released under the GNU General Public License

  Copyright 2009 Bernd Stramm

  This is the socket interface for the Canada Post interface.
  They want XML over HTTP/POST.

  For getting quotes, we just need POST and then parse the response

*/

  class cpSocketIF {
    var $url; // Where the postal server is 
    var $port;
    var $protocol;
    var $domain;
    var $socket_type;


    function cpSocketIF ($url, $port) {
       $this->url = $url;
       $this->port = $port;
       $this->domain = AF_INET;   // IP v4
       $this->socket_type = SOCK_STREAM; 
       $this->protocol = SOL_TCP;   
       print_r ($this);
       return $this;
    } // end constructor


/**
 * Post
 * issue a POST http request
**/

    function Post($post_body) { //member of cpSocketIF

// For now we make this a one shot deal:
// open the socket to the URL at the port, 
// and send the request, grab the reply,
// close the socket.
      socket_clear_error();
      $CP_socket = socket_create ($this->domain, $this->socket_type, $this->protocol);
      socket_clear_error();
      $worked = socket_connect ( $CP_socket, $this->url, $this->port);
      if (!$worked) {
        $errorcode = socket_last_error();
        $errormsg = socket_strerror($errorcode);
    
        if ($errorcode != 0) {
           die("Couldn't connect to socket $this->url : [$errorcode] $errormsg");
        }
      }

      socket_getpeername ($CP_socket, $otherside,$otherport);

      $the_head = "POST / HTTP/1.1 \r\n";
      $the_body = $post_body . "\r\n";
      $the_msg = $the_head . $the_body;

      $the_len = strlen ($the_msg);
      socket_clear_error();
      $bytes_sent = socket_write ($CP_socket, $the_msg, $the_len);
      $errorcode = socket_last_error();
      $errormsg = socket_strerror($errorcode);
      $count = 0;
      $complete_reply = "";
      $max_len = 8*1024; // arbitrary
      $out = ' ';
      while ($count < $max_len && ord($out) != 0) {
         $out = socket_read ($CP_socket,1, PHP_BINARY_READ);
         $complete_reply .= $out;
         $count += 1;
      }
      socket_shutdown ($CP_socket);
      socket_close ($CP_socket);
      return $complete_reply;
    }  // end function Post

} // end class
?>
