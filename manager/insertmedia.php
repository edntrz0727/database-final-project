<?php

// MYSQL 自動ID

$conn = require_once "db_info.php";

if (isset($_POST['title']) && isset($_POST['Lname']) && isset($_POST['number'])) {
	$mediaID = $_POST['mediaID'];
    $title = $_POST['title'];
    $company = $_POST['company'];
    $publishDate = $_POST['publishDate'];
    $subjecthead = $_POST['subjecthead'];
    $language = $_POST['language'];
    $state = $_POST['state'];
	$Lname = $_POST['Lname'];
	$number = $_POST['number'];

	$checksql1 = "SELECT * FROM media where mediaID = '$mediaID'";
	$result1=mysqli_query($conn,$checksql1);
	if ($result1->num_rows > 0) {
		$runsql = "insert into media_place(mediaID, Lname, number) value ('$mediaID', '$Lname', '$number')";
		if ($conn->query($runsql) === TRUE) {
			echo "新增地點成功!!<br> <a href='media.php'>返回主頁</a>";
		} else {
			echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
		}
		exit;
	}else{
		$insert_sql = "insert into media(title, company, publishDate, subjecthead, language, state) value ('$title', '$company', '$publishDate', '$subjecthead', '$language', '$state')";
		$conn->query($insert_sql);
		$checksql = "SELECT * FROM media_place where number is null";
		$result=mysqli_query($conn,$checksql);
		$row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
		$librarymediaID = $row['librarymediaID'];
		$update_sql = "UPDATE media_place SET Lname = '$Lname', number = '$number' WHERE librarymediaID = '$librarymediaID'";
		if ($conn->query($update_sql) === TRUE) {
			echo "新增成功!!<br> <a href='media.php'>返回主頁</a>";
		} else {
			echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
		}
	}	
}else{
	echo "資料不完全";
}

mysqli_close($conn);

?>

