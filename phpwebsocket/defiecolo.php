#!/usr/bin/php -q
<?php
// Run from command prompt > php -q defiecolo.php
require "websocket.class.php";
require "deficlass.php";

// Extended basic WebSocket as defiecolo
class DefiEcolo extends WebSocket{
  //Instanciation tableaux défis, clients
    var $listeClients = array();
    var $id = 0;

    function __construct($address,$port,$listeClients) {
        $this->say("In SubClass constructor\n");
        $this->listeClients = $listeClients;
       // $this->say(print_r($this->listeClients));
        parent::__construct($address,$port);
        //$this->authentification("Tom", "test");
    }


  function process($user,$msg){ 
    
    $seuil=0;
    $this->say("< ".$user->socket." :".$msg);

 	foreach ( $this->users as $utilisateur ){
		$this->send($utilisateur->socket,$msg);
	}
    
    //Décodage du message au format json
    $json=json_decode($msg);
    $jsonTab=json_decode($msg, TRUE);
    switch($json) {
        //Connexion client
        case $json->type=="cclient":
            $this->say("< Authentification de: ".$json->name." ".$json->password);
            $this->authentification($json->name, $json->password, $user);
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
            //$this->listeClients[$json->name]->setDispo($json->jour, );
        //$json->jour;
        $this->listeClients[$json->name]->setDispo($json->jour, $json->dispo);
        $this->say("Dispo de : ".$this->listeClients[$json->name]->nom." modifié");
        $this->say( "Dispos : ".var_dump($this->listeClients[$json->name]->dispo));

            break;
        default:
            //Mauvaise requête
            break;
    }
    //Check régulier météo pour chaque défi
        //Si changement météo
            //Notifier client
    
/*    //récupération infos météo
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
    $this->send($user->socket,"id : ".$id);*/
  }

  function authentification($nom, $mdp, $user){
    //$this-> say(print_r($this->listeClients[0]->userTest($nom, $mdp)));

    foreach ($this->listeClients as $value) {
        //$this->say(print_r($value));
        if($value->userTest($nom,$mdp) == true){
            $this->say("Authentification de ".$value->nom." réussie");
           // $_SESSION['idU'] = $value->id;
            //$_SESSION['nomU'] = $value->nom;
            //$_SESSION['mdpU'] = $value->passwd;
            $this->reponseAuth("ok", $user, $nom);
            return true;
        }
        else{
            $this->say("Authentification de ".$value->nom." échouée");
        }
        
    }
    $this->reponseAuth("ko", $user, "");
    return false;
  }

  function reponseAuth($rep, $user, $nom){
    $phparr = array("type"=>"repAuth", "rep"=>$rep, "client"=>$this->listeClients[$nom]);
    $data = json_encode($phparr);
    $this->send($user->socket, $data);
  }

}

$client1 = new Client("Tom", "test");
$client2 = new Client("Roy", "test");
$client3 = new Client("Mathieu", "test");
$client4 = new Client("Marius", "test");
$listeClients = array($client1->nom=>$client1, $client2->nom=>$client2, $client3->nom=>$client3, $client4->nom=>$client4);
//print_r($listeClients["Marius"]);
$master = new DefiEcolo("localhost",1337,$listeClients);

