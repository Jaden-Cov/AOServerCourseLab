<?php
// Jaden Covington
// 05/07/2026

session_start();

$name = "No name stored";
$dob = "No date of birth stored";

if (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
}

if (isset($_SESSION['dob'])) {
    $dob = $_SESSION['dob'];
}
?>

<html>
<head>
    <title>Jaden Covington Wk 5 Performance Assessment</title>
</head>

<body>

    <h2>Jaden Covington Wk 5 Performance Assessment</h2>

    <p>Name stored in cookie: <?php echo $name; ?></p>

    <p>Date of Birth stored in session: <?php echo $dob; ?></p>

    <br>

    <a href="data_entry.php">Back to Data Entry Page</a>

</body>
</html>