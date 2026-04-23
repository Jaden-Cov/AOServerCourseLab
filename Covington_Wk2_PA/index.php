<?php
$name = "";
$dob = "";
$color = "";
$place = "";
$nickname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? "";
    $dob = $_POST["dob"] ?? "";
    $color = $_POST["color"] ?? "";
    $place = $_POST["place"] ?? "";
    $nickname = $_POST["nickname"] ?? "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jaden Covington Wk 2 Performance Assessment</title>
</head>
<body>

<h1>Jaden Covington Wk 2 Performance Assessment</h1>

<form method="post">
    <label>Enter your name:</label>
    <input type="text" name="name"><br><br>

    <label>Enter your birthdate:</label>
    <input type="text" name="dob"><br><br>

    <label>Enter your favorite color:</label>
    <input type="text" name="color"><br><br>

    <label>Enter your favorite place to visit:</label>
    <input type="text" name="place"><br><br>

    <label>Enter your nickname:</label>
    <input type="text" name="nickname"><br><br>

    <input type="submit" value="Submit Values">
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<p>This is my echo statement.</p>";

    if (!empty($name)) {
        echo "<p>The name you entered is: $name</p>";
    } else {
        echo "<p>You didn't enter your name!</p>";
    }

    if (!empty($dob)) {
        echo "<p>The birthdate you gave is: $dob</p>";
    } else {
        echo "<p>You didn't enter your birthdate!</p>";
    }

    if (!empty($color)) {
        echo "<p>You said your favorite color is: $color</p>";
    } else {
        echo "<p>You didn't enter your favorite color!</p>";
    }

    if (!empty($place)) {
        echo "<p>You said your favorite place is: $place</p>";
    } else {
        echo "<p>You didn't enter your favorite place!</p>";
    }

    if (!empty($nickname)) {
        echo "<p>You said your nickname is: $nickname</p>";
    } else {
        echo "<p>You didn't enter your nickname!</p>";
    }
}
?>

</body>
</html>