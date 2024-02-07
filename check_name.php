<?php
// MySQL database configuration
$servername = "wissamrh-db-service";
$username = "myuser";
$password = "mypassword";
$database = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve name from GET request
$nameToCheck = $_GET['name'];

// Query to check if the name exists in the database
$sql = "SELECT * FROM mytable WHERE name = '$nameToCheck'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Name exists in the database
    echo "Name '$nameToCheck' exists in the database.";
} else {
    // Name does not exist in the database
    echo "Name '$nameToCheck' does not exist in the database.";
}

// Close database connection
$conn->close();
?>
