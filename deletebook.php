<?php

$conn = require_once "db_info.php";
$ISBN = $_GET['id'];

if (isset($ISBN)) {
    $delete_sql = "DELETE FROM book where ISBN = '$ISBN'";

	if ($conn->query($delete_sql) === TRUE) {
        echo "刪除成功!<a href='book.php'>返回主頁</a>";
    }else{
        echo "刪除失敗!";
	}

}else{
	echo "資料不完全";
}
				
?>