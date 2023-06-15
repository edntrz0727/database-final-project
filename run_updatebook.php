<?php

 $conn=require_once "db_info.php";
if (isset($_POST['title']) && isset($_POST['writer'])) {
	$ISBN = $_POST['ISBN'];
    $count = 0;
	$checksql = "SELECT * FROM book_place where ISBN = '$ISBN'";
	$result=mysqli_query($conn,$checksql);
	if ($result->num_rows > 0) {	
		while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
			$Lname = $_POST['Lname'][$count];
			$number = $_POST['number'][$count];
			$bookID = $_POST['bookID'][$count];
            if($Lname != $row['Lname'] || $number != $row['number']){
				$update_sql2 = "UPDATE book_place SET Lname = '$Lname', number = '$number' WHERE bookID = '$bookID'";
				$conn->query($update_sql2);
			}
			$count++;
		}
	}
    $title = $_POST['title'];
    $writer = $_POST['writer'];
    $company = $_POST['company'];
    $translator = $_POST['translator'];
    $publishDate = $_POST['publishDate'];
    $edition = $_POST['edition'];
    $subjecthead = $_POST['subjecthead'];
    $language = $_POST['language'];
    $state = $_POST['state'];

	$update_sql = "UPDATE book SET title = '$title', writer = '$writer', company = '$company', translator = $translator, publishDate = '$publishDate', edition = '$edition', subjecthead = '$subjecthead', language = '$language', state = '$state' WHERE ISBN = '$ISBN'";

	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='book.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>