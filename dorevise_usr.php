<?php

$conn = require_once "config.php";

if (isset($_POST['tel']) && isset($_POST['address']) && isset($_POST['email'])) {
    session_start();
	$phone = $_POST['tel'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	//$libraryID = $_SESSION['libraryID'];
    $libraryID = '1111111';

	$update_sql = "UPDATE READER
	               SET phone = '$phone', address = '$address', email = '$email' 
				   WHERE libraryID = '$libraryID'"; // TODO
	
	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='user_info.php'>返回個人資料</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";

	}

}else{
	echo "資料不完全";
}
				
?>