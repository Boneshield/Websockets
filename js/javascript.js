var ws = null;

//  Création d'un nouveau socket
// (Pour Mozilla < 11 avec version préfixée)
if('MozWebSocket' in window) {

  ws = new MozWebSocket("ws://127.0.0.1:1337");

} else if('WebSocket' in window) {

  ws = new WebSocket("ws://127.0.0.1:1337");

}

if(typeof ws !=='undefined') {

  // Indication de l'état
  var rs = document.getElementById('rs');

  // Lors de l'ouverture de connexion
/*  ws.onopen = function() {
    log("Socket ouvert");
    rs.innerHTML = this.readyState;
  };*/
  
  ws.onmessage=function(event) { 
    var message = JSON.parse(event.data);
    switch(message.type) {
      case "creationDefi":
      notifCreationDefi(message.lieu);
      break;
      case "repAuth":
      if(message.rep == "ok"){
        //alert(message["client"]["dispo"].lundi);
        document.cookie = "username="+message["client"].nom;
        //alert(getCookie("username"));
        //alert(document.cookie);
        $(document).ready(function(){
          $("#headerNA").load("vue/userA.html");
          $("#mesDispos").load("vue/mesDispos.html");
          $("#mesDefis").load("vue/mesDefis.html");
          $("#planDefi").load("vue/planDefi.html");
        //Récupération disponibilités du client pour affichage 
      alert("Authentification réussie"); 
      //alert(message["client"]["dispo"].lundi);
      recupDispo(message["client"]["dispo"].lundi, "lundi");
      recupDispo(message["client"]["dispo"].mardi, "mardi");
      recupDispo(message["client"]["dispo"].mercredi, "mercredi");
      recupDispo(message["client"]["dispo"].jeudi, "jeudi");
      recupDispo(message["client"]["dispo"].vendredi, "vendredi");
      recupDispo(message["client"]["dispo"].samedi, "samedi");
      recupDispo(message["client"]["dispo"].dimanche, "dimanche");

        });
        

      } 
      else{
        alert("Authentification échouée");
      }
      break;

    }
  };

  // Lors d'une erreur de connexion
  ws.onerror = function(e) {  
    log("Erreur de connexion");
    rs.innerHTML = this.readyState;
  };

  // Lors de la fermeture de connexion
  ws.onclose = function(e) {  
    if(e.wasClean) {
      log("Socket fermé proprement");
    } else {
      log("Socket fermé");
      if(e.reason) log(e.reason);
    }
    rs.innerHTML = this.readyState;
  };

  };

/*$(document).ready(function(){
  $("button").click(function(){
    $("#div1").load("demo_test.txt");
  });
});*/

/*function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('mdp1');
    var pass2 = document.getElementById('mdp2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Mots de passe similaire"
        var link = document.getElementById('valider');
        link.style.visibility = 'visible';
      }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Mots de passe différents"
        var link = document.getElementById('valider');
        link.style.visibility = 'hidden';
      }
    }  */

    function authentification() {
  // Création d'un objet msg qui contient les données 
  // dont le serveur a besoin pour traiter le message
  var msg = {
    "type": "cclient",
    "name": document.getElementById("defaultForm-email").value,
    "password": document.getElementById("defaultForm-pass").value,
  };

  // Envoi de l'objet msg à travers une chaîne formatée en JSON
  ws.send(JSON.stringify(msg));
}

function creationDefi() {
  // Création d'un objet msg qui contient les données 
  // dont le serveur a besoin pour traiter le message
  var msg = {
    "type": "creationDefi",
    "lieu": document.getElementById("start").value,
  };

  // Envoi de l'objet msg à travers une chaîne formatée en JSON
  ws.send(JSON.stringify(msg));
}

function notifCreationDefi(lieu) {
  // crée un nouvel élément div 
  var newPanel = document.createElement("div");
  newPanel.className = "panel-group";
  var currentDiv = document.getElementById("listeDefis"); 
  currentDiv.appendChild(newPanel);

  var newDiv = document.createElement("div"); 
  newDiv.className = "panel panel-default";
  // ajoute le nouvel élément créé et son contenu dans le DOM 
  newPanel.appendChild(newDiv); 
  var newDiv2 = document.createElement("div");
  newDiv2.className = "panel-heading"; 
    // et lui donne un peu de contenu 
    var newContent = document.createTextNode("Défi crée par: "); 
  // ajoute le noeud texte au nouveau div créé
  newDiv2.appendChild(newContent);  
  var newDiv3 = document.createElement("div");
  newDiv3.className = "panel-heading"; 
    // et lui donne un peu de contenu 
    var newContent = document.createTextNode("Lieu: "+lieu); 
  // ajoute le noeud texte au nouveau div créé
  newDiv3.appendChild(newContent);  
  var newDiv4 = document.createElement("div");
  newDiv4.className = "panel-heading"; 
    // et lui donne un peu de contenu 
    var newContent = document.createTextNode("Participants"); 
  // ajoute le noeud texte au nouveau div créé
  newDiv4.appendChild(newContent);  

  newDiv.appendChild(newDiv2);
  newDiv.appendChild(newDiv3);
  newDiv.appendChild(newDiv4);

}

//Récupération des disponibilités de l'utilisateur lors de la connexion
function recupDispo(dispos, jour){


  if(dispos == 0){

          $(document).ready(function(){
          $("#"+jour).css("background-color", "red");
           });
  //  document.getElementById("#lundi").style.backgroundColor = "lime";

  }
  else{
      //document.getElementById("#"+jour).style.backgroundColor = "red";

          $(document).ready(function(){
          $("#"+jour).css("background-color", "lime");
          });

  }
}

function changerDispo(jour) {
  
//  $(document).ready(function(){
//          $("#"+jour).css("background-color", "lime");
//        });
//var color = $("#"+jour).css( "background-color" );
//alert($("#"+jour).css( "background-color" ));
  if($("#"+jour).css( "background-color" ) =="rgb(0, 255, 0)"){
      $(document).ready(function(){
          $("#"+jour).css("background-color", "red");
        });

          var msg = {
    "type": "cdispo",
    "name": getCookie("username"),
     "jour"  : jour,
     "dispo" : 0
  };
  }
  else{
        $(document).ready(function(){
          $("#"+jour).css("background-color", "lime");
        });

          var msg = {
    "type": "cdispo",
    "name": getCookie("username"),
     "jour"  : jour,
     "dispo" : 1
  };
  }

  ws.send(JSON.stringify(msg));
}


function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}