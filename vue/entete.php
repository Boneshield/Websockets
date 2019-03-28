<!-- Code du header ainsi que la bannière du site  -->

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <!-- Element pour rendre l'affichage responsive  -->  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- JQuery --> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- CSS Bootstrap -->
    <link href="/Websockets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Icones bootstrap  --> 
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <!-- JS bootstrap  --> 
    <script src="/Websockets/js/bootstrap.min.js"></script>
    <script src="/Websockets/js/bootstrap-rating-input.js"></script>

    <!-- JS --> 

    <script src="javascript.js"></script>

    <!-- Logo apparaissant sur l'onglet  -->    
    <!--<link rel="icon" type="image/png" href="/Websockets/img/logo2R.png" /> -->
    <!-- police -->   
    <link href="https://fonts.googleapis.com/css?family=Oswald|Pacifico" rel="stylesheet">
    <!-- Fichiers css  -->  
    <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/Websockets/css/style.css" />

    <title>Projet Défi écolo</title>
</head>

<body>

    <?php  if(empty($_SESSION)):?>
        <!-- header  -->   
        <div class="page-header">
            <div class="container-fluid p-0">
                <div class="navbar-header">
                    <!--<a href="/index.php"><img class="logo" src="/Websockets/img/logo2R.png" alt="Alternative texte de l'image" /></a>-->

                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="" data-toggle="modal" data-target="#modalLoginForm"><span class="glyphicon glyphicon-log-in"></span> S'authentifier</a></li>
                </ul>
            </div>
        </div>  

        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Authentification</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="email" id="defaultForm-email" class="form-control validate">
              <label data-error="wrong" data-success="right" for="defaultForm-email">Identifiant</label>
          </div>

          <div class="md-form mb-4">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" id="defaultForm-pass" class="form-control validate">
              <label data-error="wrong" data-success="right" for="defaultForm-pass">Mot de passe</label>
          </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" data-dismiss="modal" onclick="authentification()">Login</button>
    </div>
</div>
</div>
</div>





<?php //else:?>
<div class="page-header">
    <div class="container-fluid p-0">
        <div class="navbar-header">
            <!--<a href="/index.php"><img class="logo" src="/Websockets/img/logo2R.png" alt="Alternative texte de l'image" /></a>-->
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="#mesDispos"> Mes disponibilités </a></li>
            <li><a href="#planDefi"> Proposer un défi </a></li>
            <li><a href="#listeDefis"> Tous les défis </a></li>
        </ul>
    </li>
</ul>


</div>
</div>  


<!-- Banniere  -->   
<!--<div class="row">-->
    <div class="container-fluid p-0" id="mesDispos">
                    <nav class="navbar navbar-light bg-light m-0 p-0 b-0">
                <h1 class="texteAccueil"><span class="jams">Mes disponibilités</span></h1>
            </nav>
        <div class="card-group">
          <div class="card">
            <button class="btn btn-default" data-dismiss="modal" onclick="myFunction('lundi')">
                <div class="card-body bg-success" id="lundi" >
                  <h5 class="card-title">Lundi</h5>
              </div>
          </button>
      </div>
      <div class="card">
        <button class="btn btn-default" data-dismiss="modal" onclick="alert('Changer couleur en rouge ou vert pour se mettre dispo ou indispo et envoyer au serveur')">
            <div class="card-body" id="mardi">
                <h5 class="card-title">Mardi</h5>
          </div>
      </button>
  </div>
  <div class="card">
    <button class="btn btn-default" data-dismiss="modal" onclick="alert('Changer couleur en rouge ou vert pour se mettre dispo ou indispo et envoyer au serveur')">
        <div class="card-body" id="mercredi">
          <h5 class="card-title">Mercredi</h5>
      </div>
  </button>
</div>
<div class="card">
    <button class="btn btn-default" data-dismiss="modal" onclick="alert('Changer couleur en rouge ou vert pour se mettre dispo ou indispo et envoyer au serveur')">
        <div class="card-body" id="jeudi">
          <h5 class="card-title">Jeudi</h5>
      </div>
  </button>
</div>
<div class="card">
    <button class="btn btn-default" data-dismiss="modal" onclick="alert('Changer couleur en rouge ou vert pour se mettre dispo ou indispo et envoyer au serveur')">
        <div class="card-body" id="vendredi">
          <h5 class="card-title">Vendredi</h5>
      </div>
  </button>
</div>
<div class="card">
    <button class="btn btn-default" data-dismiss="modal" onclick="alert('Changer couleur en rouge ou vert pour se mettre dispo ou indispo et envoyer au serveur')">
        <div class="card-body" id="samedi">
          <h5 class="card-title">Samedi</h5>
      </div>
  </button>
</div>
<div class="card">
    <button class="btn btn-default" data-dismiss="modal" onclick="alert('Changer couleur en rouge ou vert pour se mettre dispo ou indispo et envoyer au serveur')">
        <div class="card-body" id="dimanche">
          <h5 class="card-title">Dimanche</h5>
      </div>
  </button>
</div>


</div>
</div>

<?php endif;?>