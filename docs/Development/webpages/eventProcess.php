<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
$userID = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

$eventTitle = filter_has_var(INPUT_POST, 'eventTitle') ? $_POST['eventTitle']: null;
$eventLocation = filter_has_var(INPUT_POST, 'eventLocation') ? $_POST['eventLocation']: null;
$eventDesc = filter_has_var(INPUT_POST, 'eventDesc') ? $_POST['eventDesc']: null;
$numberofVolunteers  = filter_has_var(INPUT_POST, 'numberofVolunteers') ? $_POST['numberofVolunteers']: null;
$attendeesLimit = filter_has_var(INPUT_POST, 'attendeesLimit') ? $_POST['attendeesLimit']: null;
$selectDate = filter_has_var(INPUT_POST, 'selectDate') ? $_POST['selectDate']: null;
$selectTime = filter_has_var(INPUT_POST, 'selectTime') ? $_POST['selectTime']: null;

require_once ('webFunctions.php');
            $conn = createConnection();	// make db connection

$eventTitle = $eventLocation = $eventDesc = $numberofVolunteers = $attendeesLimit = $attendeesLimit = $selectDate =  $selectTime = "";

$errors = array();
$errorsImage = array();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

  if (empty($_POST["eventTitle"])) {
    $eventTitleErr = "Please enter an event title";
    $errors[] = "eventTitle ERROR";
  } else {
    $eventTitle = test_input($_POST["eventTitle"]);
  }

  if (empty($_POST["eventLocation"])) {
    $eventLocationErr = "Please enter an event location";
      $errors[] = "eventLocation ERROR";
  } else {
    $eventLocation = test_input($_POST["eventLocation"]);
  }

  if (empty($_POST["eventDesc"])) {
    $eventDescErr = "Please enter an event description";
      $errors[] = "eventDesc ERROR";
  } else {
    $eventDesc = test_input($_POST["eventDesc"]);
  }

  if (empty($_POST["numberofVolunteers"])) {
    $numberofVolunteersErr = "Please enter the required number of volunteers";
      $errors[] = "numberofVolunteers ERROR";
  } else {
    $numberofVolunteers = test_input($_POST["numberofVolunteers"]);
  }

  if (empty($_POST["attendeesLimit"])) {
    $attendeesLimitErr = "Please enter an expected number of attendees";
      $errors[] = "numberofVolunteers ERROR";
  } else {
    $attendeesLimit = test_input($_POST["attendeesLimit"]);
  }

  if (empty($_POST["selectDate"])) {
    $selectDateErr = "Please enter an event date";
      $errors[] = "selectDate ERROR";
  } else {
    $selectDate = test_input($_POST["selectDate"]);
  }

  if (empty($_POST["selectTime"])) {
    $selectTimeErr = "Please enter an event time";
      $errors[] = "selectTime ERROR";
  } else {
    $selectTime = test_input($_POST["selectTime"]);
  }

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
            $errorsImage[] = "File is not an image.";
          $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
        $errorsImage[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
        $errorsImage[] = "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } else {
            $errorsImage[] = "Sorry, there was an error uploading your file.";
      }
  }

  if (!empty($errors)){
      //display each error
      foreach ($errors as $currentError){
          //echo the current error / current errors within the array

          $_SESSION['eventTitle'] = $eventTitleErr;
          $_SESSION['eventLocation'] = $eventLocationErr;
          $_SESSION['eventDesc'] = $eventDescErr;
          $_SESSION['numberofVolunteers'] = $numberofVolunteersErr;
          $_SESSION['attendeesLimit'] = $attendeesLimitErr;
          $_SESSION['selectDate'] = $selectDateErr;
          $_SESSION['selectTime'] = $selectTimeErr;


      }
  }
        if (!empty($errorsImage)){
            //display each error
            foreach ($errorsImage as $currentErrors){
                //echo the current error / current errors within the array

                  $_SESSION['imageErrors'] = $currentErrors;

                header("Location: create-event.php");
            }
        } else {

$eventImage = basename($_FILES["fileToUpload"]["name"]);;
$sql = "INSERT INTO IP_create_event (event_title, event_location, event_desc, num_of_volunteers, attendees_limit, event_date, event_time, event_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssiisss", $eventTitle, $eventLocation, $eventDesc, $numberofVolunteers, $attendeesLimit, $selectDate, $selectTime, $eventImage);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

//$users = $userID;
$lastID = mysqli_insert_id($conn);
echo $lastID;

$_SESSION['event_id'] = $lastID;

$sqlPlanner = "INSERT INTO IP_planner (user_id, event_id)
                VALUES (?, ?)";
$stmts = mysqli_prepare($conn, $sqlPlanner);
mysqli_stmt_bind_param($stmts, "ii", $userID, $lastID);
mysqli_stmt_execute($stmts);
mysqli_stmt_close($stmts);
/*$sqlEvent = "INSERT INTO IP_planner (event_id) VALUES (?)";
$stmts = mysqli_prepare($conn, $sqlEvent);
mysqli_stmt_bind_param($stmts, "i", $lastID);
mysqli_stmt_execute($stmts);
mysqli_stmt_close($stmts);*/
mysqli_close($conn);
//header("location:event-created.php");
}
header("location:event-success.php")
?>
