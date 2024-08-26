<?php

include "database.php";

function getUser($username, $password)
{
    $conn = openConnection();
    $sql = "SELECT id, username, email FROM users WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();
        return $user;
    }

    $stmt->close();
    $conn->close();
}
