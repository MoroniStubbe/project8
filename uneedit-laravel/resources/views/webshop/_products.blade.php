@foreach ($products as $product)
    <div class="product">
        <img src="{{ asset('img/products/' . $product->picture) }}" alt="{{ $product->name }}">
        <div class="product-info">
            <h3>{{ $product->name }}</h3>
            <p>€{{ number_format($product->price, 2) }}</p>
        </div>
    </div>
@endforeach

