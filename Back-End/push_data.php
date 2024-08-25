<!-- This code connects to the database and creates a table and write data in it -->

<?php

include "database.php";



// Create users table
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(20) NOT NULL,
email VARCHAR(50)
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table created";
} else {
    echo "Error: " . $conn->error;
}


// Insert data in users

$sql = "INSERT INTO users (username, email)
VALUES ('Mohcine', 'mohcine@yahoo.com')
";


if ($conn->query($sql) === TRUE) {
    echo "Records recorded!";
} else {
    echo "Error: " . $sql . "  " . $conn->error;
}



$conn->close();
