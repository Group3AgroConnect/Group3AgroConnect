<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "feedback_db";

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate input data from the POST request
if (
    isset($_POST['first_name']) && !empty(trim($_POST['first_name'])) &&
    isset($_POST['last_name']) && !empty(trim($_POST['last_name'])) &&
    isset($_POST['message']) && !empty(trim($_POST['message']))
) {
    // Sanitize and retrieve form data
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (first_name, last_name, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $first_name, $last_name, $message);
        if ($stmt->execute()) {
            header("Location: index1.php");
            exit; // Make sure to stop execution after the redirection
        } else {
            echo "Error: Unable to submit feedback at this time.";
        }
        $stmt->close();
    } else {
        echo "Failed to prepare statement: " . $conn->error;
    }
} else {
    echo "Error: Please fill in all required fields.";
}

// Close the database connection
$conn->close();
?>