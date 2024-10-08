<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title>
        <link rel="stylesheet" href="{{ asset('css/global.css') }}">
        <link rel="stylesheet" href="{{ asset('css/shopping_cart.css') }}">
    </head>
<body>
<x-webshop-header></x-webshop-header>

<main>
    <div class="shopping-cart-container">
        <div class="shopping-cart">
            <div class="title">
                <h2>Shopping Cart</h2>
            </div>
            <div class="product">
                <div>
                    <img src="$product" alt="Product image">
                    <p>$product_price</p>
                </div>
                <div>
                    <label for="quantity">
                        <p>$update_quantity</p>
                        <input type="number" name="quantity" min="0" max="10" value="1">
                        <input class="button" type="submit" value="$delete">
                    </label>
                </div>
            </div>
        </div>

        <div class="checkout">
            <div class="title">
                <h2>Overview</h2>
            </div>
            <div class="summary">
                <div class="product-summary">
                    <p>Items:</p>
                    <p>$product_items</p>
                </div>
                <div class="price-summary">
                <p>Price:</p>
                <p>$total_price</p>
                </div>
                <input class="button" type="submit" value="$checkout">
            </div>
        </div>
    </div>
</main>
</body>
</html>