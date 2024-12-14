<?php
session_start();
$conn = new mysqli("localhost", "root", "", "desert_desire");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$action = $_POST['action'];
$email = $_POST['email'];
$password = $_POST['password'];

if ($action === 'login') {
    $sql = "SELECT password FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $email;
            header("Location: welcome.php");
            exit;
        } else {
            echo "Wrong credentials!";
        }
    } else {
        echo "User not found. Please register.";
    }
} elseif ($action === 'register') {
    $checkUser = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkUser);
    if ($result->num_rows > 0) {
        echo "User already exists. Please log in.";
    } else {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hash')";
        if ($conn->query($sql)) {
            header("Location: login.html");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
