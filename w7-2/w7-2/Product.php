<?php
include_once "Header.php";
?>

<body>
    <div class="imgContainer">
        <div class="img">
            <img src="{img_link}" />
        </div>
    </div>
    <div class="productContainer">
        <div class="productRating">
            {5} stars
        </div>
        <div class="productTitle">
            {Product Name}
        </div>
        <div class="productManufacturer">
            Manufactured by: {product manufacturer}
        </div>
        <div class="productDescription">
            Product description should go here. this can eb as lengthy or as short as we would like it
        </div>
        <div class="productPrice">
            $[Price] (can be dynamic and change)
        </div>
        <div class="productOptions">
            "for i in product.options"
                (make a new div called product options, and populate it with this)
                <div class="productOption">
                    Size: 
                        "for i in product.[option]
                            <div class="option">[productOptions]</div>"
                </div>
        </div>
        <div class="chosenOptions">
            "for i in product.options"
                (make a new div called product options, and populate it with this)
            <div class="productOption">
                Size:
                        "for i in product.[option]
                            if product.[option].isSelected
                                <div class="option">[productOptions]</div>"
                        (if theres a better way to do this, im down.)
            </div>
        </div>
        <div class="shippingOptions">

            [change this to radio buttons or something else, if possible]
            [Alternatively, we can change this to be an option during checkout]
            <div class="shippingOption">
                Ship for 12.99
            </div>
            <div class="shippingOption">
                Free Shipping
            </div>
        </div>
        <div class="buttonOptions">
            <button class="toCart">Add to Cart</button>
            <button class="toList">Add to Lists</button>
        </div>
    </div>
</body>