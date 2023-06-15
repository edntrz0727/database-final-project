<?php

 $conn=require_once "db_info.php";
if (isset($_POST['title']) && isset($_POST['dueDate']) && isset($_POST['text'])) {
	$newID = $_POST['newID'];
    $librarianID = $_POST['librarianID'];
    $title = $_POST['title'];
    $dueDate = $_POST['dueDate'];
    $test = $_POST['text'];
    $tag = $_POST['taq'];

	$update_sql = "UPDATE news SET librarianID = '$librarianID', title = '$title', dueDate = '$dueDate', test = '$test', taq = '$tag' WHERE newID = '$newID'";

	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='message.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>