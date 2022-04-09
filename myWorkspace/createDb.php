<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mytask";
$conn = mysqli_connect($servername, $username, $password, $dbname, "3306");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create database
$db_selected = mysqli_select_db($conn, 'myTask');

if (!$db_selected) {
    $sql1 = "CREATE DATABASE myTask";

    if (mysqli_query($conn, $sql1)) {
       // echo "Database my_db created successfully\n";
    } else {
        echo 'Error creating database: ' . $conn->error;
    }
}