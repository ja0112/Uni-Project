<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Find Volunteers", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <div id="map" style="width:100%; height:400px;"></div>

    <script>

      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(51.508742,-0.120850),
          zoom: 12
        });
        var infowindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://unn-w14001960.newnumyspace.co.uk/Individual-Project/webpages/test.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var eventl = markerElem.getAttribute('event_location');
              //var name = markerElem.getAttribute('name');
              //var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('event_location');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = event_location
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = event_location
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }
     function downloadUrl(url, callback) {
       var request = window.ActiveXObject ?
           new ActiveXObject('Microsoft.XMLHTTP') :
           new XMLHttpRequest;

       request.onreadystatechange = function() {
         if (request.readyState == 4) {
           request.onreadystatechange = doNothing;
           callback(request, request.status);
         }
       };

       request.open('GET', url, true);
       request.send(null);
     }

     function doNothing() {}

      </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByj-VlKy-JDloZcsFvmOJSxj-BDnFanB4&callback=initMap">
    </script>
<?php
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
