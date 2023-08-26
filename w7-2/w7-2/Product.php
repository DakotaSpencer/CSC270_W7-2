<?php
include_once "Header.php";
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
        console.log(request);
        //alert("A: " + myResponse); // Use for debugging
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // alert(myData);
        console.log("My Data:", myData);
        console.log(myData[0])
        // Loop through each json record and create the HTML
            myReturn += '<table class="Container"> <tr><td><div><img src="' + myData[0].image.toString() + '" class="imgPic"/></div></td> <td><table class="product"> <tr><td><div>' +
                myData[0].title + " </div></td></tr> <tr><td><div>" +
                myData[0].rating + "  Stars |" +
                myData[0].rateCount + " Ratings</div></td></tr> <tr><td><div>Category: " +
                myData[0].category + "</div></td></tr> <tr><td><div>Description: " +
                myData[0].description + "</div></td></tr>  <tr><td><div>$" +
                myData[0].price + "</div></td></tr> </table> </td>";

        myReturn += " </tr> </table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
    }


</script>

<?php
include_once "MyFooter.php";
?>
<div class='buttonOptions'>
    <button class='toCart'>Add to Cart</button><button class='toList'>Add to Lists</button>
</div>
