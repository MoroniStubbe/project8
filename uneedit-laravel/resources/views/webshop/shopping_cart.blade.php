<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

                <!-- Loop through the cart session to display items -->
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        <div class="product">
                            <div>
                                <img src="/img/logo.png" alt="{{ $details['name'] }}">
                                <p>{{ $details['name'] }}</p>
                                <p>€{{ $details['price'] }}</p>
                            </div>
                            <div>
                                <label for="quantity">
                                    <p>Quantity: {{ $details['quantity'] }}</p>
                                </label>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="cart-empty-text">Your cart is empty.</p>
                @endif
            </div>

            <div class="checkout">
                <div class="title">
                    <h2>Overview</h2>
                </div>

                @if (session('cart'))
                    <div class="summary">
                        <div class="product-summary">
                            <p>Items: {{ count(session('cart')) }}</p>
                        </div>
                        <div class="price-summary">
                            @php $total = 0 @endphp
                            @foreach (session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                            @endforeach
                            <p>Total Price: €{{ $total }}</p>
                        </div>
                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            <input class="button" type="submit" value="Checkout">
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>
