<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Success", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
    echo timeout();
  ?>

<div class="wrapper">
<h1>Success</h1>

<p>Your event is now live.</p>

<form action="index.php">
    <input type="submit" value="Return Home" class="btn-sub-process">
</form>
</div>
<?php
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
