<?php

// Create constants
DEFINE ('DB_USER', '');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_SERVER', '');
DEFINE ('DB_NAME', '');

// ///////////////////////////////////////////////////
// Get db connection
function ConnGet() {
    // $dbConn will contain a resource link to the database
    // @ Don't display error
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3306)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}
// ///////////////////////////////////////////////////
// Get Select records based on the Parent Id
function MyMenuGet($dbConn) {
    $query = "SELECT id, Title FROM menu where isActive = 1;";

    return @mysqli_query($dbConn, $query);
}
// ///////////////////////////////////////////////////
// Get Select page
function PageContentGet($dbConn, $Id) {
    $return = null;

    $query = "SELECT id, Title, Header1, Text1 FROM MyWebDocs where isActive = 1 and id = " . $Id;
    $return = @mysqli_query($dbConn, $query);

    if ((!$return) || ($return->num_rows < 1)){
        // return a defaul fault page
        $query = "SELECT id, Title, Header1, Text1 FROM MyWebDocs where isActive = 1 order by SortOrder asc limit 1;";

        $return = @mysqli_query($dbConn, $query);
    }

return $return;
}

// ///////////////////////////////////////////////////
// Get all the page records
function MyPageRemove($dbConn, $Id) {
    // Never delete a page. set it to incative
    $query = "Update FROM menu set isActive = 0 where id = " . $Id;

    return @mysqli_query($dbConn, $query);
}

function Search($dbConn, $searchTerm)
{
    $query = "SELECT * FROM productss WHERE ProductName like '%" . $searchTerm . "%' OR ProductDescription like '%" . $searchTerm . "%'  AND isActive = 1";
    return @mysqli_query($dbConn, $query);
}


?>

?>



