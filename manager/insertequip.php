<?php

//mysql自動新增permission

$conn = require_once "db_info.php";

if (isset($_POST['name']) && isset($_POST['Lname']) && isset($_POST['state'])) {
	$equipID = $_POST['equipID'];
    $name = $_POST['name'];
    $Lname = $_POST['Lname'];
    $state = $_POST['state'];

	$insert_sql = "insert into equipment(name, Lname, state) value ('$name', '$Lname', '$state')";
	
	if ($conn->query($insert_sql) === TRUE) {
		echo "新增成功!!<br> <a href='equipment.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}

mysqli_close($conn);

?>

