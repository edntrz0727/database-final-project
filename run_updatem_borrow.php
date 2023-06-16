<?php

 $conn=require_once "db_info.php";
if (isset($_POST['state'])) {
    $mbID = $_POST['mbID'];
    $state = $_POST['state'];
    $libraryID = $_POST['libraryID'];

	$update_sql = "UPDATE m_borrow SET state = '$state' WHERE mbID = '$mbID'";
	
	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='m_borrow.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>