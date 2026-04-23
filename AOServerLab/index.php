<?php
include "db.php";
session_start();

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
</head>
<body>

<h1>Product Catalog</h1>

<table border="1" cellpadding="8">
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Cost</th>
        <th>Action</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["Product_Id"]; ?></td>
            <td><?php echo $row["Product_Name"]; ?></td>
            <td><?php echo $row["Product_Description"]; ?></td>
            <td>$<?php echo $row["Product_Cost"]; ?></td>
            <td>
                <a href="add_to_cart.php?id=<?php echo $row['Product_Id']; ?>">
                    Add to Cart
                </a>
            </td>
        </tr>
    <?php } ?>

</table>

<br>
<a href="cart.php">View Cart</a>

</body>
</html>