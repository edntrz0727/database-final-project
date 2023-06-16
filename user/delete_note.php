<?php

$conn = require_once "config.php";

$hisID = $_GET['id'];
$del_sql = "DELETE FROM READHISTORY where hisID = '$hisID'";
if ($conn->query($del_sql) === TRUE) {
		echo "刪除成功!!<br> <a href='read_history.php'>返回閱讀紀錄</a>";
} else {
    echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
}
				
?>