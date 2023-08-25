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
$myDbConn =  ConnGet();
$PageData = PageContentGet($myDbConn, $PageId);
// Display page data
PageDisplay($PageData);
mysqli_free_result($PageData);

// Display sub page links

//$SubPages = MyPagesGet($myDbConn, $PageId);
//if (($PageId != "0") && ($SubPages) && ($SubPages->num_rows > 0)) {
//    echo "Sub page links: ";
//    // Display the main menu
//    MenuDisplay($SubPages);
//    mysqli_free_result($SubPages);

//    // Check if the Admin is logged in
//} else {
//    if (isset($_SESSION["admin_id"]) && $_SESSION["is_admin"] === 1) {
//        $username = $_SESSION["username"]; // Replace with the actual session variable name for username
//        echo "<br /> Welcome, $username (admin)! Click a menu link";
//    }
//    // Check if the user is logged in
//    else if (isset($_SESSION["user_id"])) {
//        $username = $_SESSION["username"]; // Replace with the actual session variable name for username
//        echo "<br /> Welcome, $username! Click a menu link";
//    }
//    // Echo if not logged in
//    else {
//        echo "<br /> Welcome, please log in to Click a menu link";
//    }
//}

?>

Search for a movie!
<input type="text" id="searchVal" value="" placeholder="Search..."/>
<button name="a" onclick="myClickEvent()">Submit</button>
<p id="A"></p>
<p id="jsonData"></p>
<p id="resultText"></p>

<script>
   var request = new XMLHttpRequest();
    $(document).ready(function () {
        // alert("Ready"); // Use for debugging

    });
    // ---------------------------------
    // Click event
    function myClickEvent() {

        loadJson(document.getElementById("searchVal").value);
    }
    // ---------------------------------
            // Call the microservice and get the data
    function 
    (val) {
        // alert("id: " + id); // Use for debugging
        request.open('GET', 'search.php?searchTerm=' + val);
        request.onload=loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        var myReturn = "<table><tr><td>Title &nbsp;  &nbsp; </td><td>Description &nbsp;  &nbsp; </td><td>Genre &nbsp;  &nbsp; </td><td>Rating &nbsp;  &nbsp; </td><td>Release year &nbsp;  &nbsp; </td></tr>";

        myResponse = request.responseText;

        console.log(myResponse);

        if (myResponse[0].Title) {
            myData = JSON.parse(myResponse);

            // alert(myData);
            
            // Loop through each json record and create the HTML
            for (index in myData) {
                myReturn += "<tr><td>" + myData[index].Title + "</td><td>" +
                    myData[index].Description + "</td><td>" +
                    myData[index].Genre + "</td><td>" +
                    myData[index].Rating + "</td></tr>" +
                    myData[index].Year + "</td></tr>";

            }
            myReturn += "</table>";
            document.getElementById("jsonData").innerHTML = myReturn; // Display table
        } else {
            myReturn = "No Movies Found";
            document.getElementById("resultText").innerHTML = myReturn;
        }
        //alert("A: " + myResponse); // Use for debugging
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
    }


</script>

<?php
// Always close db connection
if ($myDbConn) {
    mysqli_close($myDbConn);
}

include_once "MyFooter.php";
?>

