<?php

// MYSQL 自動ID

$conn = require_once "db_info.php";

if (isset($_POST['title']) && isset($_POST['Lname']) && isset($_POST['url'])) {
    $databaseID = $_POST['databaseID'];
    $title = $_POST['title'];
    $company = $_POST['company'];
    $url = $_POST['url'];
    $year= $_POST['year'];
    $description = $_POST['description'];
	$Lname = $_POST['Lname'];

	$checksql1 = "SELECT * FROM buy where databaseID = '$databaseID'";
	$result1=mysqli_query($conn,$checksql1);
	if ($result1->num_rows > 0) {
		$runsql = "insert into buy(databaseID, Lname) value ('$databaseID', '$Lname')";
		if ($conn->query($runsql) === TRUE) {
			echo "新增地點成功!!<br> <a href='db.php'>返回主頁</a>";
		} else {
			echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
		}
		exit;
    }else{
		$insert_sql = "insert into db(title, company, url, year, description) value ('$title', '$company', '$url', '$year', '$description')";
		$conn->query($insert_sql);
		$takeid = "SELECT * FROM db where url = '$url'";
		$result=mysqli_query($conn,$takeid);
		$row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
		$databaseID = $row['databaseID'];
		$checksql = "SELECT * FROM buy where databaseID = '$databaseID'";
		$result1=mysqli_query($conn,$checksql);
		$row1 = mysqli_fetch_array ( $result1, MYSQLI_ASSOC );
		$buyID = $row1['buyID'];
		$update_sql = "UPDATE buy SET Lname = '$Lname' WHERE buyID = '$buyID'";
		if ($conn->query($update_sql) === TRUE) {
			echo "新增成功!!<br> <a href='db.php'>返回主頁</a>";
		} else {
			echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
		}
	}
}else{
	echo "資料不完全";
}

mysqli_close($conn);

?>

