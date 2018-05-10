<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once ('webFunctions.php');
            $conn = createConnection();

    echo makePageStart("Results", "style.css");
    $admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
      echo makeNavMenu($admin_privilege);
  echo timeout();

$search_input = isset($_REQUEST['searchInput']) ? $_REQUEST['searchInput'] : null;
$error = array();
?>
<div class="wrapper">
<?php
if (empty($search_input)) {
?>  <p>Please enter a search term</p>
<?php
} else {

$sql = "SELECT event_title, event_desc, event_image
        FROM IP_create_event
        WHERE 1";
            // variable that will find the reqired sql for the input
            $sqlCondition = '';
            //trims input in text box
            $search_input = trim($search_input);
            //checks if entry is not empty and executes the variable to carry out the task
            if (!empty($search_input)) {
            	$sqlCondition .= " AND event_title LIKE '%$search_input%'"; //(PHP: Search Feature (Using Keywords) , 2012)
            }

            $sqlSearch = $sql . $sqlCondition;
            //executes the query
            $rs = mysqli_query($conn, $sqlSearch) or die(mysqli_error($conn));
            //loops the variables so they can be displayed after the query has been executed
            while ($row = mysqli_fetch_assoc($rs)) {
            	$search_result = $row['event_title'];
              $search_description = $row['event_desc'];
              $search_image = $row['event_image'];
?>

    <div class="search-result">
      <p><?php echo "<img src='uploads/$search_image'";  ?></p>
      <p><?php echo $search_description;  ?></p>
      <p><?php echo $search_result;  ?></p>
    </div>
    <?php
  }


mysqli_free_result($rs);
          //closes connection
          mysqli_close($conn);
          }
          ?>
</div>
<?php
      echo "<p style='margin-bottom:33em'></p>";
      echo makeFooter();
      echo makePageEnd();
  ?>
