<?php
$PDO = DB::connection(env('DB_CONNECTION_UNEEDIT'))->getPdo();
include_once("app_path('Models/database.php");
include_once("app_path('Models/product.php");


$db = new Database($PDO);
$product = new Product($db);
echo json_encode($product->get_by_id(0));
echo json_encode($product->inflate_price(50));
$a = 0;
