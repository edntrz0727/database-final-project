<?php

 $conn=require_once "db_info.php";
if (isset($_POST['reason'])) {
    $recommandID = $_POST['recommendID'];
    $librarianID = $_POST['librarianID'];
    $reason = $_POST['reason'];
    $state = $_POST['state'];

	$update_sql = "UPDATE manage SET librarianID = '$librarianID', reason = '$reason', state = '$state' WHERE recommendID = '$recommandID'";
	
	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='reciverecommand.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>