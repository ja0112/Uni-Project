<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Index", "style.css");
  $admin_privilege = isset($_SESSION['admin_privilege']) ? $_SESSION['admin_privilege'] : null;
  echo makeNavMenu($admin_privilege);
echo timeout();
 ?>
<div class="wrapper">

<div class="home-image">
<img src="../images/homepage-image1.png" style="width: 1370px; height: 400px;">
</div>
<h1>Events</h1>
<?php
$sql = "SELECT event_id, event_image, event_title, event_desc
             FROM IP_create_event
             ORDER BY event_id DESC
             LIMIT 4";

            // executes query
            $queryresult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            //$rs = mysqli_query($conn, $eventSql) or die(mysqli_error($conn));
            //loops variables when query has been executed so they can be displayed to the user

            while ($row = mysqli_fetch_assoc($queryresult)) {  //retrives data from the database
                $event_id = $row['event_id'];
              $event_image = $row['event_image'];
              $event_title = $row['event_title'];
              $event_desc = $row['event_desc'];



    ?>
    <div class="flex-container">
        <?php echo"<img src='uploads/$event_image'>"; ?>
          <h3><?php echo "$event_title"; ?></h3>
            <p><?php echo "$event_desc"; ?></p>
            <!--<a href="#" class="button-position">See more</a>-->


      </div>
    <?php } ?>
      <!--
      <div class="three"><p><?php echo"<img src='uploads/$event_image'"; ?></p>
        <p><?php echo "$event_title"; ?></p>
        <p><?php echo "$event_desc"; ?></p>
        <a href="#" class="button-position">See more</a>-->


        <!--<p class="event-title"><?php //echo "$event_title"; ?></p>-->
        <!--<p class="event-desc"><?php //echo "$event_desc"; ?></p>-->
        <!--<a href="#" class="button-position">See more</a>-->

    </div>

    <!--<div class="home-events1">
        <p><?php //echo"<img src='uploads/$event_image'"; ?></p>
        <!--<p class="event-title"><?php //echo "$event_title"; ?></p>-->
        <!--<p class="event-desc"><?php //echo "$event_desc"; ?></p>-->
        <!--<a href="#" class="button-position">See more</a>-->


  <!--  <div class="home-events2">
        <p><?php //echo"<img src='uploads/$event_image'"; ?></p>
        <!--<p class="event-title"><?php //echo "$event_title"; ?></p>-->
        <!--<p class="event-desc"><?php //echo "$event_desc"; ?></p>-->
        <!--<a href="#" class="button-position">See more</a>-->



<!--</div>-->
<?php
echo "<p style='margin-bottom:10em'></p>";
echo makeFooter();
echo makePageEnd();
?>
