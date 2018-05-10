<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$conn = createConnection();
  echo timeout();
 ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="planner.js"></script>
<input type="button" value="Next" onclick="showNextWeekly();" class="planner-week-next-btn" >
<input type="button" value="Previous" onclick="" class="planner-week-previous-btn" >
 <h2 class="day">WC 16 April</h2>
<?php
$eventSql = "SELECT *
             FROM IP_planner AS a INNER JOIN IP_create_event
                        AS b
                        ON a.event_id = b.event_id
                        INNER JOIN IP_users
                        AS c
                        ON a.user_id = c.user_id
                        WHERE a.user_id = '$user_id' AND event_date BETWEEN '2018-03-12' AND '2018-03-18'";

            // executes query
            $queryresult = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
            //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
            //loops variables when query has been executed so they can be displayed to the user

            while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
              $user_id = $row['user_id'];
              $event_id = $row['event_id'];
              $event_title = $row['event_title'];
              $event_location = $row['event_location'];
            	$firstname = $row['firstname'];
            	$surname = $row['surname'];
            	$eventTime = $row['event_time'];
    ?>
  <?php echo "<a href=\"assign-tasks.php?user_id=$user_id&event_id=$event_id\">" ?>
    <div class="planner-task">
      <p><?php echo "$firstname $surname";?></p>
      <p><?php echo "$event_title";?></p>
      <p><?php echo "$event_location";?></p>
      <p><?php echo date("G:i", strtotime($eventTime));?></p>
    </div>
  </a>
  <?php
}
  mysqli_free_result($queryresult);
            //closes connection
            mysqli_close($conn);
  ?>
