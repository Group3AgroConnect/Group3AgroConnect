<?php
// Database connection parameters
$servername = "localhost"; // Localhost for XAMPP
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Default XAMPP MySQL password (empty)
$dbname = "feedback_db"; // Name of the database you created

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully to MySQL database!";
$conn->close(); // Close the connection
?>