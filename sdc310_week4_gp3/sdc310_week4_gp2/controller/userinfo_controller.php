<?php
    require_once('../model/userinfo_db.php');

    function get_users()
    {
        $user_rows = get_all_users();
        $users = array();

        if ($user_rows) {
            $index = 0;

            // if query was successful, fill the users array
            while ($row = mysqli_fetch_array($user_rows)) {
                $users[$index]['UserNo'] = $row['UserNo'];

                // Transform the name fields from the DB to "First Last" format
                $users[$index]['Name'] = $row['FirstName'] . " " . $row['LastName'];
                $users[$index]['Email'] = $row['Email'];
                $users[$index]['FavNum'] = $row['FavoriteNum'];

                $index++;
            }
        }

        return $users;
    }

    function get_user_name($user_no)
    {
        $user = get_user($user_no);

        if ($user && $user->num_rows === 1) {
            $user_info = mysqli_fetch_assoc($user);
            return $user_info['FirstName'] . " " . $user_info['LastName'];
        } else {
            return "No such user or multiple users found.";
        }
    }
?>