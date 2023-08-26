

<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

$myJSON = "";
$row = null;
$myGet = "";
$myPost = "";
$myProductId = "";

// Get the db connection
// Get the data
if (array_key_exists("releaseyear", $_GET) == TRUE) {
    // Get the db connection
    // Get the data
    $myDbConn = ConnGet();
    $myProductId = $_GET["productId"];
    // Get the records
    $dataSet = AddToCart($myDbConn, $myProductId);
    echo "Product ID: " . $myProductId . " , added!";
    // If the data exists, format the values
    if ($dataSet) {
        // $myJSON = "[";

    }
    mysqli_close($myDbConn);
} else {
    echo "No Release year Provided";
}
//INSERT INTO Dog (Dog_Name,Breed,Age, Dog_Owner) VALUES('Precious','Pitbull', 1, 'Cynthia');

echo $myJSON;

?>


