<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Assign Tasks", "style.css");
 $event_id = isset($_REQUEST['event_id']) ? $_REQUEST['event_id'] : null;
  $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();

$sql = "SELECT *
             FROM IP_planner AS a INNER JOIN IP_create_event
                        AS b
                        ON a.event_id = b.event_id
                        INNER JOIN IP_users
                        AS c
                        ON a.user_id = c.user_id
                        WHERE a.user_id = $user_id AND a.event_id = $event_id";

                        $queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
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

}


$sqlTask = "SELECT user_task
             FROM IP_user_task
             WHERE user_id = '$user_id' AND event_id = '$event_id'";

                        $queryresult = mysqli_query($conn, $sqlTask) or die(mysqli_error($conn));
                        //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
                        //loops variables when query has been executed so they can be displayed to the user

                        while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
                          $task = $row['user_task'];

}
 ?>
<div class="wrapper">

<h1><?php echo $event_title; ?></h1>

<p>Below are the list of tasks for you to complete</p>

<p><?php echo $task; ?></p>


</div>
<?php

mysqli_free_result($queryresult);
          //closes connection
          mysqli_close($conn);
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
