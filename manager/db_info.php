<?php

// ******** update your personal settings ******** 
$servername = "localhost";
$username = "root";
$password = "43129108ta";
$dbname = "librarysys";

// Connecting to and selecting a MySQL database
$link = mysqli_connect($servername, $username, $password, $dbname);
// 輸入中文也OK的編碼
mysqli_query($link, 'SET NAMES utf8');

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    return $link;
}

?>