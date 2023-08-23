<?php
$linkTO = [
    "Home" => "index.php",
    "Categories" => "Categories.php",
    "About" => "About.php",
    "Preferences" => "Preferences.php",
    "Cart" => "Cart.php",
    "Login" => "Login.php",
    "Signup" => "SignUp.php"
]
?>
<?php

echo '
<div class="dropdown">
    <button class="dropbtn">
        <a href="' . $linkTO["Home"] . '" name="Index">Home</a>
    </button>
</div>

<div class="dropdown">
    <button class="dropbtn">
        <a href="' . $linkTO["Categories"] . '" name="Categories">Categories</a>
    </button>
</div>

<div class="dropdown">
    <button class="dropbtn">
        <a href="' . $linkTO["Preferences"] . '" name="Preferences">Preferences</a>
    </button>
</div>


<div class="dropdown">
    <button class="dropbtn">About</button>
    <div class="dropdown-content">
        <a href="' . $linkTO["About"] . '?section=location" name="Locations">Locations</a>
        <a href="' . $linkTO["About"] . '?section=contact" name="EmailUs">Email Us</a>
    </div>
</div>

<div class="dropdown">
    <button class="dropbtn">
        <a href="Cart.php" name="Cart">Cart</a>
    </button>
</div>

';
if ($_SESSION["isAdmin"] == 1) {
    echo '
    <div class="dropdown">
        <button class="dropbtn">
          <a href="' . $linkTO["ManageUsers"] . '" name="ManageUsers">Manage Users</a>
        </button>
    </div>
    ';
} else {
    echo '<div class="dropdown">
    <button class="dropbtn">
        <a href="' . $linkTO["Login"] . '" name="Login">Login</a>
    </button>
</div>
<div class="dropdown">
    <button class="dropbtn">
        <a href="' . $linkTO["SignUp"] . '" name="Signup">Sign Up</a>
    </button>
</div>';
}
?>
