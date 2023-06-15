<?php

$conn = require_once "config.php";

if (isset($_POST['note_name']) && isset($_POST['note_info']) ) {
    session_start();
	$title = $_POST['note_name'];
	$text = $_POST['note_info'];
	$libraryID = $_SESSION['libraryID'];
    //$libraryID = '1111111';
    $hisID = $_GET['id'];

	$update_sql = "UPDATE READHISTORY
	               SET title = '$title', text = '$text' 
				   WHERE hisID = '$hisID'"; // TODO
	
	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='read_history.php'>返回閱讀清單</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";

	}

}else{
	echo "資料不完全";
}
				
?>