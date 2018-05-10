<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Create Event", "style.css");
$admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
  echo timeout();

  $eventTitleErr = isset($_SESSION['eventTitle']) ? $_SESSION['eventTitle'] : null;
  $eventLocationErr = isset($_SESSION['eventLocation']) ? $_SESSION['eventLocation'] : null;
  $eventDescErr = isset($_SESSION['eventDesc']) ? $_SESSION['eventDesc'] : null;
  $numberofVolunteersErr = isset($_SESSION['numberofVolunteers']) ? $_SESSION['numberofVolunteers'] : null;
  $attendeesLimitErr = isset($_SESSION['attendeesLimit']) ? $_SESSION['attendeesLimit'] : null;
  $selectDateErr = isset($_SESSION['selectDate']) ? $_SESSION['selectDate'] : null;
  $selectTimeErr = isset($_SESSION['selectTime']) ? $_SESSION['selectTime'] : null;
  $imageErr = isset($_SESSION['imageErrors']) ? $_SESSION['imageErrors'] : null;
 ?>
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="datepicker.js"></script>-->
<div class="wrapper">

<h1>Create Event</h1>

<p>Please fill in the following form to create an event</p>

<div class="fstyle">
   <form action="eventProcess.php" method="post" enctype="multipart/form-data">
     <label for="event-title">Event Title</label>
        <div class="textbox">

        <input placeholder="Event Title" id="event-title" name="eventTitle" type="text" class="validate">
        <div class="error-message"><strong><?php echo $eventTitleErr;?></strong></div>

        </div>

        <label for="event-location">Event Location</label>
        <div class="textbox">
          <input type="text"  name="eventLocation" placeholder="Enter a location">
          <div class="error-message"><strong><?php echo $eventLocationErr;?></strong></div>
        </div>


        <label for="event-description">Event Description</label>
        <div class="textbox">
        <textarea rows="4" cols="50" name="eventDesc" class="evArea" placeholder="Provide a description"></textarea>
        <div class="error-message"><strong><?php echo $eventDescErr;?></strong></div>
      </div>


        <label for="number-of-volunteers">Number of Volunteers Needed</label>
        <div class="textbox">
      <input placeholder="number of volunteers" id="volunteers-needed" name="numberofVolunteers" type="text" class="validate">
      <div class="error-message"><strong><?php echo $numberofVolunteersErr;?></strong></div>
    </div>


    <label for="addendees-limit">Attendees Limit</label>
    <div class="textbox">
      <input placeholder="Attendees limit" id="volunteers-needed" name="attendeesLimit" type="text" class="validate">
      <div class="error-message"><strong><?php echo $attendeesLimitErr;?></strong></div>
    </div>

  <label for="datepicker">Select Date</label>
    <div class="datebox">
      <input type="date" name="selectDate">
      <div class="error-message"><strong><?php echo $selectDateErr;?></strong></div>
    </div>

    <label for="timepicker">Select Time</label>
      <div class="timebox">
        <input type="time" name="selectTime">
        <div class="error-message"><strong><?php echo $selectTimeErr;?></strong></div>
      </div>

    <label for="fileUpload">Event Image</label>
    <div class="imageUpLoad">
      <input type="file" name="fileToUpload" id="fileToUpload">
      <div class="error-message"><strong><?php echo $imageErr;?></strong></div>
    </div>


      <div class="marginBottom">
          <input type="submit" class="btn-submt" value="Create Event">
      </div>
    </form>


</div>

</div>
<?php
echo "<p style='margin-bottom:7em'></p>";
echo makeFooter();
echo makePageEnd();
?>
