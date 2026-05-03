<?php
require_once('../controller/userinfo_controller.php');
$user_arr = get_users();
?>

<style>
table {
    border-spacing: 5px;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: center;
}
th {
    background-color: lightskyblue;
}
tr:nth-child(even) {
    background-color: whitesmoke;
}
tr:nth-child(odd) {
    background-color: lightgray;
}
</style>

<html>
<head>
    <title>Week4 GP2 - Jaden Covington</title>
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
</body>
</html>