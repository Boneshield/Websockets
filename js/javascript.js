alert("Hello! I am an alert box!");


//Affichage des notes sous formes d'étoiles
$('input.afficherNote').rating({
    'min': 1,
    'max': 6,
    'empty-value': 0,
    'iconLib': 'glyphicon',
    'activeIcon': 'glyphicon-star',
    'inactiveIcon': 'glyphicon-star-empty',
    'clearable': false,
    'clearableIcon': 'glyphicon-remove',
    'inline': false,
    'readonly': true
});




function checkPass()
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
}  

function test() {
  alert("Hello! I am an alert box!");
}
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
  ws.onopen = function() {
    log("Socket ouvert");
    rs.innerHTML = this.readyState;
  };
  
  // Lors de la réception d'un message
  ws.onmessage = function(e) {
    // Ajout au journal du contenu du message
    log("< "+e.data);
    rs.innerHTML = this.readyState;
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

  // Evénement submit du formulaire
  document.getElementsByTagName('form')[0].onsubmit = function(e) {
    var texte = document.getElementById('texte');
    
    // Envoi de la chaîne texte
    ws.send(texte.value);
    log("> "+texte.value);
    
    // Mise à zéro du champ et focus
    texte.focus();
    texte.value = '';
    
    // Empêche de valider le formulaire
    e.preventDefault();
  };
  
} else {

  alert("Ce navigateur ne supporte pas Web Sockets");

}

