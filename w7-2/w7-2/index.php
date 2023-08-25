<?php
include_once "Header.php";
?>




<?php
// Always close db connection
if ($myDbConn) {
    mysqli_close($myDbConn);
}

include_once "Footer.php";
?>

