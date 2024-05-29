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

    private function update($column_value_pairs, $where = [])
    {
        return $this->db->update("products", $column_value_pairs, $where);
    }

    private function read()
    {
    }

    private function inflate_price()
    {
    }
}
