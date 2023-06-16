<?php

$conn = require_once "config.php";

$ID = $_GET['id'];
$del_sql = "DELETE FROM E_RESERVATIOB where EreservationID = '$ID'";
if ($conn->query($del_sql) === TRUE) {
		echo "取消成功!!<br> <a href='user_index.php'>返回首頁</a>";
} else {
    echo "<h2 align='center'><font color='antiquewith'>取消失敗!!</font></h2>";
}
				
?>