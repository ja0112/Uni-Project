<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Add Task", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();
 ?>
<div class="wrapper">

<h1>Add task to user</h1>

<p>You are now connected with [event manager]  for thier upcoming event. You can expect to be contacted
in the near future for further details about what you will be doing. If you would like to contact [event manager]
email them on 'email@address.com'</p>


<?php  echo "<a class=\"button\" href=\"volunteer-request.php?event_id=$event_id\">Button</a>";?>
</div>
<?php
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
