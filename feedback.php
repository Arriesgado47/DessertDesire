<?php 
session_start(); 
if (!isset($_SESSION['user'])) { 
    header("Location: login.php"); 
    exit; 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Provide Feedback</h1>
    <form action="submit_feedback.php" method="POST">
        <label for="feedback">Your Feedback:</label>
        <textarea id="feedback" name="feedback" required></textarea>
        <button type="submit">Submit</button>
    </form>
</body>
</html>