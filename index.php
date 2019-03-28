<?php
//session_start();
require 'vue/entete.php';
?>

<!-- Texte sous la banniere  -->   
<div class="container-fluid p-0" id="mesDefis">
</div>

<!-- Corps de la page divisé en 2 à gauche la recherche rapide, à droite la google map -->   

<div class="container-fluid p-0" id="planDefi">



</div>

<div id="listeDefi" class="container-fluid" >
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
<!-- JQuery --> 
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->



<!-- JS bootstrap  --> 
<script src="/Websockets/js/bootstrap.min.js"></script>
<script src="/Websockets/js/bootstrap-rating-input.js"></script>

<!-- JS --> 
<script    src="http://code.jquery.com/jquery-3.0.0.js"
integrity="sha256-jrPLZ+8vDxt2FnE1zvZXCkCcebI/C8Dt5xyaQBjxQIo="
crossorigin="anonymous"></script>

<?php
require 'vue/footer.php';
?>
