<?php
$servername = "mysql";
$username = "wissam";
$password = "hassan";
$database = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the table if it doesn't exist
$tableQuery = "CREATE TABLE IF NOT EXISTS user_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL
)";

if ($conn->query($tableQuery) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Get values from the form
$name = $_POST['name'];
$phone = $_POST['phone'];

// Insert data into MySQL
$insertQuery = "INSERT INTO user_data (name, phone) VALUES ('$name', '$phone')";

if ($conn->query($insertQuery) === TRUE) {
    echo "Record created successfully";
} else {
    echo "Error: " . $insertQuery . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
