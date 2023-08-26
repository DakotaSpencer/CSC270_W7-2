<?php
include_once "Header.php";
?>
<?php
$category = strval($_GET['category']);
echo '<p type="text" id="category" style="visibility:hidden;">'.$category.'</p>'
?>


<?php

//function search(){
//    $the_url = "https://fakestoreapi.com/products/category/jewelery";
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_URL, $the_url);
//$result = curl_exec($ch);
//curl_close($ch);

//$obj = json_decode($result);
//# echo $obj->results[0]->gender;
//echo "<table border=1>";
//foreach ($obj->results as $product) {
//    echo '<tr>';
//    echo '<td>' . $product->title . '</td>';
//    echo '<td>' . $product->price . '</td>';
//    echo '<td>' . $product->description . '</td>';
//    echo '<td>' . $product->image . '</td>';
//    echo '</tr>';
//}
//echo "</table>";
//}

?>
Search for products by category!
<input type="text" id="searchVal" value="" placeholder="Category" />
<button name="a" onclick="search()">Submit</button>
<script>
        var request = new XMLHttpRequest();
    function search() {
        var x = document.getElementById("searchVal").value;
        document.getElementById("demo").innerHTML = x;
        return fetch('https://fakestoreapi.com/products/category/' + x)
        .then(res=>res.json())
            .then(json => console.log(json))
        
    }
    // ---------------------------------
            // Call the microservice and get the data
    function loadJson() {
        // alert("id: " + id); // Use for debugging
        request.open(search());
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
                myData[0].price + "</div><div class='buttonOptions'><button class='toCart'>Add to Cart</button><button class='toList'>Add to Lists</button></div>";

        myReturn += "</div>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
    }

    
//     function getCityNameWeather(){
// var citySearchUrl = `http://api.openweathermap.org/data/2.5/forecast?q=${getCity}&appid=${APIKEY}&units=imperial`;
// return fetch(citySearchUrl)
//  .then((res) => res.json())
//  .catch((err) => console.log(err));
//} 
</script>
<div id="demo"></div>
<div id="demo2"></div>
<?php
include_once "Footer.php";
?>