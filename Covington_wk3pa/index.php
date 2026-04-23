<?php
// Author: Jaden Covington
// Date: April 21, 2026
// Purpose: Week 3 Performance Assessment - CRUD web application

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdc310_wk3pa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
$editMode = false;
$editData = [
    "id" => "",
    "name" => "",
    "dob" => "",
    "favorite_color" => "",
    "favorite_place" => "",
    "nickname" => ""
];

// ADD NEW RECORD
if (isset($_POST['add'])) {
    $name = trim($_POST['name']);
    $dob = trim($_POST['dob']);
    $favorite_color = trim($_POST['favorite_color']);
    $favorite_place = trim($_POST['favorite_place']);
    $nickname = trim($_POST['nickname']);

    $sql = "INSERT INTO personal_info (name, dob, favorite_color, favorite_place, nickname)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $dob, $favorite_color, $favorite_place, $nickname);

    if ($stmt->execute()) {
        $message = "Record added successfully.";
    } else {
        $message = "Error adding record: " . $conn->error;
    }

    $stmt->close();
}

// DELETE RECORD
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    $sql = "DELETE FROM personal_info WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $message = "Record deleted successfully.";
    } else {
        $message = "Error deleting record: " . $conn->error;
    }

    $stmt->close();
}

// LOAD RECORD FOR EDITING
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);

    $sql = "SELECT * FROM personal_info WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $editData = $result->fetch_assoc();
        $editMode = true;
    }

    $stmt->close();
}

// UPDATE RECORD
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $name = trim($_POST['name']);
    $dob = trim($_POST['dob']);
    $favorite_color = trim($_POST['favorite_color']);
    $favorite_place = trim($_POST['favorite_place']);
    $nickname = trim($_POST['nickname']);

    $sql = "UPDATE personal_info
            SET name = ?, dob = ?, favorite_color = ?, favorite_place = ?, nickname = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $dob, $favorite_color, $favorite_place, $nickname, $id);

    if ($stmt->execute()) {
        $message = "Record updated successfully.";
    } else {
        $message = "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

// DISPLAY ALL RECORDS
$sql = "SELECT * FROM personal_info ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaden Covington Wk 3 Performance Assessment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f4f4;
        }

        h1, h2 {
            color: #333;
        }

        form {
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            width: 400px;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        input[type="submit"] {
            margin-top: 15px;
            padding: 10px 15px;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
        }

        table, th, td {
            border: 1px solid #999;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .message {
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <h1>Jaden Covington Wk 3 Performance Assessment</h1>

    <?php if (!empty($message)) : ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <h2><?php echo $editMode ? "Update Personal Information" : "Add Personal Information"; ?></h2>

    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($editData['id']); ?>">

        <label for="name">Name</label>
        <input type="text" name="name" id="name" required
               value="<?php echo htmlspecialchars($editData['name']); ?>">

        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" id="dob" required
               value="<?php echo htmlspecialchars($editData['dob']); ?>">

        <label for="favorite_color">Favorite Color</label>
        <input type="text" name="favorite_color" id="favorite_color" required
               value="<?php echo htmlspecialchars($editData['favorite_color']); ?>">

        <label for="favorite_place">Favorite Place To Visit</label>
        <input type="text" name="favorite_place" id="favorite_place" required
               value="<?php echo htmlspecialchars($editData['favorite_place']); ?>">

        <label for="nickname">Nickname</label>
        <input type="text" name="nickname" id="nickname" required
               value="<?php echo htmlspecialchars($editData['nickname']); ?>">

        <?php if ($editMode) : ?>
            <input type="submit" name="update" value="Update Record">
        <?php else : ?>
            <input type="submit" name="add" value="Add Record">
        <?php endif; ?>
    </form>

    <h2>Stored Personal Information</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Favorite Color</th>
            <th>Favorite Place To Visit</th>
            <th>Nickname</th>
            <th>Actions</th>
        </tr>

        <?php if ($result && $result->num_rows > 0) : ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['dob']); ?></td>
                    <td><?php echo htmlspecialchars($row['favorite_color']); ?></td>
                    <td><?php echo htmlspecialchars($row['favorite_place']); ?></td>
                    <td><?php echo htmlspecialchars($row['nickname']); ?></td>
                    <td>
                        <a href="?edit=<?php echo $row['id']; ?>">Edit</a>
                        <a href="?delete=<?php echo $row['id']; ?>"
                           onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <tr>
                <td colspan="7">No records found.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>

<?php
$conn->close();
?>