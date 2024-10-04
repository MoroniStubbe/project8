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
        <x-form-table id="form_1" :tableData="$table_data" :action="$action" />
        <x-form-table id="form_2" :tableData="$table_data" :action="$action" />
    </main>
</body>

</html>