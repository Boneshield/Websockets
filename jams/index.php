<?php
session_start();
require 'jams/vue/entete.php';
?>



<!-- Texte sous la banniere  -->   
<div class="container">
    <h1 class="texteAccueil"><span class="jams">Jams!</span> Le site du covoiturage gratuit.</h1>
</div>

<!-- Corps de la page divisé en 2 à gauche la recherche rapide, à droite la google map -->   
<div class="container">
    <div class="col-md-6">
        <div class="row">
            <h2>Recherche rapide</h2>

        </div>

        <div class="row">
            <!-- Formulaire recherche rapide  -->   
            <form class="form-inline" action="jams/vue/resultatRecherche.php" method="post">
                <div class="form-group">
                    <label for="rechercherapide">De</label>
                    <input type="text" class="form-control" placeholder="Toulouse" name="villeDep" required="required" id="start">
                </div>
                <div class="form-group">
                    <label for="Recherche rapide">A</label>
                    <input type="text" class="form-control" placeholder="Paris" name="villeArr" required="required" id="arrive">
                </div>
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span> Rechercher
                </button>

            </form>
        </div>

        <div class="row">
            <h3  id="resultat"></h3>

        </div>

    </div>
    <!-- Google map  -->   
    <div class="col-md-6">
        <div id="map" style="width:100%;height:400px;"></div>
    </div>
</div>


<script src="/jams/js/carte.js"></script>
<!-- JS google map  --> 


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeOfMRGfOTltlJNVcNpF6TVXIUWtZzq5A&libraries=places&callback=initMap">
</script>

<?php
require 'jams/vue/footer.php';
?>
