<?php

$conn=require_once "config.php";

session_start();

if (isset($_POST['book_name']) && isset($_POST['author']) && isset($_POST['ISBN']) ) {
    $libraryID = $_SESSION['libraryID'];
    //$libraryID = '1111111';
	$title = $_POST['book_name'];
	$writer = $_POST['author'];
    $ISBN = $_POST['ISBN'];
    $company = $_POST['publisher'];
    $translator = $_POST['translator'];
    $publishDate = $_POST['publish_date'];
    $edition = $_POST['edition'];
    $subjecthead = $_POST['subject_handling'];
    $language = $_POST['language'];

    

	$sql = "INSERT INTO `RECOMMEND` (`libraryID`,  `ISBN`,  `title`, `writer`, `company`,  `translator`, `publishDate`,
            `edition`, `subjecthead`, `language`) VALUES
            ('$libraryID', '$ISBN', '$title', '$writer', '$company', '$translator', '$publishDate', '$edition', '$subjecthead', '$language')
            ";
	
    $result = $conn->query($sql);
	if ($result) {
        echo "送出成功!<br> <a href='user_index.php'>返回首頁</a>";
	} else {
        echo "送出失敗";
	}

}else{
	// 跳到失敗頁面
    echo "必填資料未填";
}
				
?>