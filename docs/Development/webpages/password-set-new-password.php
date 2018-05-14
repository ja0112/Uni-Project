<?php // page made by James Ashcroft
// session start
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
//link to web functions file
require_once 'webFunctions.php';
$conn = createConnection();
//create page
echo makePageStart("Designerbay Password Reset", "materialize.css", "style.css");
//create navigation bar
echo makeNavMenu();
//search bar
$user_id = isset($_GET['uid']) ? ($_GET['uid']) : '';
//The token for the request, which should be present in the GET variable "t"
$token = isset($_GET['t']) ? ($_GET['t']) : '';
//The id for the request, which should be present in the GET variable "id"
$passwordRequestId = isset($_GET['id']) ? ($_GET['id']) : '';
//session variable for user_id
$_SESSION['user_id'] = $user_id;
// sql that validates user_id, password token and id of the password reset request
$sql = "SELECT id, user_id, date_requested
      FROM db_password_reset_request
      WHERE
        user_id = '$user_id' AND
        token = '$token' AND
        id = '$id'";

        $rs = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_assoc($rs)) {  //retrives data from the database
        $user_id = $row['user_id'];
        $passwordRequestId = $row['id'];
        $token = $row['token'];
        $_SESSION['user_id'] = $userid;
      }


// redirects user to new-password.php
      header('Location: new-password.php');
?>
<
<?php
//start main content
echo startMain();

echo makeFooter();
echo endMain();
echo makePageEnd();
?>
