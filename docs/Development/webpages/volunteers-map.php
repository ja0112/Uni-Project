<?php
require_once 'webFunctions.php';
$conn = createConnection();
// Start XML file, create parent node


$sql = "SELECT firstname, surname, street_name, event_location, profile_url
        FROM IP_create_event
        AS a
        INNER JOIN IP_users
        AS b
        ON a.event_id = b.event_id
        WHERE 1";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    $fp = fopen('empdata.json', 'w');
    fwrite($fp, json_encode($emparray));
    fclose($fp);

    header('Location: find-volunteers-part2.php');
