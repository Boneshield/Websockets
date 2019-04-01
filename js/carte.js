var map;

function initMap() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var paris = new google.maps.LatLng(48.866667, 2.333333);
    map = new google.maps.Map(document.getElementById('map'), {
        center: paris,
        zoom: 5
    });
    directionsDisplay.setMap(map);


    //var onChangeHandler = function() {
    //    focus(autocomplete);
    //};

    var options = {
        types: ['(cities)'],
        componentRestrictions: {country: "fr"}
    };
    autocomplete = new google.maps.places.Autocomplete(   
        (document.getElementById('start')),options);

    //autocompletedestination = new google.maps.places.Autocomplete(   
    //    (document.getElementById('arrive')),options);

    //google.maps.event.addListener(autocompletedestination, 'place_changed', onChangeHandler);
    //google.maps.event.addListener(autocomplete, 'place_changed', onChangeHandler);

}

function focus(autocomplete){
    var start = autocomplete.getPlace().address_components[0]['short_name'];
    let geocoder = new google.maps.Geocoder();
      let location = start;
      geocoder.geocode({ 'address': location }, function(results, status){
          if (status == google.maps.GeocoderStatus.OK) {
              map.setCenter(results[0].geometry.location);
          } else {
              alert("Could not find location: " + location);
          }
      });
}

function calcRoute(directionsService, directionsDisplay, autocomplete, autocompletedestination) {

    var start = autocomplete.getPlace().address_components[0]['short_name'];
    console.log(autocomplete.getPlace());
    var arrive = document.getElementById('arrive').value;
    if((start == "") || (arrive == "")){    
    }

    else{
        var request = {
            origin: start,
            destination: arrive,
            travelMode: 'DRIVING'
        };

        directionsService.route(request, function(result, status) {
            if (status == 'OK') {
                directionsDisplay.setDirections(result);
            }
            else {
                window.alert('Aucune route disponible pour ce trajet');
            }
        });

        var service = new google.maps.DistanceMatrixService;
        service.getDistanceMatrix({
            origins: [start],
            destinations: [arrive],
            travelMode: 'DRIVING',
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: false
        }, function(response, status) {
            if (status !== 'OK') {
                alert('Aucune route disponible pour ce trajet');
            } else{
                //alert(response.rows[0].elements[0].distance.text+"  "+response.rows[0].elements[0].duration.text);
                var reponse = "Distance: "+response.rows[0].elements[0].distance.text+"<br>Durée estimée: "+response.rows[0].elements[0].duration.text
                document.getElementById("resultat").innerHTML = reponse;
                // var infowindow = new google.maps.InfoWindow({

                //   content: reponse

                //});
                //infowindow.open(map);
            }
        });


    }

    if(autocomplete.getPlace().address_components[0]['short_name'] != ""){
        document.getElementById('start').value = autocomplete.getPlace().address_components[0]['short_name']; 
    }

    if(autocompletedestination.getPlace().address_components[0]['short_name'] != ""){
        document.getElementById('arrive').value =autocompletedestination.getPlace().address_components[0]['short_name'];

    }
}

function initMapFicheTrajet() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var paris = new google.maps.LatLng(48.866667, 2.333333);

    var depart = document.getElementById("depart").value;
    var arrivee = document.getElementById("arrivee").value;

    map = new google.maps.Map(document.getElementById('map'), {
        center: paris,
        zoom: 5
    });
    directionsDisplay.setMap(map);


    calcRoute2(directionsService, directionsDisplay, depart, arrivee);

}

function calcRoute2(directionsService, directionsDisplay, depart, arrivee) {

    if((depart == "") || (arrivee == "")){    
    }

    else{
        var request = {
            origin: depart,
            destination: arrivee,
            travelMode: 'DRIVING'
        };

        directionsService.route(request, function(result, status) {
            if (status == 'OK') {
                directionsDisplay.setDirections(result);
            }
            else {
                window.alert('Aucune route disponible pour ce trajet');
            }
        });

        var service = new google.maps.DistanceMatrixService;
        service.getDistanceMatrix({
            origins: [depart],
            destinations: [arrivee],
            travelMode: 'DRIVING',
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: false
        }, function(response, status) {
            if (status !== 'OK') {
                alert('Aucune route disponible pour ce trajet');
            } else{
                //alert(response.rows[0].elements[0].distance.text+"  "+response.rows[0].elements[0].duration.text);
                var reponse = "Distance: "+response.rows[0].elements[0].distance.text+"<br>Durée estimée: "+response.rows[0].elements[0].duration.text
                document.getElementById("resultat").innerHTML = reponse;
                // var infowindow = new google.maps.InfoWindow({

                //   content: reponse

                //});
                //infowindow.open(map);
            }
        });


    }

}

