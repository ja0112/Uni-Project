$(document).ready(function(){
function initMap() {
	var mapProp = {
		center:new google.maps.LatLng(51.508742,-0.120850),
		zoom:5,
	};
	var map = new google.maps.Map($("#googleMap")[0],mapProp);

      getJSONData(function(data) {
        addPremiseDataToMap(map, data);
    });
}
google.maps.event.addDomListener(window, 'load', initMap);

/*json data code*/
function getJSONData(callback){
	$.getJSON("data/licenced_premises.json",
        function (data) {
            callback(data);
        }
    );
}

function addPremiseDataToMap(resultsMap, data) {
	console.log(data.length);
  for(var x=0; x<10; x++) {
				var geocoder = new google.maps.Geocoder();
    if (data[x].StatusLabel =="Issued") {
          var name = data[x].PremisesName;
          var address = data[x].LocationText;
          console.log(name);

       var postalAddress = data[x].LocationText;
       if (data[x].PostCode != "") {
                  postalAddress += " " + data[x].PostCode;
                  console.log(postalAddress);
									 geocodeAddress(geocoder, resultsMap, postalAddress, name);
						}
       }
   }
}

function geocodeAddress(geocoder, resultsMap, postalAddress, name) {

geocoder.geocode({'address': postalAddress}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
			//add a marker to the map at this location

			var infowindow = new google.maps.InfoWindow({
          content: name += postalAddress
        });

            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
					  });

							marker.addListener('click', function() {
				 		infowindow.open(resultsMap, marker);
			 		});

					marker.addListener('click', function(){
								console.log("Hello");
								$("#markerLocation").val(postalAddress);

								if (typeof(Storage) !== "undefined") {
    								sessionStorage.setItem('name', name);
										console.log(sessionStorage.getItem('name'));
								} else {
    									// Sorry! No Web Storage support
					}

						});

          } else {
            console.log('Geocode was not successful for the following reason: ' + status);
          }

									$("#distance").click(function() {
										if( $("#userText").val() == '' ) {
												console.log("Please enter a value");
										} else if ( $("#userText").val() ) {
												console.log($("#userText").val());
										}
															var service = new google.maps.DistanceMatrixService();
										//call the getDistanceMatrix method on the DistanceMatrixService
													service.getDistanceMatrix(
													{
														//pass in the origin and destination values and set the other values such as travelmode etc
														origins: [$("#getLocation").val()],
														destinations: [$("#markerLocation").val()],
														unitSystem: google.maps.UnitSystem.IMPERIAL,
														travelMode: google.maps.TravelMode.DRIVING

														//when the service responds run the callback function
													}, callback);

								});

      });
}

});
