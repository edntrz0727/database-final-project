<?php

// MYSQL 自動ID

$conn = require_once "db_info.php";

if (isset($_POST['title']) && isset($_POST['Lname']) && isset($_POST['number'])) {
	$journalID = $_POST['journalID'];
    $title = $_POST['title'];
    $publishDate = $_POST['publishDate'];
    $subjecthead = $_POST['subjecthead'];
    $frequency = $_POST['frequency'];
    $state = $_POST['state'];
	$Lname = $_POST['Lname'];
	$number = $_POST['number'];

	$checksql1 = "SELECT * FROM journal where journalID = '$journalID'";
	$result1=mysqli_query($conn,$checksql1);
	if ($result1->num_rows > 0) {
		$runsql = "insert into journal_place(journalID, Lname, number) value ('$journalID', '$Lname', '$number')";
		if ($conn->query($runsql) === TRUE) {
			echo "新增地點成功!!<br> <a href='journal.php'>返回主頁</a>";
		} else {
			echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
		}
		exit;
    }else{
		$insert_sql = "insert into journal(title, publishDate, frequency, subjecthead, state) value ('$title', '$publishDate', '$frequency', '$subjecthead', '$state')";
		$conn->query($insert_sql);
		$checksql = "SELECT * FROM journal_place where number is null";
		$result=mysqli_query($conn,$checksql);
		$row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
		$libraryjournalID = $row['libraryjournalID'];
		$update_sql = "UPDATE journal_place SET Lname = '$Lname', number = '$number' WHERE libraryjournalID = '$libraryjournalID'";
		if ($conn->query($update_sql) === TRUE) {
			echo "新增成功!!<br> <a href='journal.php'>返回主頁</a>";
		} else {
			echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
		}
	}
}else{
	echo "資料不完全";
}

mysqli_close($conn);

?>

