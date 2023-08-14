

<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

$myJSON = "";
$row = null;
$myGet = "";
$myPost = "";
$myTitle = "";
$myMovieDescription = "";
$myGenre = "";
$myRating = "";
$myReleaseYear = "";
$myPatch = "";
$myDelete = "";

if (array_key_exists("title", $_GET) == TRUE) {
    // Get the db connection
    // Get the data
    if (array_key_exists("description", $_GET) == TRUE) {
        // Get the db connection
        // Get the data
        if (array_key_exists("genre", $_GET) == TRUE) {
            // Get the db connection
            // Get the data
            if (array_key_exists("rating", $_GET) == TRUE) {
                // Get the db connection
                // Get the data
                if (array_key_exists("releaseyear", $_GET) == TRUE) {
                    // Get the db connection
                    // Get the data
                    $myDbConn = ConnGet();
                    $myTitle = $_GET["title"];
                    $myMovieDescription = $_GET["description"];
                    $myGenre = $_GET["genre"];
                    $myRating = $_GET["rating"];
                    $myReleaseYear = $_GET["releaseyear"];
                    // Get the records
                    $dataSet = MyCreate($myDbConn, $myTitle, $myMovieDescription, $myGenre, $myRating, $myReleaseYear);
                    echo "Movie: ".$myTitle." , added!";
                    // If the data exists, format the values
                    if ($dataSet) {
                        // $myJSON = "[";
                        
                    }
                    mysqli_close($myDbConn);
                } else {
                    echo "No Release year Provided";
                }
            } else {
                echo "No Rating Provided";
            }
        } else {
            echo "No Genre Provided";
        }
    } else {
        echo "No Description Provided";
    }
} else {
    echo "No Title Provided";
}
//INSERT INTO Dog (Dog_Name,Breed,Age, Dog_Owner) VALUES('Precious','Pitbull', 1, 'Cynthia');

echo $myJSON;

?>


