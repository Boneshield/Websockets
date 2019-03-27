#!/usr/bin/php -q
<?php
// Run from command prompt > php -q defiecolo.php
require "websocket.class.php";
require "deficlass.php";

// Extended basic WebSocket as defiecolo
class DefiEcolo extends WebSocket{
  //Instanciation tableaux défis, clients

  function process($user,$msg){ 
    
    $seuil=0;
    $this->say("< ".$user->socket." :".$msg);
    
 	foreach ( $this->users as $utilisateur ){
		$this->send($utilisateur->socket,$msg);
	}
    
    //Décodage du message au format json
    $json=json_decode($msg);
    switch($json) {
        //Connexion client
        case $json->type=="cclient":
            //Afficher client connecté
            break;
        //Ajout disponibilités
        case $json->type=="adispo":
            //Vérification connexion
            //Validation dispos
            //enregistrement dispos
            break;
        //Ajout défi
        case $json->type=="defi":
            //Vérification connexion
            //Validation défi
            //Ajout du défi
            //Récupération infos météo
            //Comparaison dispo clients + météo
                //Si dispo + météo
                    //Notification clients défi
            break;
        //Changement disponibilités
        case $json->type=="cdispo":
            //Si participants < seuil
                //annulation défi
            break;
        default:
            //Mauvaise requête
            break;
    }
    //Check régulier météo pour chaque défi
        //Si changement météo
            //Notifier client
    
    //récupération infos météo
    $page=file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Toulouse&units=metric&lang=fr&appid=8a16a1cee83038f331bcba227b3e9243');
    $json=json_decode($page);
    //nom du lieu
    $name=$json->name;
    $this->send($user->socket,"nom : ".$name);
    //Si on veut l'icone à voir
    $icon=$json->weather[0]->icon;
    $this->send($user->socket,"icon : ".$icon);
    //Description du temps
    $description=$json->weather[0]->description;
    $this->send($user->socket,"description : ".$description);
    //Température
    $temp=$json->main->temp;
    $this->send($user->socket,"température : ".$temp);
    //récupération de l'id de la météo
    //Cela indique si on est en "bonne" condition
    $id=$json->weather[0]->id;
    $this->send($user->socket,"id : ".$id);
  }
}

$master = new DefiEcolo("localhost",1337);

