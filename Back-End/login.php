<?php
include "fetch_data.php";

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($user = getUser($username, $password)) {
        session_start();
        $_SESSION['user'] = $user;
        header("Location: profile.php");
        exit();
    } else {
        $error_message = "No user found. Please check your credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if ($error_message): ?>
                alert('<?php echo addslashes($error_message); ?>');
            <?php endif; ?>
        });
    </script>
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <!-- Replace old button styles with new class -->
            <input type="submit" value="Login" class="button button-primary">

        </form>
    </div>
</body>

</html>