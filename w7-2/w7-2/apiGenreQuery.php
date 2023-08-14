

<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

$myJSON = "";
$row = null;
$myGet = "";

// Process if there is a parameter (id)
if (array_key_exists("genre", $_GET) == TRUE) {
    // Get the db connection
    // Get the data
    $myDbConn = ConnGet();
    $myGet = $_GET["genre"];
    // Get the records
    $dataSet = GetGenre($myDbConn, $myGet);

    // If the data exists, format the values
    if ($dataSet) {

        if ($row = mysqli_fetch_array($dataSet)) {
            $lastElement = end($row);

            foreach($row as $k => $v) {
                $myJSON = "[";
                $myJSON .= '{"Title":"' . $row['Title'] . '","MovieDescription":"' . $row['MovieDescription'] . '","Genre":"' . $row['Genre'] . '","Rating":"' . $row['Rating'] . '","ReleaseYear":"' . $row['ReleaseYear'] . '"}';
                if($v == $lastElement) {
                     $myJSON .= "]";
                }else{
                    $myJSON .= ",";
                }
            }
        }

    }
    mysqli_close($myDbConn);
}
echo $myJSON;

?>


