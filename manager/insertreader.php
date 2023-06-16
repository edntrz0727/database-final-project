<?php

//mysql自動新增permission

$conn = require_once "db_info.php";

if (isset($_POST['studentID']) && isset($_POST['name']) && isset($_POST['school']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['email'])) {
    $studentID = $_POST['studentID'];
    $name = $_POST['name'];
    $school = $_POST['school'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];

	$insert_sql = "insert into reader(studentID, name, school, password, phone, address, email) value ('$studentID', '$name', '$school', '$password', '$phone', '$address', '$email')";
	
	if ($conn->query($insert_sql) === TRUE) {
		echo "新增成功!!<br> <a href='reader.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}

mysqli_close($conn);

?>

