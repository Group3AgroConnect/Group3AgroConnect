<?php
// Database connection parameters
$servername = "localhost"; // Localhost for XAMPP
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Default XAMPP MySQL password (empty)
$dbname = "feedback_db"; // Name of the database you created

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all feedback entries from the database
$sql = "SELECT first_name, last_name, message, created_at FROM feedback ORDER BY created_at DESC";
$result = $conn->query($sql);

// Sample PHP code to fetch and display feedback with border styling
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='feedback-item'>"; // Use a class to define border
        echo "<h3>" . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['message']) . "</p>";
        echo "<span class='feedback-date'>" . htmlspecialchars($row['created_at']) . "</span>";
        echo "</div>";
    }
} else {
    echo "<p>No feedback available yet. Be the first to submit!</p>";
}

// Close the connection
$conn->close();
?>