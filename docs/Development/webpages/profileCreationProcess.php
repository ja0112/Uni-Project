<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
$Personal_statement = filter_has_var(INPUT_POST, 'Personal_statement') ? $_POST['Personal_statement']: null;
$Interest = filter_has_var(INPUT_POST, 'Interest') ? $_POST['Interest']: null;
$Skills = filter_has_var(INPUT_POST, 'Skills') ? $_POST['Skills']: null;
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
echo $userID;
require_once ('webFunctions.php');
            $conn = createConnection();	// make db connection


$sql = "INSERT INTO IP_profile (user_id, personal_statement, interests, skills) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "isss", $userID, $Personal_statement, $Interest, $Skills);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

header("location: myProfile.php");
?>
