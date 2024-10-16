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

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if(empty($cart))
                <p class="cart-empty-text">Your cart is empty.</p>
            @else
                @foreach($cart as $id => $product)
                    <div class="product">
                        <div>
                            <img src="{{ asset($product['picture']) }}" alt="{{ $product['name'] }}">
                            <p>${{ $product['price'] }}</p>
                        </div>
                        <div>
                            <form action="{{ route('shopping_cart.remove', $id) }}" method="POST" class="quantity-form">
                                @csrf
                                <label for="quantity">
                                    <p>Quantity:</p>
                                    <input type="number" name="quantity" min="1" max="{{ $product['quantity'] }}" value="{{ $product['quantity'] }}">
                                    <input class="button" type="submit" value="Update">
                                </label>
                                <input class="button" type="submit" value="Remove" formaction="{{ route('shopping_cart.remove', $id) }}">
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="checkout">
            <div class="title">
                <h2>Overview</h2>
            </div>
            <div class="summary">
                <div class="product-summary">
                    <p>Items:</p>
                    <p>{{ !empty($cart) ? count($cart) : 0 }}</p> <!-- Count of unique items -->
                </div>
                <div class="price-summary">
                    <p>Total Price:</p>
                    <p>
                        ${{ number_format(!empty($cart) ? array_reduce($cart, function ($carry, $item) {
                            return $carry + ($item['price'] * $item['quantity']);
                        }, 0) : 0, 2) }}
                    </p>
                </div>
                <form action="{{ route('shopping_cart.order.create') }}" method="POST">
                    @csrf
                    <input class="button" type="submit" value="Checkout">
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>