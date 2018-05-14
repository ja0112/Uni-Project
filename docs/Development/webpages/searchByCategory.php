<?php

include 'database_conn.php';	  // make db connection

// extract category from request stream
$category = $_GET['childrens'];
/*$category = $_GET['Comedy'];
$category = $_GET['Drama'];
$category = $_GET['Romance'];*/

$category = isset ($_GET['childrens']) ? $_GET['childrens'] : null;
echo $category;

$sql = "SELECT movieID, title, certificate, category, year FROM movie";
$rsMovies = mysqli_query($conn, $sql) or die(mysqli_error($conn));



while ($row = mysqli_fetch_assoc($rsMovies)) {
	$movieID = $row['movieID'];
	$title = $row['title'];
	$certificate = $row['certificate'];
	$category = $row['category'];
	$year = $row['year'];


	echo "<div class= \"movie\">\n";
	echo "<span class= \"movieID\">$movieID</span>\n";
	echo "<span class= \"title\">$title</span>\n";
	echo "<span class= \"certificate\">$certificate</span>\n";
	echo "<span class= \"category\">$category</span>\n";
	echo "<span class= \"year\">$year</span>\n";
	echo "</div>\n";
	
}
mysqli_free_result($rsMovies);
mysqli_close($conn);

?>