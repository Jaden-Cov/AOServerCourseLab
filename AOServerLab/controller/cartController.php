<?php
session_start();

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = $_GET['action'];

if($action == "add") {
    $id = $_GET['id'];
    $_SESSION['cart'][] = $id;
}

if($action == "remove") {
    $id = $_GET['id'];
    $key = array_search($id, $_SESSION['cart']);
    if($key !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

header("Location: ../index.php");
?>