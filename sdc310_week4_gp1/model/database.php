<?php
function get_db_conn()
{
    //Connect to Database
    $hostname = "localhost";
    $username = "ecpi_user";
    $password = "Password1";
    $dbname = "sdc310_wk3gp";
    return mysqli_connect($hostname, $username, $password, $dbname);
}
?>