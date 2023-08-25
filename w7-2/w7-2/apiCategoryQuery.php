

<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

$myJSON = "";
$row = null;
$myGet = "";

// Process if there is a parameter (id)
if (array_key_exists("category", $_GET) == TRUE) {
    // Get the db connection
    // Get the data
    $myDbConn = ConnGet();
    $myGet = $_GET["category"];
    // Get the records
    $dataSet = GetCategory($myDbConn, $myGet);

    // If the data exists, format the values
    if ($dataSet) {

        if ($row = mysqli_fetch_array($dataSet)) {
            $lastElement = end($row);

            foreach ($row as $k => $v) {
                $myJSON = "[";
                $myJSON .= '{"Category":"' . $row['Category'] . '","Title":"' . $row['Title'] . '","Description":"' . $row['Description'] . '","Price":"' . $row['Price'] . '","Rating":"' . $row['Rating'] . '","Rate Count":"' . $row['RateCount'] . '"}';
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

