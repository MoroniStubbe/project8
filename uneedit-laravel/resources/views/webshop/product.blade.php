<html>

<head>
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
</head>

<body>
<x-webshop-header></x-webshop-header>
    <main>
    <h1>$product_name</h1>
        <div id="container-1">
            <div id="container-2" class="container">
                <img src="{{ asset('img/logo.png') }}" alt="product">
                <p>
                    $description
                </p>
            </div>
            <div id="container-3" class="container">
                <div id="price-stock-wrapper">
                  <div id="price-container">
                    <span>Prijs:</span> <div id="price">$price</div>
                 </div>
                  <div id="stock-container">
                    <span>Voorraad:</span> <div id="stock">$stock</div>
                 </div>
                </div>
             <button class="btn">Voeg toe aan winkelwagen</button>
            </div>
        </div>
    </main>
    
</body>

</html>
