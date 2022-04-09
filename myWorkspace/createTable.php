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

// sql to create table
$sql2 = "CREATE TABLE IF NOT EXISTS IMAGES (
id int(11),
image_name  VARCHAR(100),
Time_img_shown time)";

if ($conn->query($sql2) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
