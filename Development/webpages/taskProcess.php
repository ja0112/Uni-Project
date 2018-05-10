<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Task Assigned", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
echo makeNavMenu($admin_privilege);
echo timeout();
//$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$task = filter_has_var(INPUT_POST, 'task') ? $_POST['task']: null;
$user_id = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : null;
$event_id = isset($_REQUEST['eventid']) ? $_REQUEST['eventid'] : null;
//echo $user_id;
//echo $event_id;
$conn = createConnection();

//$personal_statement = isset($_REQUEST['ps']) ? $_REQUEST['ps'] : null;
//echo $user_id;
$sqlID = "SELECT MAX(task_id)
          FROM IP_user_task";

          $queryresult = mysqli_query($conn, $sqlID) or die(mysqli_error($conn));
          while ($row = mysqli_fetch_assoc($queryresult)) {
          $task_id = $row['MAX(task_id)'];
        }
          //echo $task_id;

$sql = "UPDATE IP_user_task
        SET user_task = ?
        WHERE task_id = '$task_id' AND event_id = '$event_id'";

            // executes query
            $stmt = mysqli_prepare($conn, $sql) or die(mysqli_error($conn));
            mysqli_stmt_bind_param($stmt, "s", $task) or die(mysqli_error($conn));
            mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
            mysqli_stmt_close($stmt);

          $sqlUserID = "INSERT INTO IP_planner (user_id, event_id)
                          VALUES (?, ?)";
                        // executes query
                        $stmts = mysqli_prepare($conn, $sqlUserID) or die(mysqli_error($conn));
                        mysqli_stmt_bind_param($stmts, "ii", $user_id, $event_id) or die(mysqli_error($conn));
                        mysqli_stmt_execute($stmts) or die(mysqli_error($conn));
                        mysqli_stmt_close($stmts);
                        mysqli_close($conn);
?>

<div class="wrapper">
<h1>Success</h1>
  <p>Your task has been assigned successfully</p>

  <input type="submit" value="Assign Tasks" class="btn-add-task-to-vol">
  <input type="submit" value="Return Home">
</div>

<?php
echo "<p style='margin-bottom:10em'></p>";
echo makeFooter();
echo makePageEnd();
?>
