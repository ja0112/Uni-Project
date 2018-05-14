<?php
function createConnection() {
				$conn = mysqli_connect('localhost', "unn_w14001960", 'PlanesA380', 'unn_w14001960');
			 if (mysqli_connect_errno()) {
				echo "<p>Connection failed:".mysqli_connect_error()."</p>\n";
			 }
			 return $conn;
		 }
