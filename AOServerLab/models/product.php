<?php
require_once __DIR__ . "/../db.php";

class Product {
    public static function getAllProducts() {
        global $conn;

        $sql = "SELECT * FROM products";
        return $conn->query($sql);
    }
}
?>