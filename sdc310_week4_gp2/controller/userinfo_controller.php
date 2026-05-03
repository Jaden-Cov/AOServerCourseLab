<?php
require_once('../model/userinfo_db.php');

function get_users()
{
    $user_rows = get_all_users();
    $users = array();

    if ($user_rows) {
        $index = 0;

        //Query for all users
        while($row = mysqli_fetch_array($user_rows)) {
            $users[$index]['UserNo'] = $row["UserNo"];

            //Transform the name fields from the DB to "First Last" format
            $users[$index]['Name'] = $row["FirstName"] . " " . $row["LastName"];
            $users[$index]['Email'] = $row["EMail"];
            $users[$index]['FavNum'] = $row["FavoriteNum"];
            $index++;
        }
    }

    return $users;
}
?>