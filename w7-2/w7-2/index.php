<?php
include_once "Header.php";
?>

<?php
// Move to Index
$PageId = "0";
// Get the page parameter
if (array_key_exists("PageId", $_GET) == true) {
    $PageId = $_GET["PageId"];
}

//else
//{
//    if(isset($_COOKIE["MyStyle"]) == false)
//    {
        
//    }
//}
?>

<?php



// Get given page
$PageData = PageContentGet($myDbConn, $PageId);
// Display page data
PageDisplay($PageData);
mysqli_free_result($PageData);

// Display sub page links

$SubPages = MyPagesGet($myDbConn, $PageId);
if (($PageId != "0") && ($SubPages) && ($SubPages->num_rows > 0)) {
    echo "Sub page links: ";
    // Display the main menu
    MenuDisplay($SubPages);
    mysqli_free_result($SubPages);

    // Check if the Admin is logged in
} else {
    if (isset($_SESSION["admin_id"]) && $_SESSION["is_admin"] === 1) {
        $username = $_SESSION["username"]; // Replace with the actual session variable name for username
        echo "<br /> Welcome, $username (admin)! Click a menu link";
    }
    // Check if the user is logged in
    else if (isset($_SESSION["user_id"])) {
        $username = $_SESSION["username"]; // Replace with the actual session variable name for username
        echo "<br /> Welcome, $username! Click a menu link";
    }
    // Echo if not logged in
    else {
        echo "<br /> Welcome, please log in to Click a menu link";
    }
}

?>


<?php
// Always close db connection
if ($myDbConn) {
    mysqli_close($myDbConn);
}

include_once "Footer.php";
?>

