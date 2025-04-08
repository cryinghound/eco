<?php
$servername = "localhost";  
$username = "root";  
$password = "RydenAusch2020";  
$dbname = "ecoexchange";  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
