<?php
session_start();
include_once "MyHeader.php";
require "dbConnector.php";

//form post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //user and pass
    $username = $_POST["username"];
    $password = $_POST["password"];

    $connection = ConnGet(); //db conn

    // pull user based on inputted username for verification
    $sql = "SELECT * FROM Users WHERE UserId = '$username'";
    $result = mysqli_query($connection, $sql); //execute the query and put it in $result

    //If the result returns that specific row, Form data matched with db and login was successful
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc(); // grab user data and store in array
        //Check if password matches
        if  ($user["isActive"] == 1 && $user["isAdmin"] == 1 && $password === $user["Pswd"]) {
            //Set Session ID
            $_SESSION["admin_id"] = $user["id"];
            $_SESSION["username"] = $user["UserId"]; // Give the admin a session name
            $_SESSION["is_admin"] = 1; // set as admin

            header("Location: menu.php"); // Bring User to Home Page with session
            exit();
            //Error Handeling
        } else {
            $error = " account is inactive.";
        }
    } else {
        $error = "Invalid credentials ";
    }

    $connection->close();
}
?>

?>

<h3>Admin Login</h3>

<form method="post" action="">
    <label>Username:</label><br />
    <input name="username" type="text" value="" /><br />
    <label>Password:</label><br />
    <input name="password" type="text" value="" /><br />
    <input type="submit" />
</form>

<p>
    <a href="Login.php">Not Admin? Click Here</a>
</p>


<br />
<br />
You do not need to "wire-up" a database. 
<br />
You could have two buttons that change the session value for an admin/user

<?php
include_once "MyHeader.php";
?>

