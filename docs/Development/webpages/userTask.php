<?php
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Task List", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();
 ?>
<div class="wrapper">

<h1>[Dynamic title]</h1>

<p>Below are the list of tasks for you to complete</p>
<?php
$userTaskSql = "SELECT user_task
                FROM IP_user_task";

            // executes query
            $queryresult = mysqli_query($conn, $userTaskSql) or die(mysqli_error($conn));
            //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
            //loops variables when query has been executed so they can be displayed to the user

            while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
              $user_task = $row['user_task'];
}
?>
<script type="text/javascript" src="userTask.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<p id="ptagTask"><?php echo $user_task; ?></p>
<textarea rows="2" cols="40" id="textaraTask" class="txtaTask">
  <?php echo $user_task; ?>
</textarea>
<button class="btn btn-default btn-editTask" type="button">EDIT</button>
<button class="btn btn-default btn-saveTask" type="button">SAVE</button>
<button class="btn btn-default btn-cancelTask" type="button">CANCEL</button>

</div>
<?php
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
