<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Edit Events", "style.css");
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$event_id = isset($_REQUEST['event_id']) ? $_REQUEST['event_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();
  $sql = "SELECT *
          FROM IP_planner
          AS a
          INNER JOIN IP_create_event
          AS b
          ON a.event_id = b.event_id
          WHERE a.event_id = '$event_id'
          LIMIT 1";

              // executes query
              $queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
              //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
              //loops variables when query has been executed so they can be displayed to the user

              while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
                $user_id = $row['user_id'];
                $event_id = $row['event_id'];
                $event_title = $row['event_title'];
                $event_desc = $row['event_desc'];
                $event_location = $row['event_location'];
                $num_of_volunteers =$row['num_of_volunteers'];
                $attendees_limit = $row['attendees_limit'];
                $event_date = $row['event_date'];
                $event_time = $row['event_time'];
                $event_image = $row['event_image'];
}

?>
 <script type="text/javascript" src="editEvents.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <a onclick="goBack()">Go Back</a>

<script>
function goBack() {
   window.history.back();
}
</script>

<div class="wrapper">

  <h1>Edit Events</h1>

<div class="event-title">
<h3>Event Title</h3>
    <p id="ptag"><?php echo $event_title; ?></p>
    <textarea rows="2" cols="40" id="textara" class="txta"><?php echo $event_title;?></textarea>
  <button class="btn-edit" type="button">Edit</button>
  <button class="btn-save" type="button">Save</button>
  <button class="btn-cancel" type="button">Cancel</button>
</div>

<div class="event-location">
  <h3>Event Location</h3>
    <p id="ptagEL"><?php echo $event_location; ?></p>
    <input id="textaraEL" class="txtaEL">
  <button class="btn-editEL" type="button">Edit</button>
  <!--<div class="buttons">-->
  <button class="btn-saveEL" type="button">Save</button>
  <button class="btn-cancelEL" type="button">Cancel</button>
</div>

<div class="event-desc">
  <h3>Event Description</h3>
    <p id="ptagSkill"><?php echo $event_desc; ?></p>
    <textarea rows="2" cols="40" id="textaraSkill" class="txtaSkill"><?php echo $event_desc;?></textarea>
    <button class="btn-editSkill" type="button">Edit</button>
    <button class="btn-saveSkill" type="button">Save</button>
    <button class="btn-cancelSkill" type="button">Cancel</button>
</div>

<div class="num-volunteers">
  <h3>Number of Volunteers Needed</h3>
    <p id="ptagNumVol"><?php echo $num_of_volunteers; ?></p>
    <textarea rows="2" cols="40" id="textaraNumVol" class="txtaNumVol"><?php echo $num_of_volunteers;?></textarea>
    <button class="btn-editNumVol" type="button">Edit</button>
    <button class="btn-saveNumVol" type="button">Save</button>
    <button class="btn-cancelNumVol" type="button">Cancel</button>
</div>

<div class="attendees-limit">
  <h3>Attendees Limit</h3>
    <p id="ptagAttLim"><?php echo $attendees_limit; ?></p>
    <textarea rows="2" cols="40" id="textaraAttLim" class="txtaAttLim"><?php echo $attendees_limit;?></textarea>
    <button class="btn-editAttLim" type="button">Edit</button>
    <button class="btn-saveAttLim" type="button">Save</button>
    <button class="btn-cancelAttLim" type="button">Cancel</button>
</div>


<div class="event-date">
  <h3>Event Date</h3>
    <p id="ptagDate"><?php echo $event_date; ?></p>
    <div class="datebox">
    <input id="textaraDate" class="txtaDate" type="date" name="selectDate"><?php ?>
  </div>
    <button class="btn-editDate" type="button">Edit</button>
    <button class="btn-saveDate" type="button">Save</button>
    <button class="btn-cancelDate" type="button">Cancel</button>
</div>

<div class="event-time">
  <h3>Event Time</h3>
    <p id="ptagTime"><?php echo $event_time; ?></p>
    <div class="timebox">
    <input id="textaraTime" class="txtaTime" type="time" name="selectTime">
  </div>
    <button class="btn-editTime" type="button">Edit</button>
    <button class="btn-saveTime" type="button">Save</button>
    <button class="btn-cancelTime" type="button">Cancel</button>
</div>

<div class="event-image">
  <h3>Event Image</h3>
     <form action="image-update.php" method="post" enctype="multipart/form-data">
    <p id="ptagImage"><?php echo $event_image; ?></p>
    <input type="file" name="fileToUpload" class="txtaImage" id="fileToUpload">
    <button class="btn-editImage" type="button">Edit</button>
    <button class="btn-saveImage" type="submit">Save</button>
    <button class="btn-cancelImage" type="button">Cancel</button>
  </form>
</div>


</div>

<?php
mysqli_free_result($queryresult);
          //closes connection
          mysqli_close($conn);
echo "<p style='margin-bottom:3em'></p>";
echo makeFooter();
echo makePageEnd();
?>
