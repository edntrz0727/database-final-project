<?php

//mysql自動新增permission

$conn = require_once "db_info.php";

if (isset($_POST['ISBN']) && isset($_POST['title']) && isset($_POST['description'])) {
	$ISBN = $_POST['ISBN'];
    $title = $_POST['title'];
    $description = $_POST['description'];

	$insert_sql = "insert into mouthlist(ISBN, title, description) value ('$ISBN', '$title', '$description')";
	
	if ($conn->query($insert_sql) === TRUE) {
		echo "新增成功!!<br> <a href='recommand.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>圖書館沒有這書!!!新增失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}

mysqli_close($conn);

?>

