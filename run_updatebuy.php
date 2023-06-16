<?php

 $conn=require_once "db_info.php";
if (isset($_POST['Lname'])) {
    $buyID = $_POST['buyID'];
    $Lname = $_POST['Lname'];

	$update_sql = "UPDATE buy SET Lname = '$Lname' WHERE buyID = '$buyID'";
	
	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='buy.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>