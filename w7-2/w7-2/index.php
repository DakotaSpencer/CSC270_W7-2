<?php
include_once "Header.php";
?>

<<<<<<< Updated upstream



=======

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
        console.log(myData[myData])
        // Loop through each json record and create the HTML
        for (index in myData) {
            myReturn += '<div class="imgContainer"><div class="img"><img src="' + myData[index].image.toString() + '" /></div></div><div class="productContainer"><div class="productRating">' +
                myData[index].rating + " stars | " +
                myData[index].rateCount + " Ratings</div><div class='productTitle'>" +
                myData[index].title + "</div><div class='productCategory'> Category: " +
                myData[index].category + "</div><div class='productDescription'> Description: " +
                myData[index].description + "</div><div class='productPrice'>$" +
                myData[index].price + "</div>";
            myReturn += "</div>";
        }
        
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
    }

</script>

>>>>>>> Stashed changes
<?php
// Always close db connection
if ($myDbConn) {
    mysqli_close($myDbConn);
}

include_once "Footer.php";
?>

