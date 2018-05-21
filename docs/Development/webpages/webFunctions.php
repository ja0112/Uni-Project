<?php
//create connection to the DB
    function createConnection() {
           	$conn = mysqli_connect('localhost', 'unn_w14001960', 'PlanesA380', 'unn_w14001960');
           if (mysqli_connect_errno()) {
           	echo "<p>Connection failed:".mysqli_connect_error()."</p>\n";
           }
           return $conn;
         }

//create the start of the page
    function makePageStart($pageTitle, $css) {
    $pageStartContent = <<<PAGESTART
	<!doctype html>
	<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		<title>$pageTitle</title>
		<link href="../css/$css" rel="stylesheet" type="text/css" />
	  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
PAGESTART;
    $pageStartContent .="\n";
    return $pageStartContent;
}
//create the header, allows the user to input the title on the page that uses this function
function makeHeader($headingclass, $headingText){
    $headContent = <<<HEAD
	<header class="header">
		<h1 class= '$headingclass'>$headingText</h1>
	</header>
HEAD;
    $headContent .="\n";
    return $headContent;
}
//create the navigation menu
//to be used for my logo in make nav function
function makeNavMenu($admin_privilege) {
    $navMenuContent = <<<NAVMENU


NAVMENU;

?>
<!--<div class="back-link">
<a onclick="goBack()">Go Back</a>
</div>-->
<?php
      if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] && $admin_privilege == "Volunteer")  {
                  echo  '<div class="navigation">
                                        <ul>
                                      <li><a href="logout.php">Logout</a></li>
                                      </ul>
                                      </div>

                                      <div>
                                        <form action="searchProcess.php" method="post">
                                          <input type="search" placeholder="Search" name="searchInput">
                                          <input type="submit" value="Search" class="button-search">
                                       </form>
                                      <div>
                                        <a href="index.php"><img class="logo" src="../images/volunteer-lines-logo.png" width="" class="customLogo"></a>

                                      <div class="navbar">
                                      <ul>
                                      <li><a href="index.php">Home</a></li>
                                      <li><a href="myProfile.php">My Profile</a></li>
                                      <li><a href="planner.php">Planner</a></li>
                                      <li><a href="browse-events.php">Browse Events</a></li>
                                      <li><a href="request-approval-volunteer.php">View Requests</a></li>
                                      </ul>
                                      </div>';
                                    } else if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] && $admin_privilege == "Event Manager") {
                                        echo '<div class="navigation">
                                                              <ul>
                                                              <li><a href="logout.php">Logout</a></li>
                                                            <ul>
                                                            </div>
                                                            <div>
                                                              <form action="searchProcess.php" method="post">
                                                                <input type="search" placeholder="Search" name="searchInput">
                                                                <input type="submit" value="Search" class="button-search">
                                                             </form>
                                                            <div>
                                                            <a href="index.php"><img class="logo" src="../images/VL-logo.png" width="200px" class="customLogo"></a>
                                                            <div class="navbar">
                                                            <ul>
                                                            <li><a href="index.php">Home</a></li>
                                                            <li><a href="admin-dashboard.php">Dashboard</a></li>
                                                            <li><a href="volunteers-map.php">Find Volunteers</a></li>
                                                            <li><a href="planner.php">Planner</a></li>
                                                            <li><a href="browse-events.php">Browse Events</a></li>
                                                            </ul>
                                                            </div>';

                                    } else {

                                      echo  '<div class="navigation">
                                                            <ul>
                                                            <li><a href="signup.php">Signup</a></li>
                                                          <li><a href="signin.php">Login</a></li>
                                                          </ul>
                                                          </div>
                                                          <div>
                                                            <form action="searchProcess.php" method="post">
                                                              <input type="search" placeholder="Search" name="searchInput">
                                                              <input type="submit" value="Search" class="button-search">
                                                           </form>
                                                          <div>
                                                            <a href="index.php"><img class="logo" src="../images/VL-logo.png" width="200px" class="customLogo"></a>

                                                          <div class="navbar">
                                                          <ul>
                                                          <li><a href="index.php">Home</a></li>
                                                          <li><a href="find-volunteers-part2.php">Find Volunteers</a></li>
                                                          <li><a href="planner.php">Planner</a></li>
                                                          <li><a href="browse-events.php">Browse Events</a></li>
                                                          </ul>
                                                          </div>';

                                    }


    $navMenuContent .= "\n";
    return $navMenuContent;
}
?>


<script>
function goBack() {
  window.history.back();
}
</script>
<?php
function timeout() {
  // set time-out period (in seconds)
  $inactive = 600;

  // check to see if $_SESSION["timeout"] is set
  if (isset($_SESSION["timeout"])) {
      // calculate the session's "time to live"
      $sessionTTL = time() - $_SESSION["timeout"];
      if ($sessionTTL > $inactive) {
          session_destroy();
          header("Location: timeout.php");
      }
  }

  $_SESSION["timeout"] = time();
}

function startMain($class = null) {
    return "<main class=\"$class\">\n";
}

function endMain() {
    return "</main>\n";
}
//reset password webFunctions
/*  <div class="bottom-footer">
          <p>&#169; James Ashcroft 2018</p>
  </div>*/

  function notLoggedIn() {
    if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) {
    } else {
      header('Location: notLoggedIn.php');
    }
  }
function makeFooter() {
    $footContent = <<< FOOT
    <footer class="footer">
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-instagram"></a>

  <div class="navfoot">
                <ul>
                <li><a href="#">About us</a></li>
                <li><a href="#">Terms and Conditions</a></li>
                <li><a href="#">Site Map</a></li>
                <li><a href="#">Contact us</a></li>
                </ul>
          </div>
    </footer>
FOOT;

    $footContent .="\n";
    return $footContent;
}

function makePageEnd() {
    return "


			</body>\n</html>";
}
?>
