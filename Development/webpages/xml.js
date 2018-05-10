$(document).ready(function(){
function initMap() {
	var mapProp = {
		center:new google.maps.LatLng(51.508742,-0.120850),
		zoom:5,
	};
	var map = new google.maps.Map($("#googleMap")[0],mapProp);
  var searchBox = (
        document.getElementById('pac-input'));
         map.controls[google.maps.ControlPosition.TOP_LEFT].push(searchBox);
         var autocomplete = new google.maps.places.Autocomplete(searchBox);
         google.maps.event.addDomListener(window, 'load', initMap);

     getJSONData(function(data) {
        addPremiseDataToMap(map, data);
    });
}
google.maps.event.addDomListener(window, 'load', initMap);

/*json data code*/
function getJSONData(callback){
	$.getJSON("empdata.json",
        function (data) {
            callback(data);
        }
    );
}

function addPremiseDataToMap(resultsMap, data) {
	console.log(data.length);
  for(var x=0; x<5; x++) {
				var geocoder = new google.maps.Geocoder();

          var location = data[x].event_location;
          var street = data[x].street_name;
          console.log(location);
          //console.log(street);
									 geocodeAddress(geocoder, resultsMap, street, location);

   }
}

function geocodeAddress(geocoder, resultsMap, location, street) {

				geocoder.geocode({'address': street}, function(results, status) {
				          if (status === 'OK') {
				            resultsMap.setCenter(results[0].geometry.location);
							//add a marker to the map at this location

							var infowindow = new google.maps.InfoWindow({
				          content: location += " " + street
				        });

				            var marker = new google.maps.Marker({
				              map: resultsMap,
				              position: results[0].geometry.location
									  });

											marker.addListener('click', function() {
								 		infowindow.open(resultsMap, marker);
							 		});

									marker.addListener('click', function(){

												if (typeof(Storage) !== "undefined") {
				    								sessionStorage.setItem('street_name', street);
														console.log(sessionStorage.getItem('street_name'));
												} else {
				    									// Sorry! No Web Storage support
													}

										});

				          } else {
				            console.log('Geocode was not successful for the following reason: ' + status);
				          }


      				});
			}
});
