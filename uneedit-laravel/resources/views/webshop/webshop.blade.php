<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNEED-IT - Producten</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/webshop.css') }}">
    <meta name="description" content="Your one-stop solution for all your IT needs.">
    <meta name="keywords" content="IT, repair, services, phones, laptops, PCs">
</head>
<body>
    <x-header></x-header>
    <div class="center-container">
        <section class="product-grid">
            <h1 class="webshop">Webshop</h1>
            <div class="row">
                <!-- Eerste rij met 4 producten -->
                <div class="product">
                    <img src="{{ asset('img/logo.png') }}" alt="product">
                    <div class="product-info">
                        <h3>$Product</h3>
                        <p>$price</p>
                    </div>
                </div>
                <div class="product">
                    <img src="{{ asset('img/logo.png') }}" alt="product">
                    <div class="product-info">
                        <h3>$Product</h3>
                        <p>$price</p>
                    </div>
                </div>
                <div class="product">
                    <img src="{{ asset('img/logo.png') }}" alt="product">
                    <div class="product-info">
                        <h3>$Product</h3>
                        <p>$price</p>
                    </div>
                </div>
                <div class="product">
                    <img src="{{ asset('img/logo.png') }}" alt="product">
                    <div class="product-info">
                        <h3>$Product</h3>
                        <p>$price</p>
                    </div>
                </div>
            </div>
                 <div class="row">
                <!-- Tweede rij met 4 producten -->
                <div class="product">
                    <img src="{{ asset('img/logo.png') }}" alt="product">
                    <div class="product-info">
                        <h3>$Product</h3>
                        <p>$price</p>
                    </div>
                </div>
                <div class="product">
                    <img src="{{ asset('img/logo.png') }}" alt="product">
                    <div class="product-info">
                        <h3>$Product</h3>
                        <p>$price</p>
                    </div>
                </div>
                <div class="product">
                    <img src="{{ asset('img/logo.png') }}" alt="product">
                    <div class="product-info">
                        <h3>$Product</h3>
                        <p>$price</p>
                    </div>
                </div>
                <div class="product">
                    <img src="{{ asset('img/logo.png') }}" alt="product">
                    <div class="product-info">
                        <h3>$Product</h3>
                        <p>$price</p>
                    </div>
                </div>
            </div>
        </section>
        <button class="more-products">></button>
    </div>
    <x-footer></x-footer>
</body>

</html>