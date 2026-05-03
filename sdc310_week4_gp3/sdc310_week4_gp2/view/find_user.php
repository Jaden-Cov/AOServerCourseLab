<?php
    require_once('../controller/userinfo_controller.php');

    // set a user number we know doesn't exist
    $userNo = -1;
    $userName = "";

    if (isset($_POST['user_no'])) {
        $userNo = $_POST['user_no'];
        $userName = get_user_name($userNo);
    }
?>
<html>
<head>
    <title>Week4 GP3 - Jaden Covington</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h2>Find a User by User Number</h2>
    <form method="POST">
        <h3>User Number: <input type="text" name="user_no" /></h3>
        <input type="submit" value="Submit" />
    </form>

    <h3>User Found: <?php echo $userName; ?></h3>
    <br>
    <a href="display_users.php">Show All Users</a>
</body>
</html>