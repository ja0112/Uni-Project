<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
require_once ('webFunctions.php');
$conn = createConnection();

if(empty(trim($_POST["email"]))){
    echo "Please enter username.";
} else{

    $email = trim($_POST["email"]);
}
// Check if password is empty
if(empty(trim($_POST['password']))){

    echo "Please enter your password.";
} else{
    $password = trim($_POST['password']);
}

$sql = "SELECT user_id, firstname, surname, email, password, admin_privilege
        FROM IP_users
        WHERE email = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {

      // Bind variables to the prepared statement as parameters

      mysqli_stmt_bind_param($stmt, "s", $email);
      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {

          // Store result
          mysqli_stmt_store_result($stmt);
          // Check if username exists, if yes then verify password
          if (mysqli_stmt_num_rows($stmt) == 1) {

              // Bind result variables
              mysqli_stmt_bind_result($stmt, $userID, $firstname, $surname, $email, $passwordHash, $admin_privilege);

              if (mysqli_stmt_fetch($stmt)) {

                  if (password_verify($password, $passwordHash)) {
                      /* Password is correct, so start a new session and
                      save the username to the session */
                      session_start();
                      $_SESSION['user_id'] = $userID;
                      $_SESSION['firstname'] = $firstname;
                      $_SESSION['surname'] = $surname;
                      $_SESSION['email'] = $email;
                      $_SESSION['logged-in'] = true;
                      $_SESSION['admin_privilege'] = $admin_privilege;
                      header("location: index.php");

                  } else {
                      // Display an error message if password is not valid
                      echo "The password you entered was not valid.";
                  }
              }
          } else {
              // Display an error message if username doesn't exist
              echo "No account found with that username.";
          }
      } else {
          echo "Oops! Something went wrong. Please try again later.";
      }
  }
  // Close statement

  mysqli_stmt_close($stmt);
?>
