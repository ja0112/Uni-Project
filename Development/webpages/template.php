<?php
ini_set("session.save_path", "/home/unn_w14001960/sessionData");
session_start();
require_once 'webFunctions.php';
$conn = createConnection();
echo makePageStart("Index", "style.css");
  echo makeNavMenu();

 ?>
<div class="wrapper">


<p>Main body</p>
<p>Main body</p>
<p>Main body</p>
<p>Main body</p>
<p>Main body</p>



</div>
<?php
echo "<p style='margin-bottom:33em'></p>";
echo makeFooter();
echo makePageEnd();
?>
