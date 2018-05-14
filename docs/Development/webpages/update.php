<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$conn = createConnection();

//$personal_statement = isset($_REQUEST['ps']) ? $_REQUEST['ps'] : null;
$personal_statement = $_POST['txtvalue'];

$sql = "UPDATE IP_profile
            SET personal_statement = ?
            WHERE user_id = '$userID'";

            // executes query
            $stmt = mysqli_prepare($conn, $sql) or die(mysqli_error($conn));
            mysqli_stmt_bind_param($stmt, "s", $personal_statement) or die(mysqli_error($conn));
            mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

  ?>
