#!/usr/bin/php -q
<?php
// Run from command prompt > php -q defiecolo.php
require "websocket.class.php";
require "deficlass.php";

// Extended basic WebSocket as defiecolo
class DefiEcolo extends WebSocket{
  //Instanciation tableaux défis, clients
    var $listeClients = array();
    var $listeDefis = array();
    var $id = 0;
    var $i=0;

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
        case $json->type=="demandeListe":
            $this->say("envoi des defis premiere connexion");
            foreach($this->listeDefis as $defis){
                $this->envoiDefi($defis->createur, $user, $defis);
            }
            //Afficher client connecté
            break;
        //Ajout défi
        case $json->type=="defi":
            //Vérification connexion
            //Validation défi
            //Ajout du défi
            $newDefi = new Defi($json->lieu,$this->id,$json->nom);
            array_push($this->listeDefis, $newDefi);
            //var_dump($this->listeDefis);
            $this->say("Nouveau défi crée par : ".$json->nom."\n ".print_r($newDefi));
            //Notification de la création du défi sur toutes les connexions ouvertes
            $this->diffusionDefi($json->nom, $newDefi);
            //Récupération infos météo
            //Comparaison dispo clients + météo
            $this->ajoutDefi($this->id, $json->nom, $user);
                //Si dispo + météo
                    //Notification clients défi
            $this->id++;
            break;
        //Ajout/Changement disponibilités
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
 
  }

  function authentification($nom, $mdp, $user){
    //$this-> say(print_r($this->listeClients[0]->userTest($nom, $mdp)));

    foreach ($this->listeClients as $value) {
        //$this->say(print_r($value));
        if($value->userTest($nom,$mdp) == true){
            $this->say("Authentification de ".$value->nom." réussie");

            $this->reponseAuth("ok", $user, $nom);
            //Envoi tout les defis avec diffusion defi
            foreach($this->listeDefis as $defis){
                $this->envoiDefi($defis->createur, $user, $defis);

                if($defis->createur == $nom){
                    $this->ajoutDefi($defis->id, $nom, $user);
                }
            }


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

//Notification de la création du défi sur toutes les connexions ouvertes

  function diffusionDefi($createur, $defi){
    
    $phparr = array("type"=>"creationDefi", "createur"=>$createur, "defi"=>$defi);
    $data = json_encode($phparr);

    foreach ( $this->users as $utilisateur ){
    $this->send($utilisateur->socket,$data);
    }

  }
//Envoi d'un défi à un utilisateur
    function envoiDefi($createur, $user, $defi){
    
    $phparr = array("type"=>"creationDefi", "createur"=>$createur, "defi"=>$defi);
    $data = json_encode($phparr);

    $this->send($user->socket,$data);
    

  }

//Ajout du défi aux défis planifié par l'utilisateur en fonction de ses dispos et de la météo
  function ajoutDefi($idDefi, $utilisateur, $user){
    //var_dump($this->listeDefis[0]);
    $jour = "rien";
   for( $i = 1; $i<=5; $i++ ) {
    $date = "J".$i;

    //$timestamp1=1554109200;
    $jour = $this->listeDefis[$idDefi]->meteo[$date]["date"];
    //$this->say($jour);
    //$this->say((date('l', $jour)));
    //$jourE = date('l', $jour);
    //$this->say($jourE);
    $jourFR = $this->conversionJour($jour);
    //$this->say($jourFR);
    //$jourFR = $this->conversionJour($jourE);

    //var_dump($this->listeDefis[$idDefi]->meteo[$date]);
        if(($this->listeDefis[$idDefi]->meteo[$date]["icone"] == "01n") && ($this->listeClients[$utilisateur]->dispo[$jourFR] == 1)){
            //$this->say("Jour ".$jourFR."météo ok pour J".$i." ".$this->listeDefis[$this->id]->lieu);
            $phparr = array("type"=>"ajoutDefi", "date"=>$jour, "meteo"=>$this->listeDefis[$idDefi]->meteo[$date]["icone"], "lieu"=>$this->listeDefis[$idDefi]->lieu);
             $data = json_encode($phparr);
            $this->send($user->socket, $data);
        }
        else{
            //$this->say("météo non ok pour ".$this->listeDefis[$this->id]->lieu);
   
        }
    }


  }

  function conversionJour($jourE){
    $jourE = date('l', $jourE);
    $jour="";

        switch($jourE) {
        //Connexion client
        case $jourE=="Monday":
            $jour="lundi";
            break;
        case $jourE=="Tuesday":
            $jour="mardi";
            break;
        case $jourE=="Wednesday":
            $jour="mercredi";
            break;
        case $jourE=="Thursday":
            $jour="jeudi";
            break;
        case $jourE=="Friday":
            $jour="vendredi";
            break;
        case $jourE=="Saturday":
            $jour="samedi";
            break;
        case $jourE=="Sunday":
            $jour="dimanche";
            break;
    }
    //$this->say("Appel conversion: ".$jour." a la place de".$jourE);
    return $jour;
  }

}

$client1 = new Client("Tom", "test");
$client2 = new Client("Roy", "test");
$client3 = new Client("Mathieu", "test");
$client4 = new Client("Marius", "test");
$listeClients = array($client1->nom=>$client1, $client2->nom=>$client2, $client3->nom=>$client3, $client4->nom=>$client4);
//print_r($listeClients["Marius"]);
$master = new DefiEcolo("localhost",1337,$listeClients);

