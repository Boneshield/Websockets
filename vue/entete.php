<?php
session_start();
//require_once '../Websockets/phpwebsocket/UsersList.php';
//if(isset($_POST['name'])):
//    $utilisateur = authentification($_POST['name'], $_POST['passwd']);
//endif;

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <!-- Element pour rendre l'affichage responsive  -->  
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSS Bootstrap -->
    <link href="/Websockets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Icones bootstrap  --> 
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


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


        <!-- header  -->   
<div id="headerNA" class="page-header">
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

 
<!-- Banniere  -->   
<!--<div class="row">-->
    <div class="container-fluid p-0" id="mesDispos">
    </div>


</div>
</div>

