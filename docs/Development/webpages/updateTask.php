<?php
require_once 'webFunctions.php';

$conn = createConnection();

//$personal_statement = isset($_REQUEST['ps']) ? $_REQUEST['ps'] : null;
$task = $_POST['taskvalue'];

$sql = "UPDATE IP_user_task
            SET user_task = ?
            WHERE user_id = 1";

            // executes query
            $stmt = mysqli_prepare($conn, $sql) or die(mysqli_error($conn));
            mysqli_stmt_bind_param($stmt, "s", $task) or die(mysqli_error($conn));
            mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

  ?>
