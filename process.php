<?php
$servername = "wissamrh-db-service"; // Change to your MySQL service name
$username = "myuser"; // Change to your MySQL username
$password = "mypassword"; // Change to your MySQL password
$dbname = "mydatabase"; // Change to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];

// SQL to insert data into the table
$sql = "INSERT INTO mytable (name, phone) VALUES ('$name', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
