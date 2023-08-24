<?php
include_once "MyHeader.php";
?>

<?php
$myVar = "food";
?>
<?php

$id = strval($_GET['productId']);
echo '<p type="text" id="productId" style="visibility:hidden;">'.$id.'</p>'
?>
<p id="A"></p>
<p id="jsonData"></p>
<script>
   var request = new XMLHttpRequest();

      window.onload = function() {
  getParams();
};
    // ---------------------------------
    // Click event
    function getParams() {
         // alert("my click"); // Use for debugging

        loadJson(document.getElementById("productId").innerHTML);
    }
    // ---------------------------------
            // Call the microservice and get the data
    function loadJson(id) {
        // alert("id: " + id); // Use for debugging
        request.open('GET', 'apiGetProductQuery.php?productId=' + id);
        request.onload=loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        var myReturn = "<div>";

        myResponse = request.responseText;
        //alert("A: " + myResponse); // Use for debugging
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // alert(myData);
        console.log("My Data:", myData);

        // Loop through each json record and create the HTML
        for (index in myData) {
            console.log(myData);
            myReturn += "<div class='imgContainer'><div class='img'><img src='" + myData[index].image + "' /></div></div><div class='productContainer'><div class='productRating'>" +
                myData[index].rating + " stars</div><div class='productRating'>" +
                myData[index].rateCount + " Ratings</div><div class='productTitle'>" +
                myData[index].title + "</div><div class='productCategory'>" +
                myData[index].category + "</div><div class='productDescription'>" +
                myData[index].description + "</div><div class='productPrice'>$" +
                myData[index].price + "</div><div class='buttonOptions'><button class='toCart'>Add to Cart</button><button class='toList'>Add to Lists</button></div>";

        }
        myReturn += "</div>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
    }


</script>

<?php
include_once "MyFooter.php";
?>
