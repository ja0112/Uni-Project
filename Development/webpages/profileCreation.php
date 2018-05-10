<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Create Profile", "style.css");
$userID = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : null;
echo $_SESSION['user_id'] = $userID;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
echo makeNavMenu($admin_privilege);
  echo timeout();

$sql = "SELECT user_id, firstname, surname
        FROM IP_users
        WHERE user_id = '$userID'";

        $queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
        //loops variables when query has been executed so they can be displayed to the user

        while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
          $firstname = $row['firstname'];
          $surname = $row['surname'];
  ?>
<div class="wrapper">

  <h1>Create Profile</h1>
  <p>Welcome <?php echo "$firstname $surname"; ?> you have now successfully created an account, now it is time to create your profile to advertise your skills.</p>
<form method="post" action="profileCreationProcess.php">

<div>
<h3>Personal Statement</h3>
<p>Your personal statement is designed to give an introduction about yourself and a breif over view of why you want to volunteer.</p>
    <textarea rows="2" cols="40" name="Personal_statement" class="profile-creation-text"></textarea>
</div>

<div>
    <h3>Interests</h3>
    <p>This section is designed for you to express your main interests to gage the type of volunteering opportunities you would like.</p>
        <textarea rows="2" cols="40" name="Interest" class="profile-creation-text"></textarea>
</div>

<div>
    <h3>Skills</h3>
    <p>This section is designed for you to express your main skillset which might help in finding the right opportunities.</p>
        <textarea rows="2" cols="40" name="Skills" class="profile-creation-text"></textarea>
</div>

          <input type="submit" value="Submit" class="btn-position">
        </form>

      </div>
  <?php
}
echo "<p style='margin-bottom:23em'></p>";
echo makeFooter();
echo makePageEnd();
?>
