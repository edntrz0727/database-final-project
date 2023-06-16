<?php

$conn=require_once "db_info.php";
if (isset($_POST['journalID']) && isset($_POST['title'])) {
	$journalID = $_POST['journalID'];
	$count = 0;
	$checksql = "SELECT * FROM journal_place where journalID = '$journalID'";
	$result=mysqli_query($conn,$checksql);
	if ($result->num_rows > 0) {	
		while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
			$Lname = $_POST['Lname'][$count];
			$number = $_POST['number'][$count];
			$libraryjournalID = $_POST['id'][$count];
            if($Lname != $row['Lname'] || $number != $row['number']){
				$update_sql2 = "UPDATE journal_place SET Lname = '$Lname', number = '$number' WHERE libraryjournalID = '$libraryjournalID'";
				$conn->query($update_sql2);
			}
			$count++;
		}
	}
    $title = $_POST['title'];
    $publishDate = $_POST['publishDate'];
    $subjecthead = $_POST['subjecthead'];
    $frequency = $_POST['frequency'];
    $state = $_POST['state'];

	$update_sql1 = "UPDATE journal SET title = '$title', publishDate = '$publishDate', subjecthead = '$subjecthead', frequency = '$frequency', state = '$state' WHERE journalID = '$journalID'";

	if ($conn->query($update_sql1) === TRUE) {
		echo "修改成功!!<br> <a href='journal.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>