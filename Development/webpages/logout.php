<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
// get web functions
require_once 'webFunctions.php';    // make db connection
$conn = createConnection();
echo makePageStart("Logout", "style.css");
// destroys user session
  $_SESSION = array();
	session_destroy();
  $admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);

//create navigation bar

// message user will see once they have logged out
?>
<META http-equiv="refresh" content="5;http://unn-w14001960.newnumyspace.co.uk/Individual-Project/webpages/index.php">
<div class="wrapper">
    <div class="">
      <p>You have successfully logged out.</p>
      <p>You will be redirected to the home page within 5 seconds.</p>

      <form action="index.php">
          <input type="submit" value="Return Home" class="btn-sub-process">
      </form>
    </div>
</div>
<?php
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
