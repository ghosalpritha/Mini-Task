<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";
$conn = mysqli_connect($servername, $username, $password, $dbname, "3306");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to truncate table
$sql3 = "TRUNCATE TABLE IMAGES";
if ($conn->query($sql3) === FALSE) {
    echo "Error truncating table: " . $conn->error;
}

$conn->close();


