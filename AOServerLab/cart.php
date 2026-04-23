<?php
include "db.php";
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>

<h1>Shopping Cart</h1>

<?php
if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) == 0) {
    echo "<p>Your cart is empty.</p>";
} else {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr>";

    foreach ($_SESSION["cart"] as $id => $quantity) {
        $sql = "SELECT * FROM products WHERE Product_Id = $id";
        $result = $conn->query($sql);
        $product = $result->fetch_assoc();

        echo "<tr>";
        echo "<td>" . $product["Product_Name"] . "</td>";
        echo "<td>$" . $product["Product_Cost"] . "</td>";
        echo "<td>
                <form action='update_cart.php' method='post'>
                    <input type='hidden' name='id' value='$id'>
                    <input type='number' name='quantity' value='$quantity' min='1'>
                    <input type='submit' value='Update'>
                </form>
              </td>";
        echo "<td><a href='remove_from_cart.php?id=$id'>Remove</a></td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

<br>
<a href="index.php">Back to Catalog</a>

</body>
</html>