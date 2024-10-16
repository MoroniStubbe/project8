<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNEED-IT - Webshop</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/webshop.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="description" content="Your one-stop solution for all your IT needs.">
    <meta name="keywords" content="IT, repair, services, phones, laptops, PCs">
</head>

<body>
    <x-header></x-header>

    <div class="center-container">
        <h1 class="webshop">Webshop</h1>
        <section class="product-grid" id="product-grid">
            @include('webshop._products', ['products' => $products])
        </section>
        <button id="load-more" class="load-more-btn">Load More Products</button>
    </div>

    <x-footer></x-footer>

    <script>
        let page = 1;
        const loadMoreBtn = document.getElementById('load-more');

        loadMoreBtn?.addEventListener('click', function() {
            page++;
            loadMoreBtn.disabled = true; // Disable the button while loading

            fetch(`/webshop?page=${page}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(html => {
                    const productGrid = document.getElementById('product-grid');
                    const newProducts = document.createElement('div');
                    newProducts.innerHTML = html;

                    // Slide effect
                    newProducts.style.display = 'none';
                    productGrid.appendChild(newProducts);
                    $(newProducts).slideDown(500); // jQuery sliding effect

                    loadMoreBtn.disabled = false; // Enable the button again

                    // Hide button if no more products
                    if (!html.trim()) {
                        loadMoreBtn.style.display = 'none';
                    }
                })
                .catch(error => {
                    console.error('Error loading more products:', error);
                    loadMoreBtn.disabled = false; // Enable the button again on error
                });
        });
    </script>
</body>

</html>