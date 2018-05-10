<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$event_id = isset($_SESSION['event_id']) ? $_SESSION['event_id'] : null;
$conn = createConnection();
  echo timeout();
//$personal_statement = isset($_REQUEST['ps']) ? $_REQUEST['ps'] : null;
$eventLocation = $_POST['intvalue'];

$sql = "UPDATE IP_create_event
            SET event_location = ?
            WHERE event_id = $event_id";

            // executes query
            $stmt = mysqli_prepare($conn, $sql) or die(mysqli_error($conn));
            mysqli_stmt_bind_param($stmt, "s", $eventLocation) or die(mysqli_error($conn));
            mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

  ?>
