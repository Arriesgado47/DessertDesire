<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a simple users array or database
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simulating user authentication (you can replace this with a database check)
    if ($username === 'testuser' && $password === 'testpass') {
        // Set session variable upon successful login
        $_SESSION['user'] = $username;
        header('Location: index.php'); // Redirect to index.php after successful login
        exit;
    } else {
        $error = "Invalid credentials, please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Desert Desire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth-container">
        <h2>Login to Desert Desire</h2>
        <?php if (isset($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>
</body>
</html>
