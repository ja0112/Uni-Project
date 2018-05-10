<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;

echo makePageStart("Password Reset", "style.css");
  echo makeNavMenu($admin_privilege);
?>
<!--password reset form where user will input thier email address-->
<div class="wrapper">
<div class="fstyle">
  <h2>Password Reset</h2>
  <p>Enter your email address so that a reset link can be provided to change your password</p>
  <div class="row">
    <label for="email_address">Email Address</label>
   <form action="email.php" method="post" class="col s12">
      <div class="input-field col s12">
        <input placeholder="email" id="email" type="text" name="email" class="validate">
      </div>

      <div class="marginBottom">
          <input type="submit" class="pass-reset-btn" value="Send Email">
      </div>
    </form>
    </div>
</div>
</div>
<?php

//start main content
echo "<p style='margin-bottom:22em'></p>";
echo makeFooter();
echo makePageEnd();
?>
