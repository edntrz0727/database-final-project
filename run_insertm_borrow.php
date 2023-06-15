<?php

 $conn=require_once "db_info.php";
if (isset($_POST['libraryID']) && isset($_POST['mediaID'])) {
    $librarianID = $_POST['librarianID'];
    $libraryID = $_POST['libraryID'];
    $mediaID = $_POST['mediaID'];

	$insert_sql = "insert into m_borrow(libraryID, librarianID, mediaID, state) value ('$libraryID', '$librarianID', '$mediaID', '借閱中')";
	
	if ($conn->query($insert_sql) === TRUE) {
		echo "新增成功!!<br> <a href='m_borrow.php'>返回主頁</a>";
	} else {
        echo $insert_sql;
		echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>