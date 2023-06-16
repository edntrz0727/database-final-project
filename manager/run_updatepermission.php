<?php

 $conn=require_once "db_info.php";
if (isset($_POST['queueID']) && isset($_POST['sourcelimit']) && isset($_POST['equiplimit'])) {
    $libraryID = $_POST['libraryID'];
    $queueID = $_POST['queueID'];
    $sourcelimit = $_POST['sourcelimit'];
    $equiplimit = $_POST['equiplimit'];
    
	$update_sql = "UPDATE permission SET queueID = '$queueID', sourcelimit = $sourcelimit, equiplimit = $equiplimit WHERE libraryID = '$libraryID'";
	
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