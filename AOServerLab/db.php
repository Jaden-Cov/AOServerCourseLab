<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "sdc310_proj_covington";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>