

<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

$myJSON = "";
$row = null;
$myGet = "";

// Process if there is a parameter (id)
if (array_key_exists("productId", $_GET) == TRUE) {
    // Get the db connection
    // Get the data
    $myDbConn = ConnGet();
    $myGet = $_GET["productId"];
    // Get the records
    $dataSet = GetProduct($myDbConn, $myGet);

    // If the data exists, format the values
    if ($dataSet) {

        if ($row = mysqli_fetch_array($dataSet)) {
            $lastElement = end($row);

            foreach ($row as $k => $v) {
                $myJSON = "[";
                $myJSON .= '{"title":"' . $row['Title'] . '","price":"' . $row['Price'] . '","description":"' . $row['Description'] . '","category":"' . $row['Category'] . '","image":"' . $row['Image'] . '","rating":"' . $row['Rating'] . '","rateCount":"' . $row['rateCount'] . '"}';
                if ($v == $lastElement) {
                    $myJSON .= "]";
                } else {
                    $myJSON .= ",";
                }
            }
        }

    }
    mysqli_close($myDbConn);
}
echo $myJSON;

?>