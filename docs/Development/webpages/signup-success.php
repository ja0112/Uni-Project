<?php
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Success", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  ?>
<META http-equiv="refresh" content="5;http://unn-w14001960.newnumyspace.co.uk/Individual-Project/webpages/signin.php">

<div class="wrapper">
<h1>Success</h1>

<p>You have successfully created an account.</p>

<p>You will be redirected to the login page within 5 seconds.</p>

<div class="marginBottom">
    <input type="submit" value="Login">
</div>
</div>
<?php
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
