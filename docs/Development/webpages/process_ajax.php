<?php


$user_id = $_POST['user_id'];

$eventSql = "SELECT *
             FROM IP_planner AS a INNER JOIN IP_create_event
                        AS b
                        ON a.event_id = b.event_id
                        INNER JOIN IP_users
                        AS c
                        ON a.event_id = c.user_id";

            // executes query
            $queryresult = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));

            while ($row = mysql_fetch_assoc($result)) {
                    $user_id = $row['user_id'];
                echo json_encode($row);
   }
 }

?>
<?php
  echo '<pre>';
  print_r($_REQUEST);
  echo '</pre>';
?>
