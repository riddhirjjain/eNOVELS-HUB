<?php
// Database connection configuration
$servername = "localhost";
$username = "user_name";
$password = "password";
$dbname = "enovels_users";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate the form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert the form data into the database
$sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you for your submission!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>