<?php

$conn = require_once "db_info.php";
$mediaID = $_GET['id'];

if (isset($mediaID)) {
    $delete_sql = "DELETE FROM media where mediaID = '$mediaID'";

	if ($conn->query($delete_sql) === TRUE) {
        echo "刪除成功!<a href='media.php'>返回主頁</a>";
    }else{
        echo "刪除失敗!";
	}

}else{
	echo "資料不完全";
}
				
?>