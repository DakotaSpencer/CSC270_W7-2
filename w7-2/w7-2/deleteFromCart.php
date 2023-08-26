<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

$myJSON = "";
$row = null;
$myGet = "";

// Process if there is a parameter (id)
if (array_key_exists("title", $_GET) == TRUE) {
    // Get the db connection
    // Get the data
    $myDbConn = ConnGet();
    $myGet = $_GET["title"];
    // Get the records
    $dataSet = DeleteFromCart($myDbConn, $myGet);
    mysqli_close($myDbConn);
}

echo $myJSON;

?>