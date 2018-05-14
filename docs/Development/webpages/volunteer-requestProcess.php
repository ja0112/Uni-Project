<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Volunteer Request", "style.css");
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : null;
$surname = isset($_SESSION['surname']) ? $_SESSION['surname'] : null;
$event_id = isset($_SESSION['event_id']) ? $_SESSION['event_id'] : null;
$volunteerReason = isset($_POST['volunteerReason']) ? $_POST['volunteerReason'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
echo makeNavMenu($admin_privilege);

$sql = "INSERT INTO IP_view_requests (user_id, firstname, surname, volunteer_reason, event_id) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "isssi", $userID, $firstname, $surname, $volunteerReason, $event_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
?>
<div class="wrapper">
<h1>Thank you</h1>

<p>We have received your request to volunteer and will be in touch shortly</p>


<form action="index.php">
    <input type="submit" value="Return Home" class="btn-sub-process">
</form>
</div>

<?php
echo "<p style='margin-bottom:15em'></p>";
echo makeFooter();
echo makePageEnd();
?>
