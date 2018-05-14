<?php
require_once('webFunctions.php');
            $conn = createConnection();
 $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : null;

$sql = "DELETE
        FROM IP_view_requests
        WHERE user_id = $user_id";
$queryresult = mysqli_query($conn, $sql) or die (mysqli_error($conn));
if ($queryresult === true) {
        header('location: successPage.php');  // user get directed to success page if deletion is successful.
    } else {
      echo "failed";
  }

?>
