<?php

include "database.php";




function getUsers()
{
    $conn = openConnection();
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
}

function getUser($username, $email)
{
    $conn = openConnection();
    $sql = "SELECT id, username, email FROM users WHERE username=? AND email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $email);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user data
        $user = $result->fetch_assoc();
        var_dump($user);
    } else {
        echo "No user found.";
    }

    $stmt->close();
    $conn->close();
}

getUser("mohcine", "mohcine@yahoo.com");
