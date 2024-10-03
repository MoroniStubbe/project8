<?php

use App\Models\Product;

?>

<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/admin_panel.css') }}">
</head>

<body>
    <x-admin_nav></x-admin_nav>
    <main>
        <x-form-table :data="Product::all()->toArray()" action="{{ route('admin-form-submit') }}">
    </main>
</body>

</html>