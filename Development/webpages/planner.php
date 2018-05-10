<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Planner", "style.css");
  $admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();
  echo notLoggedIn();
 ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="planner.js"></script>
<div class="wrapper">
<h1>Planner</h1>
<p>Your planner can be seen below, you can toggle the day by using the dropdown menu.</p>
<div>
    <select id="event_planner" name="planner" onchange="showUser(this.value)">
       <option value="#" selected>Select an Option</option>
       <option value="Day">Day</option>
       <option value="Week">Week</option>
   </select>
</div>
<div class="overall-planner-style">
<div class="planner-content">
  <div class="date">
  </div>

    <p id="txtHint" class="indentSelect">Please select an option!</p>
</div>

</div>
</div>
<?php
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
