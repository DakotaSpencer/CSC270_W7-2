

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
            $myJSON = '[{"Title":"' . $row['Title'] . '","Description":"' . $row['MovieDescription'] . '","Genre":"' . $row['Genre'] . '","Rating":"' . $row['Rating'] . '","Year":"' . $row['ReleaseYear'] . '"}]';
        }
    }
    mysqli_close($myDbConn);
}

echo $myJSON;

?>


