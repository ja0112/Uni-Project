<?php // page made by James Ashcroft
// session start
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
// session variable holding a users id
$user_id = $_SESSION['user_id'];

// get webfucntions
require_once 'webFunctions.php';
$conn = createConnection();
//make pagestart

  echo timeout();
// session variables that will be used in the navigation

$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;

echo makePageStart("New Password", "style.css");
  echo makeNavMenu($admin_privilege);

//make naviagtion

?>
<div class="wrapper">
<!--password reset form-->
<div class="fstyle">
  <h2>Password Reset</h2>
  <p>Please enter your new password.</p>

    <form action="new-passwordProcess.php" class="col s12">
    <label for="new_password">New Password</label>

        <div class="passbox">
          <input placeholder="New Password" id="npass" name="npass" type="password">
      </div>


  <label for="new_password_confirm">Confirm Password</label>
          <div class="passbox">
            <input placeholder="Confirm Password" id="npassc" name="npassc" type="password">
          </div>
</div>
      <div class="marginBottom">
          <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id);?>"></div>
          <input type="submit"  class="new-pass-btn" value="Change Password">
      </div>
    </form>


</div>
<?php
// create rest of page
echo startMain();
echo "<p style='margin-bottom:15em'></p>";
echo makeFooter();
echo endMain();
echo makePageEnd();
 ?>
