<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];

// Logout script
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($user['username']); ?>'s Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="profile-container">
        <h1><?php echo htmlspecialchars($user['username']); ?>'s Profile</h1>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <p>User ID: <?php echo htmlspecialchars($user['id']); ?></p>
        <!-- Add logout button with the new class -->
        <form action="logout.php" method="post">
            <button type="submit" class="button button-danger">Logout</button>
        </form>

    </div>
</body>

</html>