<?php
use CommonMark\Node\Image;
include_once "Header.php";
include_once "Menu.php";
?>

<!--<p>&#x1F6D2;</p>-->
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
            <?php
            $product = ""; //Need to get the id from products page. products page => add to cart, product_id goes here.
            $url = 'https://fakestoreapi.com/products/1'; //${product_Id}';

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $response = json_decode($response);

            //image
            //name
            //price
            echo "
                <td>{$response}</td>
                <td>{$response}</td>
                <td>{$response}</td>
            ";
            curl_close($ch);
            ?>
            <td>&#x2716;</td>
        </tr>
    </table>
</div>

<?php
include_once "Footer.php";
?>