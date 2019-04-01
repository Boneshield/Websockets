<?php
class Client {
    var $type="client";
    var $id;
    var $nom;
    var $passwd;
    var $dispo=array("lundi"=>0,"mardi"=>0,"mercredi"=>0,"jeudi"=>0,"vendredi"=>0,"samedi"=>0,"dimanche"=>0);
    
    //Constructeur
    function __construct($nom,$passwd) {
        $this->nom=$nom;
        $this->passwd=$passwd;
    }

    //Modifier dispo
    function setDispo($key,$val) {
        $this->dispo[$key] = $val;
    }
    //getDispo
    function getDispo() {
        return $this->dispo;
    }

    //Check couple id/mdp
    function userTest($nom, $mdp){
 
    if($nom==$this->nom && $mdp==$this->passwd){ return true; }
    
    else { return false; }
    }
}


class Defi {
    var $type="defi";
    var $lieu;
    var $meteo=array();   
    var $date;
    var $participants=array();
    var $id;
    var $createur;

    //Constructeur
    function __construct($lieu, $id, $createur) {
       $this->lieu=$lieu;
       $this->meteo=meteo($lieu);
       $this->id=$id;
       $this->createur=$createur;
    }
    
    //Mise a jour de la date
    function setDate($date){
        $this->date=$date;
    }

    //Mise a jour des participants
    function ajoutParticipants($client) {
        $this->participants=$client->nom;
    }
    
    //Changement météo
    function changementMeteo() {

    }

}

function meteo($ville) {
    //récupération infos météo
    //print_r("appel meteo");
    $page=file_get_contents('http://api.openweathermap.org/data/2.5/forecast?q='.$ville.'&units=metric&lang=fr&appid=8a16a1cee83038f331bcba227b3e9243');
    $json=json_decode($page);

    //  $tomorrow = date("Y-m-d", strtotime("+1 day"));

return array("J1"=>array("date"=>$json->list[3]->dt,"icone"=>$json->list[3]->weather[0]->icon),"J2"=>array("date"=>$json->list[11]->dt, "icone"=>$json->list[11]->weather[0]->icon),"J3"=>array("date"=>$json->list[19]->dt, "icone"=>$json->list[19]->weather[0]->icon),"J4"=>array("date"=>$json->list[27]->dt, "icone"=>$json->list[27]->weather[0]->icon),"J5"=>array("date"=>$json->list[35]->dt, "icone"=>$json->list[35]->weather[0]->icon));
}

?>
