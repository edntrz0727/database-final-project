<?php

 $conn=require_once "db_info.php";
if (isset($_POST['title']) && isset($_POST['ISBN']) && isset($_POST['description'])) {
	$ISBN = $_POST['ISBN'];
    $description = $_POST['description'];
    $title = $_POST['title'];

	$update_sql = "UPDATE mouthlist SET description = '$description', title = '$title' WHERE ISBN = '$ISBN'";

	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='recommand.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>