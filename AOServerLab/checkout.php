<?php
session_start();

unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout Complete</title>
</head>
<body>

<h1>Order Complete</h1>

<p>Your cart has been cleared.</p>

<a href="index.php">Return to Catalog</a>

</body>
</html>