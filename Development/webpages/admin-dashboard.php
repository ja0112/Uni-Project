<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Dashboard", "style.css");
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
?>
<div class="wrapper">
<h1>Welcome to your Dashboard</h1>

<p>Please choose an option</p>


<div class="container">
      <div class="one">
        <h2>Create Event</h2>
        <p>To get started you can create a new event.</p>
        <a href="create-event.php" class="btns-position">Create Event</a>

      </div>

      <div class="two">
        <h2>View Requests</h2>
        <p>Check if you have any outstanding volunteer requests.</p>
        <p></p>
        <a href="request-approval.php" class="btns-position">View Requests</a>

      </div>


      <div class="three">
            <h2>Edit Events</h2>
            <p>Edit an event if you need to change some details.</p>
            <a href="select-events.php" class="btns-position">Edit Events</a>
      </div>

      <div class="four">
            <h2>Block User</h2>
            <p>Block a volunteer who is being inappropiate.</p>
            <a href="block-user.php" class="btns-position">Edit Events</a>
      </div>

</div>

<div class="container-two">
  <div class="five">
        <h2>Assign Tasks</h2>
        <p>Assign tasks to volunteers you are connected with.</p>
        <a href="#" class="#">Assign Tasks</a>
  </div>

</div>

</div>

<?php
  echo "<p style='margin-bottom:13em'></p>";
  echo makeFooter();
  echo makePageEnd();
 ?>
