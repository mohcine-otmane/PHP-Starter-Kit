<?php

include "database.php";


$sql = "SELECT id,username, email FROM users";
$data = $conn->query($sql);

if ($data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        echo "<br>" . "id: " . $row["id"] . "<br>" . "Username: " . $row["username"] . "<br>" . "Email: " . $row["email"] . "<br>";
    }
} else {
    echo "NULL query";
}


$conn->close();
