<?php

// ******** update your personal settings ******** 
$servername = "localhost";
$username = "root";
$password = "40947018S";
$dbname = "lib_proj";

// Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['account_name']) && isset($_POST['password'])) {
	$libraryID = $_POST['account_name'];
	$password = $_POST['password'];

	$sql = "SELECT *
            from READER
            where $libraryID = libraryID";
	
    $result = $conn->query($sql);
	if ($result === TRUE) {
        $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
        if($password === $row['password']){
            // 跳到成功頁面
        }
        else{
            // 跳到失敗頁面
        }
	} else {
		// 跳到失敗頁面
	}

}else{
	// 跳到失敗頁面
}
				
?>