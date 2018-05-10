<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Volunteer Request", "style.css");
$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : null;
$surname = isset($_SESSION['surname']) ? $_SESSION['surname'] : null;

$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
$event_id = isset($_SESSION['event_id']) ? $_SESSION['event_id'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();
  echo notLoggedIn();


 ?>
<div class="wrapper">

<h1>Volunteer Request</h1>

<p>Thank you for showing an interest in voluntering for this event <?php echo "$firstname. &nbsp;";?>
Please write a small paragrapgh below stating why you want to volunteer for this event.</p>

<form action="volunteer-requestProcess.php" method="post">
<textarea rows="2" cols="40" id="voltxt" class="volatxt" name="volunteerReason" placeholder="Reason for volunteering"></textarea>
  <input type="submit" class="btn-sub" value="Submit">
</form>
</div>
<?php
echo "<p style='margin-bottom:15em'></p>";
echo makeFooter();
echo makePageEnd();
?>
