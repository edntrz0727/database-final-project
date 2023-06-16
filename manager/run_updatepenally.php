<?php

 $conn=require_once "db_info.php";
if (isset($_POST['state'])) {
    $penallyID = $_POST['penallyID'];
    $state = $_POST['state'];
    $libraryID = $_POST['libraryID'];

	$update_sql = "UPDATE penalty SET state = '$state' WHERE penallyID = '$penallyID'";
	
	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='readerdetail.php?id=".$libraryID."'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>