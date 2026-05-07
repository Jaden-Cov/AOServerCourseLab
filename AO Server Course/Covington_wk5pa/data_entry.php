<?php
// Jaden Covington
// 05/07/2026

session_start();

$name = "";
$dob = "";

if (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
}

if (isset($_SESSION['dob'])) {
    $dob = $_SESSION['dob'];
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];

    setcookie("name", $name, time() + 3600, "/");
    $_SESSION['dob'] = $dob;
}
?>

<html>
<head>
    <title>Jaden Covington Wk 5 Performance Assessment</title>
</head>

<body>

    <h2>Jaden Covington Wk 5 Performance Assessment</h2>

    <form method="POST">
        <p>
            Name:
            <input type="text" name="name" value="<?php echo $name; ?>">
        </p>

        <p>
            Date of Birth:
            <input type="text" name="dob" value="<?php echo $dob; ?>">
        </p>

        <input type="submit" name="submit" value="Submit">
    </form>

    <br>

    <a href="data_display.php">Go to Display Page</a>

</body>
</html>