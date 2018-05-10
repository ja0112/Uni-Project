<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
$firstname = filter_has_var(INPUT_POST, 'firstname') ? $_POST['firstname']: null;
$surname = filter_has_var(INPUT_POST, 'surname') ? $_POST['surname']: null;
$email = filter_has_var(INPUT_POST, 'email') ? $_POST['email']: null;
$password  = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;
$admin_privilege  = filter_has_var(INPUT_POST, 'admin_privilege') ? $_POST['admin_privilege']: null;

require_once ('webFunctions.php');
            $conn = createConnection();	// make db connection

            //$firstnameErr = $surnameErr = $emailErr = $passwordErr = "";
          $firstname = $surname = $email = $password = $admin_privilege = "";

          $errors = array();

          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

            if (empty($_POST["firstname"])) {
              $firstnameErr = "Firstname is required";
              $errors[] = "firstname ERROR";
            } else {
              $firstname = test_input($_POST["firstname"]);
            }

            if (empty($_POST["surname"])) {
              $surnameErr = "Surname is required";
                $errors[] = "surname ERROR";
            } else {
              $surname = test_input($_POST["surname"]);

            }

            if (empty($_POST["email"])) {
              $emailErr = "Email is required";
                $errors[] = "Email ERROR";
            } else {
              $email = test_input($_POST["email"]);
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
              $errors[] = "invalid Format ERROR";
                }

            }

            if (empty($_POST["password"])) {
              $passwordErr = "Password is Required";
                $errors[] = "password ERROR";
            } else {
              $password = test_input($_POST["password"]);
              if (strlen($password) < 3) {
                   $passwordErr = "Password is too short";
                     $errors[] = "password Too short ERROR";
                 }

            }
                  if (strlen($password) > 3) {
                     $passwordErr = "Your password is too long";
                }

                $admin_privilege = test_input($_POST["admin_privilege"]);

          if (!empty($errors)){
              //display each error
              foreach ($errors as $currentError){
                  //echo the current error / current errors within the array

                  $_SESSION['firstname'] = $firstnameErr;
                  $_SESSION['surname'] = $surnameErr;
                  $_SESSION['email'] = $emailErr;
                  $_SESSION['password'] = $passwordErr;
                  $_SESSION['admin_privilege'] = $admin_privilegeErr;

                  header("Location: signup.php");
              }
          }  else {



$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO IP_users (firstname, surname, email, password, admin_privilege) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssss", $firstname, $surname, $email, $passwordHash, $admin_privilege);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if (mysqli_prepare($conn, $sql)) {   //reference this code
    $last_id = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if (password_verify($password, $passwordHash)) {
    /* Password is correct, so start a new session and
    save the username to the session */
    $_SESSION['user_id'] = $last_id;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['surname'] = $surname;
    $_SESSION['email'] = $email;
    //$_SESSION['logged-in'] = true;
    $_SESSION['admin_privilege'] = $admin_privilege;
}

mysqli_close($conn);

if ($admin_privilege == "Volunteer") {
  header("location:profileCreation.php?user_id=$last_id");
} else {
  header("location:signin.php");
}

}
?>
