<?php
include_once "Header.php";
?>

<?php



// Get given page
$myDbConn =  ConnGet();



?>
<p id="jsonData"></p>

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
                myReturn += '<table class="Container"> <tr><td><div><img src="' + myData[0].image.toString() + '" class="imgPic"/></div></td> <td><table class="productContainer"> <tr><td><div class="productTitle">' +
                myData[0].title + " </div></td></tr> <tr><td><div> <br/>" +
                myData[0].rating + "  Stars | " +
                myData[0].rateCount + " Ratings</div></td></tr> <tr><td><div>Category: " +
                myData[0].category + "</div></td></tr> <tr><td><div> <br/>Description: " +
                myData[0].description + "</div></td></tr><tr><td><div> <br/>Price: $" +
                myData[0].price + ".00</div></td></tr> </table> </td>";

        myReturn += " </tr> </table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
    }

</script>

<?php
// Always close db connection
if ($myDbConn) {
    mysqli_close($myDbConn);
}

include_once "Footer.php";
?>

