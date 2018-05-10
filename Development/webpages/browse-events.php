<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Browse Events", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();


 ?>
<div class="wrapper">
<h1>Browse Events</h1>

<p>Browse events in your local area</p>
<?php
$browseEventSql = "SELECT event_id, event_image, event_title, event_desc
             FROM IP_create_event
             ORDER BY event_id DESC
             LIMIT 6";

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
<!--<div class="overall-position">-->
        <div class="display-browse-events">
              <p><?php echo"<img src='uploads/$event_image'";?></p>
              <h3><?php echo "$event_title";?></h3>
              <p><?php echo "$event_desc";?></p>
            <?php  echo "<a href=\"event-details.php?event_id=$event_id\" class=\"button-position\">See more</a>";?>
          </div>
    <!--</div>-->
<?php
}
?>
</div>

<?php
mysqli_free_result($queryresult);
          //closes connection
          mysqli_close($conn);
echo "<p style='margin-bottom:13em'></p>";
echo makeFooter();
echo makePageEnd();
?>
