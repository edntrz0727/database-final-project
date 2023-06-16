<?php

$conn = require_once "db_info.php";
$databaseID = $_GET['id'];

if (isset($databaseID)) {
    $delete_sql = "DELETE FROM db where databaseID = '$databaseID'";

	if ($conn->query($delete_sql) === TRUE) {
        echo "刪除成功!<a href='db.php'>返回主頁</a>";
    }else{
        echo "刪除失敗!";
	}

}else{
	echo "資料不完全";
}
				
?>