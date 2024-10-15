<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;

?>

<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/admin_panel.css') }}">
</head>

<body>
    <x-admin_nav></x-admin_nav>
    <main>
        <x-form-table
            id="form-1"
            :tableData="$table_data"
            create_URL="{{ url('/admin/add_product/create/') }}"
            update_URL="{{ url('/admin/add_product/update/') }}"
            destroy_URL="{{ url('/admin/add_product/destroy/') }}" />
    </main>
</body>

</html>