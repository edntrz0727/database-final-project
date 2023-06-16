<?php

 $conn=require_once "db_info.php";
if (isset($_POST['title']) && isset($_POST['url'])) {
	$databaseID = $_POST['databaseID'];
    $title = $_POST['title'];
    $company = $_POST['company'];
    $url = $_POST['url'];
    $year = $_POST['year'];
    $description = $_POST['description'];

	$update_sql = "UPDATE db SET title = '$title', company = '$company', url = '$url', year = '$year', description = '$description' WHERE databaseID = '$databaseID'";

	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='db.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>