<?php
session_start();

// Check if the form is submitted and the required fields are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['comment'])) {
    // Get the form data and sanitize it
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars($_POST['comment']);

    // Database connection (make sure the database exists)
    $conn = new mysqli("localhost", "root", "", "desert_desire");

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the comment into the database
    $sql = "INSERT INTO comments (name, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $comment);

    if ($stmt->execute()) {
        echo "<script>alert('Thank you for your comment!'); window.location.href = 'comment.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}

// Fetch comments from the database
$conn = new mysqli("localhost", "root", "", "desert_desire");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch comments from the database
$sql = "SELECT * FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave a Comment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="comment-container">
        <h2>Leave a Comment</h2>
        <form action="comment.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>

    <div class="comments-section">
        <h3>Previous Comments</h3>
        <?php
        // Display comments
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='comment'>";
                echo "<p><strong>" . htmlspecialchars($row['name']) . "</strong> said:</p>";
                echo "<p>" . nl2br(htmlspecialchars($row['message'])) . "</p>";
                echo "<p><small>Posted on: " . $row['created_at'] . "</small></p>";
                echo "</div>";
            }
        } else {
            echo "<p>No comments yet.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
