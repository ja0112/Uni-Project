<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Dashboard", "style.css");
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
?>
<div class="wrapper">
<h1>Event Created</h1>

<p>Your event has been created successfully. It will be visible on your planner and in the browse events section
for volunteers to view.</p>


</div>

<?php
  echo "<p style='margin-bottom:13em'></p>";
  echo makeFooter();
  echo makePageEnd();
 ?>
