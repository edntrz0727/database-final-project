<?php

$conn=require_once "config.php";

session_start();

if (isset($_POST['note_name']) && isset($_POST['new_note_info']) ) {
    $libraryID = $_SESSION['libraryID'];
    //$libraryID = '1111111';
	$title = $_POST['note_name'];
	$text = $_POST['new_note_info'];

    

	$sql = "INSERT INTO `READHISTORY` (`libraryID`, `title`, `text`) VALUES
            ('$libraryID', '$title', '$text')
            ";
	
    $result = $conn->query($sql);
	if ($result) {
        echo "新增成功!<br> <a href='read_history.html'>返回主頁</a>";
	} else {
        echo "新增失敗";
	}

}else{
	// 跳到失敗頁面
    echo "必填資料未填";
}
				
?>