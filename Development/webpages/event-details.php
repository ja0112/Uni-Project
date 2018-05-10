<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Event Details", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
 $event_id = isset($_REQUEST['event_id']) ? $_REQUEST['event_id'] : null;
//echo $_SESSION['event_id'] = $event_id;
  echo timeout();
 ?>
 <?php
 $sql = "SELECT *
         FROM IP_create_event
         WHERE event_id = '$event_id'";

             // executes query
             $queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
             //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
             //loops variables when query has been executed so they can be displayed to the user

             while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
               $event_id = $row['event_id'];
               $event_title = $row['event_title'];
               $event_location = $row['event_location'];
               $event_desc = $row['event_desc'];
               $num_of_volunteers = $row['num_of_volunteers'];
               $attendees_limit = $row['attendees_limit'];
               $event_date = $row['event_date'];
               $event_time = $row['event_time'];
               $event_image = $row['event_image'];
 ?>
<div class="wrapper">

<div class="event-image-evnt">
<?php echo "<img src='uploads/$event_image'>" ?>
</div>

<div class="event-desc-details">
  <h1><?php echo $event_title; ?></h1>
  <h2>Location: <?php echo $event_location; ?></h2>
<h3>About the event</h3>
<p><?php echo $event_desc; ?></p>
</div>

<div class="event-details-left">
  <h4>Addtional Information</h4>
<?php echo"<p>Volunteers Required: <strong>$num_of_volunteers</strong> </p>";?>
<?php echo"<p>Expected Attendance: <strong>$attendees_limit</strong></p>";?>
<?php  echo "<a class=\"button\" href=\"volunteer-request.php?event_id=$event_id\">Apply Now</a>";?>
</div>

<div class="event-details">
<?php echo"<p>Date: <strong>"; echo $event_date = date("m.d.y"); echo "</strong> </p>";?>

<?php echo "<p>Time: <strong>"; echo date("G:i", strtotime($event_time)); echo "</p>";?>
</div>


</div>
<?php
}
mysqli_free_result($queryresult);
          //closes connection
          mysqli_close($conn);
echo "<p style='margin-bottom:5em'></p>";
echo makeFooter();
echo makePageEnd();
?>
