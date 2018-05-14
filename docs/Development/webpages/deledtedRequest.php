<?php //page made by James Ashcroft
// get webfunctions
require_once 'webFunctions.php';
$conn = createConnection();


echo makePageStart("Designerbay Admin Privileges", "materialize.css", "style.css");
//create navigation bar
$user_type = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : null;
$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;
$member = isset($_SESSION['member']) ? $_SESSION['member'] : null;
echo makeNavMenu($userID, $user_type, $member);
  echo timeout();
// information displayed to user when message is deleted
echo "<p>You have deleted this message successfully.</p>";

?>
<form action="admin-dashboard.php" method="">
    <div class="marginBottom">
        <input type="submit"  class="button" value="Back to Admin Dashboard">
    </div>
</form>
<?php


// create rest of page
echo startMain();
echo "<p style='margin-bottom:25em'></p>";
echo makeFooter();
echo endMain();
echo makePageEnd();



?>
