

<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

$myJSON = null;
$row = null;


// Process if there is a parameter (id)

// Get the db connection
// Get the data
$myDbConn = ConnGet();
// $myGet = $_GET["productId"];
// Get the records
$dataSet = GetAllProduct($myDbConn);

// If the data exists, format the values
if ($dataSet) {
    echo $dataSet
    while ($row = mysqli_fetch_array($dataSet)) {
        //$lastElement = end($row);
        foreach ($row as $k => $v) {
            $myJSON = '[{"title":"' . $row['title'] . '","price":"' . $row['price'] . '","description":"' . $row['description'] . '","category":"' . $row['category'] . '","image":"' . $row['image'] . '","rating":"' . $row['rating'] . '","rateCount":"' . $row['rateCount'] . '"}]';
        }
    }

}
mysqli_close($myDbConn);

echo $myJSON;

?>