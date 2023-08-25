<?php
include_once "Header.php";
?>
<?php
$category = strval($_GET['category']);
echo '<p type="text" id="category" style="visibility:hidden;">'.$category.'</p>'
?>


<?php

function search(){
    $the_url = "https://fakestoreapi.com/products/category/jewelery";
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $the_url);
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode($result);
# echo $obj->results[0]->gender;
echo "<table border=1>";
foreach ($obj->results as $product) {
    echo '<tr>';
    echo '<td>' . $product->title . '</td>';
    echo '<td>' . $product->price . '</td>';
    echo '<td>' . $product->description . '</td>';
    echo '<td>' . $product->image . '</td>';
    echo '</tr>';
}
echo "</table>";
}

?>
Search for products by category!
<input type="text" id="searchVal" value="" placeholder="Category" />
<button name="a" onclick="search()">Submit</button>
<?php
include_once "Footer.php";
?>