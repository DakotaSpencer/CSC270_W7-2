

<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

$myJSON = "";
$row = null;
$search = "";

// Process if there is a parameter (id)
if (array_key_exists("searchTerm", $_GET) == TRUE) {
    // Get the db connection
    // Get the data
    $myDbConn = ConnGet();
    $search = $_GET["searchTerm"];
    // Get the records
    $dataSet = Search($myDbConn, $search);

    // If the data exists, format the values
    if ($dataSet) {
        // $myJSON = "[";
        if ($row = mysqli_fetch_array($dataSet)) {
            $myJSON = '[{"Category":"' . $row['Category'] . '","Title":"' . $row['Title'] . '","Description":"' . $row['Description'] . '","Price":"' . $row['Price'] . '","Rating":"' . $row['Rating'] . '","Rate Count":"' . $row['RateCount'] . '"}]';
        }
    }
    mysqli_close($myDbConn);
}

echo $myJSON;

?>


