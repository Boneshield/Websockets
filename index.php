<?php
session_start();
require 'jams/vue/entete.php';
?>

<!-- Texte sous la banniere  -->   
<div class="container">
    <h1 class="texteAccueil"><span class="jams">Défi écolo</span></h1>
</div>

<!-- Corps de la page divisé en 2 à gauche la recherche rapide, à droite la google map -->   
<div class="container">
    <div class="col-md-5">
        <div class="row">
            <h2>Créer un défi écolo</h2>

        </div>

        <div class="row">
            <!-- Formulaire recherche rapide  -->   
            <div class="form-group">
                <label for="rechercherapide">Lieu du défi</label>
                <input type="text" class="form-control" placeholder="Toulouse" name="villeDep" required="required" id="start">
            </div>
            <button class="btn btn-default" onclick="creationDefi()">
                <span class="glyphicon glyphicon-search"></span> Créer Défi
            </button>

            
        </div>

        <div class="row">
            <h3  id="map" style="width:100%;height:400px;"></h3>

        </div>

    </div>
    <!-- Google map  -->   
    <div class="col-md-1">

    </div>

    <div class="col-md-5">
        <div class="row" id="listeDefis">
            <h2>Liste défis</h2>
      </div>

  </div>
</div>
</div>


<script src="/jams/js/carte.js"></script>
<!-- JS google map  --> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeOfMRGfOTltlJNVcNpF6TVXIUWtZzq5A&libraries=places&callback=initMap">
</script>

<?php
require 'jams/vue/footer.php';
?>
