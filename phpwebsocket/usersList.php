<?php 

require "deficlass.php";

$client1 = new Client(1,"Tom", "test");
$client2 = new Client(2,"Roy", "test");
$client3 = new Client(3,"Mathieu", "test");
$client4 = new Client(4,"Marius", "test");
$listeClients = array();
array_push($listeClients, $client1, $client2,$client3,$client4);

  function authentification($nom, $mdp){
    //$this-> say(print_r($this->listeClients[0]->userTest($nom, $mdp)));
  	$client1 = new Client(1,"Tom", "test");
$client2 = new Client(2,"Roy", "test");
$client3 = new Client(3,"Mathieu", "test");
$client4 = new Client(4,"Marius", "test");
$listeClients = array();
array_push($listeClients, $client1, $client2,$client3,$client4);


    foreach ($listeClients as $value) {
        //$this->say(print_r($value));
        if($value->userTest($nom,$mdp) == true){
            $_SESSION['idU'] = $value->id;
            $_SESSION['nomU'] = $value->nom;
            $_SESSION['mdpU'] = $value->passwd;
            return $_SESSION;
        }
        else{
        }
        
    }
    return false;
  }

?>