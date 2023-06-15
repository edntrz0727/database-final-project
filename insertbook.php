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
    $state = $_POST['state'];
    $Lname = $_POST['Lname'];
    $number = $_POST['number'];

    $checksql1 = "SELECT * FROM book where ISBN = '$ISBN'";
	$result1=mysqli_query($conn,$checksql1);
	if ($result1->num_rows > 0) {
		$runsql = "insert into book_place(ISBN, Lname, number) value ($ISBN, '$Lname', '$number')";
		if ($conn->query($runsql) === TRUE) {
			echo "新增地點成功!!<br> <a href='book.php'>返回主頁</a>";
		} else {
			echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
		}
		exit;
	}else{
        $insert_sql = "insert into book(ISBN, title, writer, company, translator, publishDate, edition, subjecthead, language, state) value ('$ISBN', '$title', '$writer', '$company', '$translator', '$publishDate', '$edition', '$subjecthead', '$language', '$state')";
        $conn->query($insert_sql);
        $checksql = "SELECT * FROM book_place where number is null";
        $result=mysqli_query($conn,$checksql);
        $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
        $update_sql = "UPDATE book_place SET Lname = '$Lname', number = '$number' WHERE ISBN = '$ISBN'";
        if ($conn->query($update_sql) === TRUE) {
            echo "新增成功!!<br> <a href='book.php'>返回主頁</a>";
        } else {
            echo $update_sql;
            echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
        }
    }
}else{
	echo "資料不完全";
}

mysqli_close($conn);

?>

