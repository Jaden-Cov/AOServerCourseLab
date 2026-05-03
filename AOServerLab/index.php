<?php
session_start();

require_once __DIR__ . "/models/Product.php";

$result = Product::getAllProducts();

include __DIR__ . "/views/catalog.php";
?>