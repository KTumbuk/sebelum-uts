<?php
$servername = "localhost"; // Default for XAMPP/WAMP/LAMP
$username = "root"; // Default for local servers
$password = ""; // Default (empty for XAMPP)
$database = "ado"; // Use your created database

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
