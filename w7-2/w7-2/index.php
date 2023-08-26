<?php
include_once "Header.php";
?>

<?php



// Get given page
$myDbConn =  ConnGet();
//$PageData = PageContentGet($myDbConn, $PageId);
<<<<<<< Updated upstream
// Display page data
=======
//// Display page data
>>>>>>> Stashed changes
//PageDisplay($PageData);
//mysqli_free_result($PageData);



?>


<script>
            var request = new XMLHttpRequest();

    window.onload = function () {
        loadJson();
        };
    // ---------------------------------
    // Click event
    
    // ---------------------------------
            // Call the microservice and get the data
    function loadJson() {
        // alert("id: " + id); // Use for debugging
        request.open('GET', 'apiMultGet.php');
        request.onload=loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        var myReturn = "<div>";

        myResponse = request.responseText;
        console.log(request);
        //alert("A: " + myResponse); // Use for debugging
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // alert(myData);
        console.log("My Data:", myData);
        console.log(myData[0])
        // Loop through each json record and create the HTML
            myReturn += '<div class="imgContainer"><div class="img"><img src="' + myData[0].image.toString() + '" /></div></div><div class="productContainer"><div class="productRating">' +
                myData[0].rating + " stars | " +
                myData[0].rateCount + " Ratings</div><div class='productTitle'>" +
                myData[0].title + "</div><div class='productCategory'> Category: " +
                myData[0].category + "</div><div class='productDescription'> Description: " +
                myData[0].description + "</div><div class='productPrice'>$" +
                myData[0].price + "</div>";

        myReturn += "</div>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
    }

</script>

<?php
// Always close db connection
if ($myDbConn) {
    mysqli_close($myDbConn);
}

include_once "MyFooter.php";
?>

