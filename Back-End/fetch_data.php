<?php

include "database.php";

function getUsers()
{
    $conn = openConnection();
    $sql = "SELECT id,username, email FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($user = $result->fetch_assoc()) {
            var_dump($user);
        }
    } else {
        echo "Failed";
    }

    $stmt->close();
    $conn->close();
}

// getUsers();

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
    } else {
        echo "No user found.";
    }

    $stmt->close();
    $conn->close();
}

if ($user = getUser("mohcine", "1234")) {
    echo "Welcome: " . $user['username'];
}
