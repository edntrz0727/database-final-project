<?php

$conn = require_once "db_info.php";
$equipID = $_GET['id'];

if (isset($equipID)) {
    $delete_sql = "DELETE FROM equipment where equipID = '$equipID'";

	if ($conn->query($delete_sql) === TRUE) {
        echo "刪除成功!<a href='equipment.php'>返回主頁</a>";
    }else{
        echo "刪除失敗!";
	}

}else{
	echo "資料不完全";
}
				
?>