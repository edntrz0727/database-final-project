<?php

 $conn=require_once "db_info.php";
if (isset($_POST['studentID']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password'])) {
    $libraryID = $_POST['libraryID'];
    $studentID = $_POST['studentID'];
    $name = $_POST['name'];
    $school = $_POST['school'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    
	$update_sql = "UPDATE reader SET studentID = '$studentID', name = '$name', school = '$school', password = '$password', phone = '$phone', address = '$address', email = '$email' WHERE libraryID = '$libraryID'";
	
	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='reader.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>