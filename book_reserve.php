<?php

$conn=require_once "config.php";

session_start();

$libraryID = $_SESSION['libraryID'];
//$libraryID = '1111111';
$ISBN = $_GET['id'];

$insert_sql = "INSERT INTO `B_RESERVATIOB` (`libraryID`, `ISBN`) VALUE ('$libraryID', '$ISBN')";
$insert_result = $conn->query($insert_sql);
if ($insert_result) {
    echo "預約成功!";
} else {
    echo "預約失敗";
}
   
                
?>