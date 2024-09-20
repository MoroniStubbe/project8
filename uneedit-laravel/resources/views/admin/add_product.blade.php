<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/admin_panel.css') }}">
</head>

<body>
    <x-admin_nav></x-admin_nav>
    <main>
        <form action="{{ route('admin.add.product') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <td>
                        <label for="type">Type</label>
                    </td>
                    <td>
                        <input type="text" name="type" value="{{ old('type') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="name">Name</label>
                    </td>
                    <td>
                        <input type="text" name="name" value="{{ old('name') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="price">Price</label>
                    </td>
                    <td>
                        <input type="number" step="0.01" name="price" value="{{ old('price') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="picture">Picture</label>
                    </td>
                    <td>
                        <input type="text" name="picture" value="{{ old('picture') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="stock">Stock</label>
                    </td>
                    <td>
                        <input type="number" name="stock" value="{{ old('stock') }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Description</label>
                    </td>
                    <td>
                        <textarea name="description">{{ old('description') }}</textarea>
                    </td>
                </tr>
            </table>
            <button type="submit">Submit</button>
        </form>
    </main>
</body>

</html>