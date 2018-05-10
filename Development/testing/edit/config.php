<?php
/**************************************************************************************************
* This script is brought to you by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info
***************************************************************************************************/


// Secure this page
if(!defined('VASPLUS_APP')) { die('Access Denied'); exit; } else {}; 

/**
 * These are the database connection details
 */  

define("HOST", 'localhost');     // The host you want to connect to.
define("USER", 'root');    				// The database username. 
define("PASSWORD", '');    		// The database password. 
define("DATABASE", 'tb');    			// The database name.


$MYSQLi = mysqli_connect(HOST, USER, PASSWORD) or die("Unable to connect to MySQL Server: ". mysqli_connect_error());
mysqli_select_db($MYSQLi, DATABASE) or die("Unable to connect to Database: ". DATABASE);

?>