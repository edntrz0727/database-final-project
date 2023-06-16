<?php

$conn = require_once "db_info.php";
$journalID = $_GET['id'];

if (isset($journalID)) {
    $delete_sql = "DELETE FROM journal where journalID = '$journalID'";

	if ($conn->query($delete_sql) === TRUE) {
        echo "刪除成功!<a href='journal.php'>返回主頁</a>";
    }else{
        echo "刪除失敗!";
	}

}else{
	echo "資料不完全";
}
				
?>