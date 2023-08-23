<?php
include_once "Header.php";
?>

Search for a User
<input type="text" id="searchVal" value="" placeholder="Enter a username" />
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
    function loadJson(val) {
        // alert("id: " + id); // Use for debugging
        request.open('GET', 'Search.php?searchTerm=' + val);
        request.onload=loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        var myReturn = "<table><tr><td>First_Name&nbsp;  &nbsp; </td><td>Last_Name &nbsp;  &nbsp; </td><td>UserId &nbsp;  &nbsp; </td><td>Username &nbsp; &nbsp; </td><td>Paswd &nbsp;   &nbsp; </td><td>IsAdmin &nbsp;  &nbsp; </td><td>IsActive &nbsp;  &nbsp; </td></tr>";

        myResponse = request.responseText;

        console.log(myResponse);

        if (myResponse[0].Title) {
            myData = JSON.parse(myResponse);

            // alert(myData);

            // Loop through each json record and create the HTML
            
            for (index in myData) {
                myReturn += "<tr><td>" + myData[index].First_Name + "</td><td>" +
                    myData[index].Last_Name + "</td><td>" +
                    myData[index].UserId + "</td><td>" +
                    myData[index].Username + "</td><td>" +
                    myData[index].Paswd + "</td></tr>" +
                    myData[index].IsAdmin + "</td></tr>";
                    myData[index].IsActive + "</td></tr>";

            }
            myReturn += "</table>";
            document.getElementById("jsonData").innerHTML = myReturn; // Display table
        } else {
            myReturn = "No Users Found";
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

include_once "Footer.php";
?>
