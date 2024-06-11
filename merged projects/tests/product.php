<?php
include_once("../database.php");
include_once("../classes/database.php");
include_once("../classes/product.php");


$db = new Database($PDO);
$product = new Product($db);
echo json_encode($product->get_by_id(0));
echo json_encode($product->inflate_price(50));
$a = 0;
