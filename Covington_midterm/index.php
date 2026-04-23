<?php
// Author: Jaden Covington
// Date: April 21, 2026
// Purpose: Midterm Address CRUD Application

$servername = "localhost";
$username = "root";   
$password = "";
$dbname = "sdc310_midterm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
$editMode = false;
$editData = [
    "AddressNo" => "",
    "First" => "",
    "Last" => "",
    "Street" => "",
    "City" => "",
    "State" => "",
    "Zip" => ""
];

// ADD RECORD
if (isset($_POST['add'])) {
    $first = $_POST['First'];
    $last = $_POST['Last'];
    $street = $_POST['Street'];
    $city = $_POST['City'];
    $state = $_POST['State'];
    $zip = $_POST['Zip'];

    $sql = "INSERT INTO addresses (First, Last, Street, City, State, Zip)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $first, $last, $street, $city, $state, $zip);

    $stmt->execute();
    $stmt->close();
}

// DELETE RECORD
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM addresses WHERE AddressNo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// LOAD RECORD FOR EDIT
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $sql = "SELECT * FROM addresses WHERE AddressNo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultEdit = $stmt->get_result();
    if ($resultEdit->num_rows > 0) {
        $editData = $resultEdit->fetch_assoc();
        $editMode = true;
    }

    $stmt->close();
}

// UPDATE RECORD
if (isset($_POST['update'])) {
    $id = $_POST['AddressNo'];
    $first = $_POST['First'];
    $last = $_POST['Last'];
    $street = $_POST['Street'];
    $city = $_POST['City'];
    $state = $_POST['State'];
    $zip = $_POST['Zip'];

    $sql = "UPDATE addresses
            SET First=?, Last=?, Street=?, City=?, State=?, Zip=?
            WHERE AddressNo=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $first, $last, $street, $city, $state, $zip, $id);

    $stmt->execute();
    $stmt->close();
}

// GET ALL RECORDS
$sql = "SELECT * FROM addresses";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jaden Covington Midterm</title>

    <style>
        body {
            font-family: Arial;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        input {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<h2>Address List</h2>

<table>
    <tr>
        <th>Address #</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Street Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip Code</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?php echo $row['AddressNo']; ?></td>
            <td><?php echo $row['First']; ?></td>
            <td><?php echo $row['Last']; ?></td>
            <td><?php echo $row['Street']; ?></td>
            <td><?php echo $row['City']; ?></td>
            <td><?php echo $row['State']; ?></td>
            <td><?php echo $row['Zip']; ?></td>
            <td>
                <a href="?edit=<?php echo $row['AddressNo']; ?>">Edit</a>
                |
                <a href="?delete=<?php echo $row['AddressNo']; ?>">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<br>

<h3><?php echo $editMode ? "Update Address" : "Add Address"; ?></h3>

<form method="post">

    <input type="hidden" name="AddressNo" value="<?php echo $editData['AddressNo']; ?>">

    Enter your first name:<br>
    <input type="text" name="First" value="<?php echo $editData['First']; ?>"><br>

    Enter your last name:<br>
    <input type="text" name="Last" value="<?php echo $editData['Last']; ?>"><br>

    Enter your street address:<br>
    <input type="text" name="Street" value="<?php echo $editData['Street']; ?>"><br>

    Enter your city:<br>
    <input type="text" name="City" value="<?php echo $editData['City']; ?>"><br>

    Enter your state:<br>
    <input type="text" name="State" maxlength="2" value="<?php echo $editData['State']; ?>"><br>

    Enter your zip code:<br>
    <input type="text" name="Zip" value="<?php echo $editData['Zip']; ?>"><br>

    <?php if ($editMode): ?>
        <input type="submit" name="update" value="Update User">
    <?php else: ?>
        <input type="submit" name="add" value="Add User">
    <?php endif; ?>

</form>

</body>
</html>

<?php
$conn->close();
?>