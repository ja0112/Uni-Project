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

<p>You are now connected with this event, you can look forward to on it in the near future.
  Look out for tasks being assigned to your planner.</p>


<?php  //echo "<a class=\"button\" href=\"add-task-to-volunteer.php?user_id=$user_id&event_id=$event_id\">Assign tasks now</a>";?>

<?php  echo "<a class=\"button\" href=\"volunteer-request.php\">Return Home</a>";?>

<?php
$to      = "$email";
$subject = "Volunteer Request Accepted";
$from    = "eventmanager@gmail.com";
$message = "Dear User,

Your request to volunteer has been accepted.

Regards

Name";

   mail($to, $subject, $message,"From: $from");




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
