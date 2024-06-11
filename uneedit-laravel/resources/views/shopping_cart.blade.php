<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
</head>
<body>
    <x-header></x-header>
    <main>
        <h1>Shopping Cart</h1>
            <img src="" alt="Product">
            <p>$prijs</p>
            <label for="quantity">Quantity</label>
            <input type="number" min="1" max="10">
            <button>Trash, discard</button>
            <p>$overview</p>
            <p>$pay_product</p>
            <button>buy</button>
    </main>
    <x-footer></x-footer>
</body>
</html>