<?php

 $conn=require_once "db_info.php";
if (isset($_POST['state']) && isset($_POST['name']) && isset($_POST['Lname'])) {
    $equipID = $_POST['equipID'];
    $name = $_POST['name'];
    $Lname = $_POST['Lname'];
    $state = $_POST['state'];

	$update_sql = "UPDATE equipment SET name = '$name', Lname = '$Lname', state = '$state' WHERE equipID = '$equipID'";
	
	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='equipment.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>