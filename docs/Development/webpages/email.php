<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();

//$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
echo makePageStart("Email", "style.css");
  echo makeNavMenu($admin_privilege);


  //echo timeout();

$email = isset($_REQUEST['email']) ? ($_REQUEST['email']) : '';
$email = mysqli_real_escape_string($conn, $_POST['email']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

} else {
    header("Location:error-page.php");
}

$error = array();
//checks if password empty or null
if (empty($email)) {
     header("Location:error-page.php");
   } else {

     $email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

     //Sanitising any special characters
     $email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);

     //Trim the white space from using space bar
     trim($email);
 }

$sql = "SELECT user_id
        FROM IP_users
        WHERE email = '$email'";

           /*$stmt = mysqli_prepare($conn, $sql) or die(mysqli_error($conn));
           mysqli_stmt_bind_param($stmt, "s", $email) or die(mysqli_error($conn));
           mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
           $userInfo = mysqli_stmt_fetch($stmt) or die(mysqli_error($conn));*/

$queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
$user_id = $row['user_id'];

}


 /*$stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $userInfo = mysqli_stmt_fetch($stmt);*/


//$user_id = $userInfo['user_id'];
   //$email = $userInfo['email'];


    //echo $dateRequested = time(date(Y-m-d H-m));

    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);

    $insertSql = "INSERT INTO IP_pwd_reset_request
              (user_id, date_requested, token)
              VALUES (?, NOW(), ?)";

               $stmt = mysqli_prepare($conn, $insertSql);
              mysqli_stmt_bind_param($stmt, "is", $user_id, $token);
              mysqli_stmt_execute($stmt);

           $passwordRequestId = mysqli_insert_id($conn);

           $verifyScript = 'http://unn-w14001960.newnumyspace.co.uk/Individual-Project/webpages/password-set-new-password.php';
           $link = $verifyScript . '?uid=' . $user_id . '&id=' . $passwordRequestId . '&t=' . $token;

             $to      = "$email";
             $subject = "Reset Password";
             $from    = "designbayadmin@gmail.com";
             $message = "Dear User,
             You have requested a change to your password. Click the link below to reset your password.
             Volunteer Lines";
             $em = "<a href=\"$link\"></a>";


             mail($to, $subject, $em, $message, "From:$from");

            ?>
            <div class="wrapper">
            <div class="send-email-page">
                <h2>Email Sent</h2>
            <?php
             $htmlbody = "We have sent an email to: <strong>$email</strong> which will contain your reset password link.<br />";
             $htmlbody .= "(remember to check your spam folder)</p>";
             $htmlout = "<html><head></head><body>". $htmlbody. "</body></html>";
               echo $htmlout;
              // echo $link;

            ?>
          </div>
        </div>
            <?php
    mysqli_stmt_close($stmt);
    mysqli_close($conn);




echo "<p style='margin-bottom:8em'></p>";
    echo startMain();

    echo makeFooter();
    echo endMain();
    echo makePageEnd();
    ?>
