<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNEED-IT - Producten</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <meta name="description" content="Your one-stop solution for all your IT needs.">
    <meta name="keywords" content="IT, repair, services, phones, laptops, PCs">
    <style>
        /* Container voor centreren */
        .center-container {
            display: flex;
            justify-content: center; /* Horizontaal centreren */
            align-items: center; /* Verticaal centreren */
            height: 80vh; /* Volledige hoogte van het scherm */
        }

        /* Basis CSS voor grid layout */
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; /* Centreert de items horizontaal binnen de grid */
            margin: 0 auto;
            width: 80%; /* Pas de breedte aan zodat het grid in het midden staat */
        }

        .row {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .product {
            flex: 1;
            min-width: 22%;
            max-width: 22%; /* Behoudt de breedte consistentie */
            background-color: #f5f5f5;
            padding: 10px;
            padding-bottom: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column; /* Zorgt ervoor dat de items gestapeld worden */
            align-items: center; /* Centreert de items horizontaal */
            position: relative; /* Voor positionering van tekst */
        }

        .product img {
            width: 100%; /* Zorg ervoor dat de afbeelding de volledige breedte van het product inneemt */
            height: auto; /* Houd de beeldverhouding consistent */
            object-fit: cover; /* Zorgt ervoor dat de afbeelding de container vult */
        }

        .product-info {
            bottom: 0;
            left: 0;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8); /* Transparante achtergrond voor leesbaarheid */
            width: 100%;
            text-align: left; /* Tekst links uitlijnen */
        }

        .product h3 {
            font-size: 1.2em;
            margin: 0;
        }

        .product p {
            margin: 5px 0 0 0;
        }
        
    </style>
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
    </div>
    <x-footer></x-footer>
</body>

</html>