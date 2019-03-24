#!/usr/bin/php -q
<?php
// Run from command prompt > php -q defiecolo.php
require "websocket.class.php";
 
// Extended basic WebSocket as defiecolo
class DefiEcolo extends WebSocket{
  function process($user,$msg){
 
    $this->say("< ".$user->socket." :".$msg);
 
 	foreach ( $this->users as $utilisateur ){
		$this->send($utilisateur->socket,$msg);
	}
  }
}

$master = new DefiEcolo("localhost",1337);
