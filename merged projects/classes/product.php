<?php

class Product
{
    private $db;
    public $id;
    public $name;
    public $description;
    public $image_url;
    public $price;
    public $stock;
    public $shopping_cart;
    public $category;

    function __construct($db)
    {
        $this->db = $db;
    }

    private function update()
    {
    }

    private function read()
    {
    }

    private function inflate_price()
    {
    }
}
