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

<h3>Signup</h3>

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
    <input type="submit" value="Sign Up" />
</form>

<p>
    <a href="Login.php">Already registered? Click Here</a>
</p>

<br />
<br />


<?php
include_once "MyHeader.php";
?>

