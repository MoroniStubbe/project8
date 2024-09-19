<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/add_user.css') }}">
</head>

<body>
    <x-admin_nav></x-admin_nav>
    <form action="{{ route('admin.add.product') }}" method="POST">
        @csrf
        <label for="type">Type:</label>
        <input type="text" name="type" value="{{ old('type') }}">
        <br>

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        <br>

        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}">
        <br>

        <label for="picture">Picture:</label>
        <input type="text" name="picture" value="{{ old('picture') }}">
        <br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="{{ old('stock') }}">
        <br>

        <label for="description">Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>
        <br>

        <label for="order_product_id">Order Product ID:</label>
        <input type="number" name="order_product_id" value="{{ old('order_product_id') }}">
        <br>

        <button type="submit">Submit</button>
    </form>
    <main>
    </main>
</body>

</html>