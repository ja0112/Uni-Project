<?php
//link to web functions file
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();

echo makePageStart("Login", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
    echo timeout();

      $eventPasswordERR = isset($_SESSION['password']) ? $_SESSION['password'] : null;
 ?>
<div class="wrapper">
  <div class="fstyle">
    <h2>Login</h2>
    <p>Enter your username and password to log into your account.</p>
    <div class="row">
     <form action="verifyProcess.php" method="post" class="col s12">
       <label for="email">Email</label>
          <div class="textbox">
          <input placeholder="email" id="email1" name="email" type="text" class="validate">
          </div>
          <label for="password">Password</label>
          <div class="passbox">
          <input placeholder="password" id="password1" name="password" type="password" class="validate">
        </div>
        <a href="password-reset.php" class="forgot-password-link">Forgot Password?</a>

            <input type="submit" value="Login" class="signin-btn">
      </form>
      </div>

      <div class="register-today-link">
          <p>New to Volunteer Lines?</p>
          <a href="signup.php">Register Today</a>
    </div>

  </div>
</div>
<?php
echo "<p style='margin-bottom:5em'></p>";
echo makeFooter();
echo makePageEnd();
?>
