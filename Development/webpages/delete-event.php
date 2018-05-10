<?php
require_once('webFunctions.php');
            $conn = createConnection();
 $event_id = isset($_REQUEST['event_id']) ? $_REQUEST['event_id'] : null;

$sql = "DELETE
        FROM IP_create_event
        WHERE event_id = $event_id";
        
$queryresult = mysqli_query($conn, $sql) or die (mysqli_error($conn));
if ($queryresult === true) {
        header('location: successPage.php');  // user get directed to success page if deletion is successful.
    } else {
      echo "failed";
  }

?>
