<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Please Login", "style.css");
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
?>
<div class="wrapper">
<h1>Please Login</h1>


<p>You need to be logged in to access this page</p>

  <form action="index.php">
      <input type="submit" value="Return Home" class="btn-sub-process">
  </form>

</div>


<?php
  echo "<p style='margin-bottom:13em'></p>";
  echo makeFooter();
  echo makePageEnd();
 ?>
