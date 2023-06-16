<?php

$conn = require_once "db_info.php";

if (isset($_POST['title']) && isset($_POST['writer']) && isset($_POST['ISBN'])) {
	$ISBN = $_POST['ISBN'];
    $title = $_POST['title'];
    $writer = $_POST['writer'];
    $company = $_POST['company'];
    $translator = $_POST['translator'];
    $publishDate = $_POST['publishDate'];
    $edition = $_POST['edition'];
    $subjecthead = $_POST['subjecthead'];
    $language = $_POST['language'];

        $insert_sql = "insert into book(ISBN, title, writer, company, translator, publishDate, edition, subjecthead, language, state) value ('$ISBN', '$title', '$writer', '$company', '$translator', '$publishDate', '$edition', '$subjecthead', '$language', '空閒')";
        if ($conn->query($insert_sql) === TRUE) {
            echo "新增成功!!<br> <a href='collection_info_manage.php'>返回主頁</a>";
        } else {
            echo $insert_sql;
            echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
        }
    }
else{
	echo "資料不完全";
}

mysqli_close($conn);

?>

