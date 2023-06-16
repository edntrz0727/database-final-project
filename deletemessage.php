<?php

$conn = require_once "db_info.php";
$newID = $_GET['id'];

if (isset($newID)) {
    $delete_sql = "DELETE FROM news where newID = '$newID'";

	if ($conn->query($delete_sql) === TRUE) {
        echo "刪除成功!<a href='message.php'>返回主頁</a>";
    }else{
        echo "刪除失敗!";
	}

}else{
	echo "資料不完全";
}
				
?>