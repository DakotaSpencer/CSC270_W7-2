<?php
include_once "Header.php";
?>

<?php
$myVar = "food";
?>
<?php

$id = strval($_GET['productId']);
echo '<p type="text" id="productId" style="visibility:hidden;">' . $id . '</p>';
?>
<p id="A"></p>
<p id="jsonData"></p>
<div class='buttonOptions'>
    <button class='toCart' onclick="myClickEvent()">Add to Cart</button><button class='toList'>Add to Lists</button>
</div>
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

    function myClickEvent() {
         // alert("my click"); // Use for debugging
        // alert("data: " + document.getElementById("dogId").value); // Use for debugging
            alert(document.getElementById("productId").innerHTML)
        addToCart(document.getElementById("productId").value);
    }
    // ---------------------------------

    function addToCart(id) {
        alert("id: " + id); // Use for debugging

        request.open('POST', 'apiAddQuery.php?productId=' + id);
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
include_once "MyFooter.php";
?>
