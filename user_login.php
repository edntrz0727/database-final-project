<?php

$conn=require_once "config.php";

if (isset($_POST['account_name']) && isset($_POST['password'])) {
	$libraryID = $_POST['account_name'];
	$password = $_POST['password'];

	$sql = "SELECT *
            from READER
            where libraryID = '$libraryID'";
	
    $result = $conn->query($sql);
	if ($result) {
        $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
        if($password == $row['password']){
            session_start();
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            //這些是之後可以用到的變數
            $_SESSION["libraryID"] = $row["libraryID"];

            // 跳到成功頁面
            header("location:user_login_success.html");
        }
        else{
            // 跳到失敗頁面
            header("location:user_login_failed.html");
        }
	} else {
		// 跳到失敗頁面
        header("location:user_login_failed.html");
	}

}else{
	// 跳到失敗頁面
    header("location:user_login_failed.html");
}
				
?>