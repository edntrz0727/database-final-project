<?php
    // ******** update your personal settings ******** 
$servername = "localhost";
$username = "root";
$password = "40947018S";
$dbname = "lib_proj";

// Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
    return $conn;
}
?>