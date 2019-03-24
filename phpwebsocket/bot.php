#!/usr/bin/php -q
<?php  

// Execution en ligne de commande : php -q <nomdufichier>.php

// Inclusion de la librairie phpwebsocket
require "websocket.class.php";

// Extension de WebSocket
class ChatBot extends WebSocket {
  function process($user,$msg) {
    $this->say("< ".$msg);
    switch($msg){
      case "hello":
        $this->send($user->socket,"Bonjour");
      break;
      case "date":
        $this->send($user->socket,"Nous sommes le ".date("d/m/Y"));
      break;
      case "bye":
      case "ciao":
        $this->send($user->socket,"Au revoir");
        $this->disconnect($user->socket);
      break;
      default:
        $this->send($user->socket,"Pas compris !");
      break;
    }
  }
}

$master = new ChatBot("0.0.0.0",1337);

?>