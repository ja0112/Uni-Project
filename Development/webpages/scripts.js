function initMap() {
	var mapProp = {
		center:new google.maps.LatLng(54.97328, -1.61396),
		zoom:8,
	};
	var map = new google.maps.Map($("#googleMap")[0],mapProp);
  var searchBox = (
        document.getElementById("pac-input"));
         map.controls[google.maps.ControlPosition.TOP_LEFT].push(document.getElementById("pac-input"));
         var autocomplete = new google.maps.places.Autocomplete(searchBox);
         google.maps.event.addDomListener(window, 'load', initMap);

     getJSONData(function(data) {
        addPremiseDataToMap(map, data);
    });
}
//google.maps.event.addDomListener(window, 'load', initMap);

/*json data code*/
function getJSONData(callback){
	$.getJSON("empdata.json",
        function (data) {
            callback(data);
        }
    );
}
if (navigator.geolocation) {
				 navigator.geolocation.getCurrentPosition(function(position) {
					 var pos = {
						 lat: position.coords.latitude,
						 lng: position.coords.longitude
					 };

					 map.setCenter(pos);
				 }, function() {

				 });
			 } else {
				 // Browser doesn't support Geolocation
				 handleLocationError(false, map.getCenter());
			 }

			 function handleLocationError(browserHasGeolocation, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }


function addPremiseDataToMap(resultsMap, data) {
	console.log(data.length);
  for(var x=0; x<6; x++) {
				var geocoder = new google.maps.Geocoder();

          var location = data[x].event_location;
          var street = data[x].street_name;
					var firstname = data[x].firstname;
					var surname = data[x].surname;
					var url = data[x].profile_url;
          console.log(location);
					console.log(url);
          //console.log(street);
									 geocodeAddress(geocoder, resultsMap, location, firstname, surname, url);

   }
}

function geocodeAddress(geocoder, resultsMap, location, firstname, surname, url) {

				geocoder.geocode({'address': location}, function(results, status) {
				          if (status === 'OK') {
				            resultsMap.setCenter(results[0].geometry.location);
							//add a marker to the map at this location
							//var contentString = '<h2>Volunteer</h2> based in: <br />   ';
							var infowindow = new google.maps.InfoWindow({
				          content: "<div>" +
 														firstname + " " + surname + "<br>" +
														"Based in" + "<br>" +
														location + " " + "<br>" +
														'<a href="' + url + '">View Profile</a>' +
														"</div>"
								});

				            var marker = new google.maps.Marker({
				              map: resultsMap,
				              position: results[0].geometry.location
									  });

											marker.addListener('click', function() {
								 		infowindow.open(resultsMap, marker);
										document.getElementById("display");
							 		});
									marker.addListener('click', function(){


												if (typeof(Storage) !== "undefined") {
				    								sessionStorage.setItem('event_location', location);
														console.log(sessionStorage.getItem('event_location'));
												} else {
				    									// Sorry! No Web Storage support
													}

										});

				          } else {
				            console.log('Geocode was not successful for the following reason: ' + status);
				          }

      				});
			}
