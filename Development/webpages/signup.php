<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Signup", "style.css");
  $admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);

  $firstnameErr = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : null;
  $surnameErr = isset($_SESSION['surname']) ? $_SESSION['surname'] : null;
  $emailErr = isset($_SESSION['email']) ? $_SESSION['email'] : null;
  $passwordErr = isset($_SESSION['password']) ? $_SESSION['password'] : null;

//$firstnameErr = $surnameErr = $emailErr = $passwordErr = "";

 ?>
<div class="wrapper">
  <script src="password-reveal.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <div class="fstyle">
      <h2>Sign up</h2>
        <p>Please complete this form to make an account</p>
        <form method="post" action="signupProcess.php">
          <label for="firstname">Firstname</label>
             <div class="signup">
                    <input placeholder="Firstname" id="Firstname1" name="firstname" type="text" class="validate">
                    <div class="error-message"><strong><?php echo $firstnameErr;?></strong></div>
             </div>
             <label for="surname">Surname</label>
                <div class="signup">
                       <input placeholder="Surname" id="Surname1" name="surname" type="text" class="validate">
                       <div class="error-message"><strong><?php echo $surnameErr;?></strong></div>
                </div>
          <label for="email">Email</label>
             <div class="signup">
                    <input placeholder="Email" id="email1" name="email" type="text" class="validate">
                    <div class="error-message"><strong><?php echo $emailErr;?></strong></div>
             </div>

             <label for="password">Password</label>
             <div class="signupass">
                  <input placeholder="Password" id="password-field" name="password" type="password" class="validate">
                  <button class="showHide-btn" type="button" onclick="passwordReveal(this);">Show</button>
                  <div class="error-message"><strong><?php echo $passwordErr;?></strong></div>
             </div>

             <label for="selectli">Account Option</label>
             <div>
                 <select id="selectli" name="admin_privilege">
                    <!-- This method is nice because it doesn't require extra div tags, but it also doesn't retain the style across all browsers. -->
                    <option>Select an Option</option>
                    <option>Event Manager</option>
                    <option>Volunteer</option>
                </select>
            </div>

              <div class="marginBottom">
                  <input type="submit" value="Sign up" class="signin-success-btn">
              </div>
        </form>
      </div>
</div>
<?php
echo "<p style='margin-bottom:13em'></p>";
echo makeFooter();
echo makePageEnd();
?>
