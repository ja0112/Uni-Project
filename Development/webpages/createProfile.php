<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Profile", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();

  $sql = "SELECT personal_statement, interests, skills, past_events
          FROM IP_profile
          WHERE user_id = 1";

              // executes query
              $queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
              //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
              //loops variables when query has been executed so they can be displayed to the user

              while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
                $personal_statement = $row['personal_statement'];
                $interests = $row['interests'];
                $skills = $row['skills'];
                $past_events = $row['past_events'];
}
 ?>
 <script type="text/javascript" src="myProfile.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <a onclick="goBack()">Go Back</a>

<script>
function goBack() {
   window.history.back();
}
</script>
<div class="wrapper">
  <h1>My profile</h1>
  <h2>Volunteer based in <em>(insert location)</em></h2>
  <p>Welcome to your profile page this is a place where you can showcase your skills to help find a volunteer job that you are interested in.</p>

<h3>Personal Statement</h3>
    <p id="ptag"><?php echo $personal_statement; ?></p>
    <textarea rows="2" cols="40" id="textara" class="txta">
      <?php echo $personal_statement; ?>
    </textarea>
  <button class="btn btn-default btn-edit" type="button">EDIT</button>
  <button class="btn btn-default btn-save" type="button">SAVE</button>
  <button class="btn btn-default btn-cancel" type="button">CANCEL</button>

  <h3>Interests</h3>
    <p id="ptagInt"><?php echo $interests; ?></p>
    <textarea rows="2" cols="40" id="textaraInt" class="txtaInt">
      <?php echo $interests; ?>
    </textarea>
  <button class="btn btn-default btn-editInt" type="button">EDIT</button>
  <button class="btn btn-default btn-saveInt" type="button">SAVE</button>
  <button class="btn btn-default btn-cancelInt" type="button">CANCEL</button>

  <h3>Skills</h3>
    <p id="ptagSkill"><?php echo $skills; ?></p>
    <textarea rows="2" cols="40" id="textaraSkill" class="txtaSkill">
      <?php echo $skills; ?>
    </textarea>
    <button class="btn btn-default btn-editSkill" type="button">EDIT</button>
    <button class="btn btn-default btn-saveSkill" type="button">SAVE</button>
    <button class="btn btn-default btn-cancelSkill" type="button">CANCEL</button>

  <h3>Past Events</h3>
  <p><?php echo $past_events; ?></p>
</div>

<?php
mysqli_free_result($queryresult);
          //closes connection
          mysqli_close($conn);
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
