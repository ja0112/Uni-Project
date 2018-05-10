<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Edit Events", "style.css");
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();

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

  <h1>Choose an event</h1>
    <h2>Which event would you like to edit?</h2>

    <?php

    $browseEventSql = "SELECT *
            FROM IP_planner
            AS a
            INNER JOIN IP_create_event
            AS b
            ON a.event_id = b.event_id
            INNER JOIN IP_users
            AS c
            ON a.user_id = c.user_id
            WHERE a.user_id = '$userID' ";

                // executes query
                $queryresult = mysqli_query($conn, $browseEventSql) or die(mysqli_error($conn));
                //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
                //loops variables when query has been executed so they can be displayed to the user

                while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
                  $event_id = $row['event_id'];
                  $event_image = $row['event_image'];
                  $event_title = $row['event_title'];
                  $event_desc = $row['event_desc'];
  ?>


        <div class="display-browse-events">
              <p><?php echo"<img src='uploads/$event_image'";?></p>
              <h3><?php echo "$event_title";?></h3>
              <p><?php echo "$event_desc";?></p>
            <?php  echo "<input class=\"btn-edit-select\" onclick=\"location.href='edit-events.php?event_id=$event_id'\" type=\"button\" value=\"Edit   \">";?>
            <?php  echo "<input class=\"btn-edit-select-delete\" onclick=\"location.href='delete-event.php?event_id=$event_id'\" type=\"button\" value=\"Delete\">";?>
          </div>

<?php } ?>
</div>

<?php
mysqli_free_result($queryresult);
          //closes connection
          mysqli_close($conn);
echo "<p style='margin-bottom:3em'></p>";
echo makeFooter();
echo makePageEnd();
?>
