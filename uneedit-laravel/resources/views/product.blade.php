<html>

<head>
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
</head>

<body>
    <x-header></x-header>
    <main>
        <h1>$product_name</h1>
        <div id="container-1">
            <div id="container-2" class="container">
                <img src="" alt="product">
                <p>
                    $description
                </p>
            </div>
            <div id="container-3" class="container">
                <div id="price-container">
                    <div id="price">$price</div>
                </div>
                <div id="stock-container">
                    <div id="stock">$stock</div>
                </div>
                <button>Winkelwagen</button>
            </div>
        </div>
    </main>
    <x-footer></x-footer>
</body>

</html>
