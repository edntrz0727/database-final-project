<?php

$conn=require_once "db_info.php";
if (isset($_POST['mediaID']) && isset($_POST['title'])) {
	$mediaID = $_POST['mediaID'];
	$count = 0;
	$checksql = "SELECT * FROM media_place where mediaID = '$mediaID'";
	$result=mysqli_query($conn,$checksql);
	if ($result->num_rows > 0) {	
		while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
			$Lname = $_POST['Lname'][$count];
			$number = $_POST['number'][$count];
			$librarymediaID = $_POST['id'][$count];
            if($Lname != $row['Lname'] || $number != $row['number']){
				$update_sql2 = "UPDATE media_place SET Lname = '$Lname', number = '$number' WHERE librarymediaID = '$librarymediaID'";
				$conn->query($update_sql2);
			}
			$count++;
		}
	}
    $title = $_POST['title'];
    $company = $_POST['company'];
    $publishDate = $_POST['publishDate'];
    $subjecthead = $_POST['subjecthead'];
    $language = $_POST['language'];
    $state = $_POST['state'];

	$update_sql1 = "UPDATE media SET title = '$title', company = '$company', publishDate = '$publishDate', subjecthead = '$subjecthead', language = '$language', state = '$state' WHERE mediaID = '$mediaID'";

	if ($conn->query($update_sql1) === TRUE) {
		echo "修改成功!!<br> <a href='media.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
mysqli_close($conn);
				
?>