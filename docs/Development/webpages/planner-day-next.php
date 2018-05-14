<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$event_id = isset($_SESSION['event_id']) ? $_SESSION['event_id'] : null;
/*echo $event_id;
echo $user_id;*/
require_once 'webFunctions.php';
$conn = createConnection();
echo timeout();
 ?>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script type="text/javascript" src="planner.js"></script>

<input type="button" value="Previous" onclick="showDayPrevious();" class="planner-previous-button-pre" >
 <h2 class="day">Wednesday 23 April</h2>

<script type="text/javascript" src="planner.js"></script>
<?php
$eventSql = "SELECT *
             FROM IP_planner AS a INNER JOIN IP_create_event
                        AS b
                        ON a.event_id = b.event_id
                        INNER JOIN IP_users
                        AS c
                        ON a.user_id = c.user_id
                        WHERE a.user_id = '$user_id' AND event_date BETWEEN '2018-04-23' AND '2018-04-24'";

            // executes query
            $queryresult = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
            //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
            //loops variables when query has been executed so they can be displayed to the user

            while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
            // $user_id = $row['user_id'];
              //$event_id = $row['event_id'];
              $event_title = $row['event_title'];
              $event_location = $row['event_location'];
            	$firstname = $row['firstname'];
            	$surname = $row['surname'];
            	$eventTime = $row['event_time'];
    ?>

  <?php echo "<a href=\"assign-tasks.php?user_id=$user_id&event_id=$event_id\">" ?>
    <div class="planner-task">
      <h3>Event: <?php echo "$event_title";?></h3>
      <p>Where: <?php echo "$event_location";?></p>
      <p>Time: <?php echo date("G:i", strtotime($eventTime)); ?></p>
    </div>
  </a>
  <?php
}
  mysqli_free_result($queryresult);
            //closes connection
            mysqli_close($conn);
  ?>
</div>


</div>
