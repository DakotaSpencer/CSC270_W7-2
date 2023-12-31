<?php
session_start();
include_once "Header.php";

// Check if the user is logged in and is an admin
if (!isset($_SESSION["admin_id"]) || $_SESSION["is_admin"] !== 1) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userIdToDelete = $_POST["userdel"];

    // Delete user with the given userID
    $connection = ConnGet();
    $sql = "DELETE FROM users WHERE UserId = '$userIdToDelete';";
    if (mysqli_query($connection, $sql)) {
        $successMessage = "User deleted successfully.";
    } else {
        $errorMessage = "Error deleting user: " . mysqli_error($connection);
    }
}
?>

<h2>Admin Hub</h2>

<?php
if (isset($successMessage)) {
    echo "<p>$successMessage</p>";
}

if (isset($errorMessage)) {
    echo "<p style='color: red;'>$errorMessage</p>";
}
?>

<form method="post" action="">
    <label>User ID to Delete:</label>
    <input type="text" name="userdel" />
    <input type="submit" value="Delete User" class="navBar"/>
</form>

<!-- Button to go to the menu page -->
<form method="get" action="menu.php">
    <input type="submit" value="Go to Menu" class="navBar"/>
</form>

<?php
include_once "Footer.php";
?>