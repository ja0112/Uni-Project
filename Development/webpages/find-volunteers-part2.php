<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Find Volunteers", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();
  echo notLoggedIn();
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG4-_ghx3wUqROvP9meM4u6ELjrC12ybo&libraries=geometry"></script>-->
 <script src="scripts.js"></script>
 <div class="wrapper">
   <h1>Find Volunteers</h1>
   <p>Use the map to find volunteers for your event.</p>
<!--<input id="pac-input" class="controls" type="search" placeholder="Search Box">-->
    <div id="googleMap" style="width:100%; height:500px;"></div>


</div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1_GtS6SWkw-AZ7IQy11_H08ySP9V2Mso&callback=initMap&libraries=geometry,places"></script>
<?php
echo "<p style='margin-bottom:13em'></p>";
echo makeFooter();
echo makePageEnd();
?>
