<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Congratulations", "style.css");
 $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
  $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : null;
  $event_id = isset($_REQUEST['event_id']) ? $_REQUEST['event_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();
 ?>
<div class="wrapper">

<h1>Congratualtions</h1>

<p>You are now connected with [volunteer] and you can look forward to working with them in the future.
You can assign tasks to them now or at a more conveineient time from the dashboard section.</p>


<?php  echo "<a class=\"button\" href=\"add-task-to-volunteer.php?user_id=$user_id&event_id=$event_id\">Assign tasks now</a>";?>

<?php  echo "<a class=\"button\" href=\"volunteer-request.php\">Return Home</a>";?>

<?php
$to      = "$email";
$subject = "Volunteer Request Accepted";
$from    = "eventmanager@gmail.com";
$message = "Dear User,

You request to volunteer has been accepted.

Regards

Name";

   mail($to, $subject, $message,"From: $from");

   $htmlbody = "<b>An email has been sent to inform:</b><br />$email<br />";
   $htmlbody .= "of your action.</p>";
   $htmlout = "<html><head></head><body>". $htmlbody. "</body></html>";
    echo $htmlout;


    $sql = "INSERT INTO IP_user_task (user_id, event_id) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $user_id, $event_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
?>
</div>
<?php
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
