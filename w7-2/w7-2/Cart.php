<?php
require "dbConnector.php";
include_once "Header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $id = strval($_GET['productId']);

    // Create the database connection
    $dbConn = ConmnGet();

    // Call the Read function to fetch the JSON data.
    $jsonData = GetProductFromCart($dbConn, $id);

    // Check if the data was retrieved successfully.
    if ($jsonData) {
        // Fetch the JSON object from the result set.
        $row = mysqli_fetch_assoc($jsonData);

        // Decode the JSON data into an associative array.
        $productInfo = json_decode($row['Json1'], true);

        // Check if the JSON was successfully decoded.
        if ($productInfo) {
        // Create a table to display all vehicle information
        echo '
            <div>
                <h2>Cart</h2>
                <table>
                    <tr>
                        <th>Image</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Delete</th>
                    </tr>
                    <tr>
                        <td>' . $productInfo["image"] . '</td>
                        <td>' . $productInfo["title"] . '</td>
                        <td>' . $productInfo["price"] . '</td>
                        <td>&#x2716;</td>
                    </tr>
                </table>
            </div>
        ';

    } else {
        echo "<h1>Failed to decode vehicle information. Please try again.</h1>";
    }
} else {
    echo "<h1>Failed to read vehicle. Please try again.</h1>";
}

// Close the database connection
mysqli_close($dbConn);

include_once "Footer.php";
?>