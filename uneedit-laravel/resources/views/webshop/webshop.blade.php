<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNEED-IT - Webshop</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/webshop.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/webshop.js') }}"></script>
    <meta name="description" content="Your one-stop solution for all your IT needs.">
    <meta name="keywords" content="IT, repair, services, phones, laptops, PCs">
</head>

<body>
<x-webshop-header></x-webshop-header>

    <div class="center-container">
    <h1 class="webshop">Webshop</h1>
    <div id="product-grid" class="product-grid">
    @foreach ($products as $product)
    <div class="product">
        <a href="{{ url('/webshop/product/' . $product->id) }}" class="product-link">
            <img src="{{ asset('img/products/' . $product->picture) }}" alt="{{ $product->name }}">
            <div class="product-info">
                <h3>{{ $product->name }}</h3>
                <p>€{{ number_format($product->price, 2) }}</p>
            </div>
        </a>
    </div>
    @endforeach
    </div>
    
    <div class="load-more-container">
    <button id="previous" data-page="1" style="display:none;"><</button>
    <button id="load-more" data-page="2">></button>
</div>
</div>
    <x-footer></x-footer>
</body>
</html>

