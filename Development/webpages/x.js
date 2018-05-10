function initMap() {
       var map = new google.maps.Map(document.getElementById('map'), {
         zoom: 8,
         center: {lat: -34.397, lng: 150.644}
       });

       var geocoder = new google.maps.Geocoder();

       document.getElementById('submit').addEventListener('click', function() {
         geocodeAddress(geocoder, map);


     function geocodeAddress(geocoder, resultsMap) {
       var address = document.getElementById('address').value;
       geocoder.geocode({'address': address}, function(results, status) {
         if (status === 'OK') {
           resultsMap.setCenter(results[0].geometry.location);
           var marker = new google.maps.Marker({
             map: resultsMap,
             position: results[0].geometry.location
           });
         } else {
           alert('Geocode was not successful for the following reason: ' + status);
         }
       });
     }

     $.ajax({
    type: "GET",
    async: true,
    url: "test.xml",
    dataType: "xml",
    success:
    function (xml) {

   var el = xml.documentElement.getElementsByTagName("marker");

   for (var i = 0; i <2; i++) {
     var e = el[i].getAttribute('event');
     //var long = places[i].getAttribute('longitude');
     //var latLng = new google.maps.LatLng(lat, long);
     //geocodeAddress(geocoder, resultsMap, postalAddress, name);

     var infowindow = new google.maps.InfoWindow({
         content: e
       });
 var myLatLng = {lat: 51.5074, lng: 0.1278};
     var marker = new google.maps.Marker({
       position: myLatLng,
       map: map,
       label:el[i].event
     });
   }


   marker.addListener('click', function(){
     infowindow.open(map, marker);
         console.log("Hello");
         console.log(e);

         if (typeof(Storage) !== "undefined") {
             sessionStorage.setItem('event', e);
             console.log(sessionStorage.getItem('event'));
         } else {
               // Sorry! No Web Storage support
   }

     });
    }

   });

 });
}
