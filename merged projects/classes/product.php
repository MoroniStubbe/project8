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

    private function from_array($product)
    {
        if (isset($product["id"])) {
            $this->id = $product["id"];
        }
        if (isset($product["name"])) {
            $this->name = $product["name"];
        }
        if (isset($product["description"])) {
            $this->description = $product["description"];
        }
        if (isset($product["image_url"])) {
            $this->image_url = $product["image_url"];
        }
        if (isset($product["price"])) {
            $this->price = $product["price"];
        }
        if (isset($product["stock"])) {
            $this->stock = $product["stock"];
        }
        //TODO enable when shopping cart class exists
        // if (isset($product["shopping_cart_id"])) {
        //     $this->password_hash = new ShoppingCart($this->db, $product["shopping_cart_id"]);
        // }
        if (isset($product["category"])) {
            $this->category = $product["category"];
        }
    }

    private function read($columns = ["*"], $where = [])
    {
        $products = $this->db->read("products", $columns, $where);
    public function get_by_id($id)
    {
        $products = $this->read(where: ["id" => $id]);
        if (count($products) > 0) {
            $this->id = $id;
            $this->from_array($products[0]);
            return true;
        }
        return false;
    }

    private function inflate_price($price)
    {
        $this->price = $price;
        $this->update(["price" => $price], ["id" => $this->id]);
    }
}
