<?php
    require_once('database.php');

    // Get all entries in the userinfo table
    function get_all_users()
    {
        // Query for all users
        $conn = get_db_conn();
        $query = "SELECT * FROM userinfo";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function get_user($user_no)
    {
        $conn = get_db_conn();
        $query = "SELECT * FROM userinfo WHERE UserNo=$user_no";
        return mysqli_query($conn, $query);
    }
?>