<?php

 $conn=require_once "db_info.php";
if (isset($_POST['title']) && isset($_POST['postDate']) && isset($_POST['text'])) {
    $librarianID = $_POST['librarianID'];
    $title = $_POST['title'];
    $postDate = $_POST['postDate'];
    $dueDate = $_POST['dueDate'];
    $text = $_POST['text'];
    $tag = $_POST['tag'];

    $transferpostDate = strtotime($postDate);
    $transferdueDate = strtotime($dueDate);

    if ($transferdueDate < $transferpostDate) {
        echo "<script>alert('日期錯誤');window.location.href='insertmessage.php';</script>";
        exit;
    }

	$insert_sql = "insert into news(librarianID, title, postDate, dueDate, test, taq) value ('$librarianID', '$title', '$postDate', '$dueDate', '$text', '$tag')";
	
	if ($conn->query($insert_sql) === TRUE) {
		echo "新增成功!!<br> <a href='message.php'>返回主頁</a>";
	} else {
        echo $insert_sql;
		echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>