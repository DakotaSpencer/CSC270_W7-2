
<link rel="stylesheet" type="text/css" href="/Style.css"/>

<table>
    <tr>
        <td>
        <div>
            <img class="logo"src="Logo.png" />
        </div>  
        </td>
        <td>
        <div>
            <button class="navBar">
                <div>
                    <a href="Product.php">
                        Product
                    </a>
                </div>
                </button></div>
        </td>
        <td>
            <div>
            <button class="navBar">Nav Button2</button>
            </div>
        </td>
    </tr> 
</table>
<?php
session_start();
 if (isset($_SESSION["admin_id"]) && $_SESSION["is_admin"] === 1) {
        $username = $_SESSION["username"];
        echo "<br /> Welcome, $username (admin)! ";
    }
    // Check if the user is logged in
    else if (isset($_SESSION["user_id"])) {
        $username = $_SESSION["username"];
    echo "<br /> Welcome, $username ! ";
}
    // Echo if not logged in
    else {
        echo "<br /> Welcome, please log in ";
    }

?>
<?php
echo "This is Menu end";
?>