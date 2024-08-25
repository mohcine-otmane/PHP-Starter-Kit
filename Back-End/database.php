<!-- This peice of code connects establishes a connection to a database using MySQLi -->

<?php
$servername = "localhost";
$admin = "root";
$password = "";
$database = "login";

$conn = new mysqli($servername, $admin, $password, $database);

if ($conn->connect_error) {
    die("Connection error:" . $conn->connect_error);
}
echo "Connected";
