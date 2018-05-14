<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Request Approval", "style.css");

$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : null;
$surname = isset($_SESSION['surname']) ? $_SESSION['surname'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
echo makeNavMenu($admin_privilege);
  echo timeout();

$sql = "SELECT *
        FROM IP_view_requests
        AS a
        INNER JOIN IP_create_event
        AS b
        ON a.event_id = b.event_id
        INNER JOIN IP_users
        AS c
        ON a.user_id = c.user_id
        WHERE admin_privilege = 'Volunteer'";

        $queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
        //loops variables when query has been executed so they can be displayed to the user

        while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
          $firstnam = $row['firstname'];
          $surnam = $row['surname'];
          $email = $row['email'];
          $event_id = $row['event_id'];
          $event_title = $row['event_title'];
          $user_id = $row['user_id'];
          $volunteer_reason = $row['volunteer_reason'];
 ?>
<div class="wrapper">
<?php //echo "$user_id";?>
<h1>Volunteer Request</h1>

<p>Hello <?php echo "$firstname"; ?></p>
<p>This is a request that has been sent to you from <?php echo "$firstnam $surnam&nbsp;"; ?>
  as they would like to volunteer at your event upcoming event <strong><?php echo $event_title;?></strong>.
  Attached is a link to <?php echo "$firstnam's &nbsp;";?>profile to help you decide</p>

<p><?php echo "$firstnam&nbsp";?>says:</p>
<p><em>"<?php echo $volunteer_reason;?>"</em></p>

<?php  echo "<a class=\"button\" href=\"myProfileStatic.php?user_id=$user_id\">View Profile</a>";?>

<?php  echo "<a class=\"button\" href=\"request-accepted-event-manager.php?email=$email&user_id=$user_id&event_id=$event_id\">Accept</a>";?>
<?php  echo "<a class=\"button\" href=\"delete-request.php?user_id=$user_id\">Delete</a>";?>
</div>
<hr>
<?php
}
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
