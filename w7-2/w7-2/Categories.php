<?php
include_once "Header.php";
?>
$genre = strval($_GET['category']);
echo '<p type="text" id="category" style="visibility:hidden;">'.$category.'</p>'
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

        loadJson(document.getElementById("category").innerHTML);
    }
    // ---------------------------------
            // Call the microservice and get the data
    function loadJson(genre) {
        // alert("id: " + id); // Use for debugging
        request.open('GET', 'apiCategoryQuery.php?category=' + category);
        request.onload=loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        var myReturn = "<table><tr><td>Title &nbsp; &nbsp; </td><td>Description &nbsp; &nbsp; </td><td>Genre &nbsp;  &nbsp; </td><td>Rating &nbsp;  &nbsp; </td><td>Release Year &nbsp;  &nbsp; </td></tr>";

        myResponse = request.responseText;
        //alert("A: " + myResponse); // Use for debugging
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // alert(myData);
        console.log("My Data:", myData);

        // Loop through each json record and create the HTML
        for (index in myData) {
            myReturn += "<tr><td>" + myData[index].Title + "</td><td>" +
                myData[index].MovieDescription + "</td><td>" +
                myData[index].Genre + "</td><td>" +
                myData[index].Rating + "</td><td>" +
                myData[index].ReleaseYear + "</td></tr>";

        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
    }


</script>
<?php
include_once "Footer.php";
?>