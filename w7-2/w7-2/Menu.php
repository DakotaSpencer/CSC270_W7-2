
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
                    <a href="index.php" class="navButton">
                        Home
                    </a>
                </div>
                </button>
            </div>
        </td>
        <td>
        <div>
            <button class="navBar">
                <div>
                    <a href="Product.php?productId=2" class="navButton">
                        Product
                    </a>
                </div>
            </button></div>
        </td>
        <td>
            <div>
                <button class="navBar">
                    <div>
                        <a href="Categories.php" class="navButton">
                            Categories
                        </a>
                    </div>
                </button>
            </div>
        </td>
        <td>
            <div>
                <button class="navBar">
                    <div>
                        <a href="Cart.php" class="navButton">
                            Cart
                        </a>
                    </div>
                </button>
            </div>
        </td>
        <td>
            <div>
                <button class="navBar">
                    <div>
                        <a href="AdminLogin.php" class="navButton">
                            Log in
                        </a>
                    </div>
                </button>
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
?>