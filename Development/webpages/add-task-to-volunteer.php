<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Add Task", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
 $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : null;
 $event_id = isset($_REQUEST['event_id']) ? $_REQUEST['event_id'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();
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
<h1>Assign a task to <?php echo "$firstname $surname"; ?></h1>
<p>Write a breif description of tasks you would like to assign for this user</p>
  <form action="taskProcess.php" method="post" class="col s12">
    <label for="usertask"></label>
       <div class="textbox">
       <textarea rows="2" cols="40" id="textara" class="txtaVol" name="task" placeholder="Write tasks here"></textarea>
<?php echo "<input type=\"hidden\" name=\"userid\" value=\"$user_id\">" ?>
<?php echo "<input type=\"hidden\" name=\"eventid\" value=\"$event_id\">" ?>

     <div class="marginBottom">
         <input type="submit" value="Assign Tasks" class="btn-add-task-to-vol">
     </div>
   </form>

</div>

</div>
<?php
echo "<p style='margin-bottom:10em'></p>";
echo makeFooter();
echo makePageEnd();
?>
