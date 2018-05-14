<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
// get web functions
require_once 'webFunctions.php';    // make db connection
$conn = createConnection();
echo makePageStart("Timed Out", "style.css");
// destroys user session
  $_SESSION = array();
	session_destroy();
  $admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);

//create navigation bar

// message user will see once they have logged out
?>
<div class="wrapper">
    <div class="">
      <p>You have been timed out.</p>
      <p>This is becasue you were inactive for 10 minutes.</p>
      <p>Please login again to access your account. </p>

      <div class="marginBottom">
        <form action="index.php">
            <input type="submit" value="Return Home" class="btn-sub-process">
        </form>
      </div>
    </div>
</div>
<?php
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
