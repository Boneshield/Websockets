<?php
session_start();
require 'vue/entete.php';
?>

<!-- Texte sous la banniere  -->   
<div class="container-fluid p-0" id="mesDefis">
    <nav class="navbar navbar-light bg-light">
        <h2 class="texteAccueil"><span class="jams">Mes défis</span></h1>

        </nav>
    </div>

    <!-- Corps de la page divisé en 2 à gauche la recherche rapide, à droite la google map -->   

    <div class="container-fluid p-0" id="planDefi">
        <nav class="navbar navbar-light bg-light">
            <h2 class="texteAccueil"><span class="jams">Planifier un défi</span></h1>
            </nav>

            <div class="container">

                            <div class="col-md-7">
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
            </div>

            <div>
                <div class="row">
                    <h3  id="map" style="width:100%;height:400px;"></h3>

                </div>
            </div>
                

            </div>


        </div>

        <div class="container-fluid" >
            <nav class="navbar navbar-light bg-light">
                <h1 class="texteAccueil"><span class="jams">Liste des défis</span></h1>
            </nav>

            <div class="col-md-4">
            </div>

            <div class="col-md-4" id="listeDefis">
            </div>
            
            <div class="col-md-4">
            </div>

        </div>

    </div>

<!--</div>-->


<script src="js/carte.js"></script>
<!-- JS google map  --> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeOfMRGfOTltlJNVcNpF6TVXIUWtZzq5A&libraries=places&callback=initMap">
</script>

<?php
require 'vue/footer.php';
?>
