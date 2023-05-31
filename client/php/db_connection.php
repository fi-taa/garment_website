<?php

// Database configuration
$servername = "localhost"; 
$username = "root";
$password = "Fi.3445@mysql"; 
$dbname = "garment_website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
