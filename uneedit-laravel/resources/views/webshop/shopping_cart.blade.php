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

            <!-- Display the products in the cart -->
            @if($productsInCart->isNotEmpty())
                @foreach($productsInCart as $junction)
                    <div class="product">
                        <div>
                            <!-- Use the product relationship to access details -->
                            <img src="{{ asset($junction->product->picture) }}" alt="Product image">
                            <p>{{ $junction->product->name }}</p>
                            <p>Price: ${{ number_format($junction->product->price, 2) }}</p>
                            <p>Quantity: {{ $junction->quantity }}</p>
                        </div>
                        <div>
                            <!-- Remove Button -->
                            <form action="{{ route('remove', $junction->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="button">Remove</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                @else
                    <p class="cart-empty-text">Your cart is empty!</p>
                @endif
            </div>

        <div class="checkout">
            <div class="title">
                <h2>Overview</h2>
            </div>

            <div class="summary">
                <!-- Display total price and product count -->
                <div class="product-summary">
                    <p>Items: {{ $productsInCart->count() }}</p>
                </div>

                <div class="price-summary">
                <p>Total Price: 
                        ${{ number_format($productsInCart->sum(fn($junction) => $junction->product->price * $junction->quantity), 2) }}
                    </p>
                </div>

                <!-- Checkout button -->
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="button">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>
