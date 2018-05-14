<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Volunteer Request", "style.css");

$user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
$event_id = isset($_SESSION['event_id']) ? $_SESSION['event_id'] : null;
  echo makeNavMenu($admin_privilege);


$sql = "SELECT firstname, surname
        FROM IP_users
        WHERE user_id = $user_id";

        $queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
        //loops variables when query has been executed so they can be displayed to the user

        while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
          $firstname = $row['firstname'];
          $surname = $row['surname'];
}
 ?>
<div class="wrapper">

<h1>Volunteer Request</h1>

<p>Please send  <?php echo "$firstname $surname&nbsp;";?> a request to recruit them for your event.
Please write a small paragrapgh stating why you are intersted in <?php echo "$firstname's"?> services.</p>

<form action="eventManager-requestProcess.php" method="post">
<textarea rows="2" cols="40" id="voltxt" class="volatxt" name="volunteerReason" placeholder="Write description"></textarea>
  <input type="submit" value="Send Request" class="btn-evnt-man-req">
</form>
</div>
<?php
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
