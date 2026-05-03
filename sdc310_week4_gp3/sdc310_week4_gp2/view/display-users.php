<?php
    require_once('../controller/userinfo_controller.php');
    $user_arr = get_users();
?>
<html>
    <head>
        <title>Week4 GP3 - Jaden Covington</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <h2>Current Users:</h2>
        <table>
            <tr style="font-size:large;">
                <th>User #</th>
                <th>Full Name</th>
                <th>E-Mail</th>
                <th>Favorite Number</th>
            </tr>

            <?php foreach($user_arr as $user): ?>
                <tr>
                    <td><?php echo $user["UserNo"]; ?></td>
                    <td><?php echo $user["Name"]; ?></td>
                    <td><?php echo $user["Email"]; ?></td>
                    <td><?php echo $user["FavNum"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="find_user.php">Find a User</a>
    </body>
</html>