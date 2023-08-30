<?php
session_start(); //start session and keep data
include_once "MyHeader.php";
require_once "dbConnector.php";

//Form data post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    //db connection
    $connection = ConnGet();

    // Insert from data into the user table in the db
    $sql = "INSERT INTO Users (First_Name, Last_Name, UserId, Pswd, isAdmin, isActive)
            VALUES ('$fName', '$lName', '$username', '$password', 0, 1)";
    //Check if the query worked successfully 
    if (mysqli_query($connection, $sql) === TRUE) {
        // redirect to login on signup
        header("Location: Login.php");
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
?>
<link rel="stylesheet" type="text/css" href="/Style.css" />
<table>
    <tr>
        <td>
            <img class="logo" src="Logo.png" />
        </td>
        <td>
            <h3>Sign Up</h3>
        </td>
    </tr>

</table>


<form method="post" action="">
    <label>First Name:</label>
    <br />
    <input name="fName" type="text" value="" />
    <br />
    <label>Last Name:</label>
    <br />
    <input name="lName" type="text" value="" />
    <br />
    <label>Username:</label>
    <br />
    <input name="username" type="text" value="" />
    <br />
    <label>Password:</label>
    <br />
    <input name="password" type="text" value="" />
    <br />  
    <input  class="navBar" type="submit" value="Sign Up" />
    
</form>

<p>
    <button class="navBar">
        <div>
            <a href="Login.php" class="navButton">Already registered? Click Here</a>
        </div>
    </button>
</p>




<br />
<br />


<?php
include_once "MyHeader.php";
?>

