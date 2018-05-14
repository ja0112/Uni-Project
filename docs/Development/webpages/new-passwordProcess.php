<?php // page made by James Ashcroft
// session start
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
// get web functions
require_once 'webFunctions.php';
$conn = createConnection();
//create page

// session varibales to be used in the navigation
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
echo makePageStart("Password Reset", "style.css");
  echo makeNavMenu($admin_privilege);
//create navigation bar

// session variable holding user_id
$user_id = $_SESSION['user_id'];
// variables holding password values from the request stream
$npass = isset($_REQUEST['npass']) ? $_REQUEST['npass'] : null;
$npassc = isset($_REQUEST['npassc']) ? $_REQUEST['npassc'] : null;
//$npassc = mysqli_real_escape_string($conn, $_POST['npassc']);
$error = array();
//checks if password empty or null
if (empty($npass)) {
     header("Location:errors-page.php");
   } elseif (empty($npassc)) {
     header("Location:errors-page.php");
   }
// if statement checking to see if the values are the same
// if they are it will present true otherwise the user will see an error
 if ($_REQUEST['npass'] === $_REQUEST['npassc']) {

 }
 else {
  header("Location:errors-page.php");
 }
// validation for the input boxes
 $npassc = filter_var($npassc, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
 $npassc = filter_var($npassc, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

 //Sanitising any special characters
 $npass = filter_var($npassc, FILTER_SANITIZE_SPECIAL_CHARS);
 $npassc = filter_var($npassc, FILTER_SANITIZE_SPECIAL_CHARS);

 //Trim the white space from using space bar
 trim($npass);
 trim($npassc);
// use of a password hash to disguise the password in the database
$passwordHash = password_hash($npassc, PASSWORD_DEFAULT);
// sql that updates the users password based on user_id
$sql = "UPDATE IP_users
        SET password = ?
        WHERE user_id = '$user_id'";

        //prepared statement that executes the sql
        $stmt = mysqli_prepare($conn, $sql) or die(mysqli_error($conn));
        mysqli_stmt_bind_param($stmt, "s", $passwordHash) or die(mysqli_error($conn));
        mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        ?>
        <!--Success message once password has been updated.-->
        <div class="wrapper">
        <div class="new-password-process">
          <h2>Success</h2>
          <p>You have successfully updated your password!</p>
          <a class="signin-success-btn" href ="signin.php">Sign-in</a>
        </div>
        </div
<?php
//create rest of page
        echo startMain();
        echo "<p style='margin-bottom:42em'></p>";
        echo makeFooter();
        echo endMain();
        echo makePageEnd();

?>
