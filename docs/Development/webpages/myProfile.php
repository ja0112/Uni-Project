<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Profile", "style.css");
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();

  $sql = "SELECT *
          FROM IP_profile
          AS a
          INNER JOIN IP_users
          AS b
          ON a.user_id = b.user_id
          WHERE a.user_id = '$userID'";

              // executes query
              $queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
              //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
              //loops variables when query has been executed so they can be displayed to the user

              while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
                $firstname = $row['firstname'];
                $surname = $row['surname'];
                $personal_statement = $row['personal_statement'];
                $interests = $row['interests'];
                $skills = $row['skills'];
                $past_events = $row['past_events'];
}

$sqlLocation = "SELECT *
                FROM IP_create_event
                AS a
                INNER JOIN IP_view_requests
                AS b
                ON a.event_id = b.event_id
                WHERE user_id = '$userID'";

            // executes query
            $queryresult1 = mysqli_query($conn, $sqlLocation) or die(mysqli_error($conn));
            //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
            //loops variables when query has been executed so they can be displayed to the user

            while ($row = mysqli_fetch_assoc($queryresult1)) {  //retrives data from the database
              $event_location = $row['event_location'];
              //echo $event_location;
}
?>
 <script type="text/javascript" src="myProfile.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="wrapper">

  <h1><?php echo "$firstname $surname"; ?></h1>
  <h2>Volunteer based in <em><?php //echo $event_location; ?></em></h2>
  <p>Welcome to your profile page this is a place where you can showcase your skills to help find a volunteer job that you are interested in.</p>

<div class="personal-statement">
<h3>Personal Statement</h3>
    <p id="ptag"><?php echo $personal_statement; ?></p>
    <textarea rows="2" cols="40" id="textara" class="txta"><?php echo $personal_statement;?></textarea>
  <button class="btn-edit" type="button">Edit</button>
  <button class="btn-save" type="button">Save</button>
  <button class="btn-cancel" type="button">Cancel</button>
</div>

<div class="interests">
  <h3>Interests</h3>
    <p id="ptagInt"><?php echo $interests; ?></p>
    <textarea rows="2" cols="40" id="textaraInt" class="txtaInt"><?php echo $interests;?></textarea>
  <button class="btn-editInt" type="button">Edit</button>
  <!--<div class="buttons">-->
  <button class="btn-saveInt" type="button">Save</button>
  <button class="btn-cancelInt" type="button">Cancel</button>
</div>

<div class="skills">
  <h3>Skills</h3>
    <p id="ptagSkill"><?php echo $skills; ?></p>
    <textarea rows="2" cols="40" id="textaraSkill" class="txtaSkill"><?php echo $skills;?></textarea>
    <button class="btn-editSkill" type="button">Edit</button>
    <button class="btn-saveSkill" type="button">Save</button>
    <button class="btn-cancelSkill" type="button">Cancel</button>
</div>

<div class="past-events">
  <h3>Past Events</h3>
  <p><?php echo $past_events; ?></p>
</div>

</div>

<?php
mysqli_free_result($queryresult);
mysqli_free_result($queryresult1);
          //closes connection
          mysqli_close($conn);
echo "<p style='margin-bottom:3em'></p>";
echo makeFooter();
echo makePageEnd();
?>
