<?php

$conn=require_once "config.php";

session_start();

if (isset($_POST['equip_name']) && isset($_POST['equip_id']) && isset($_POST['equip_loc']) ) {
    $name = $_POST['equip_name'];
    $equipID = $_POST['equip_id'];
    $Lname = $_POST['equip_loc'];

    

    $sql = "SELECT *
            FROM EQUIPMENT
            WHERE name = '$name' and equipID = '$equipID' and Lname = '$Lname' and state = 'free'";
    
    $result = $conn->query($sql);
    if ($result) {	
        $libraryID = $_SESSION['libraryID'];
        //$libraryID = '1111111';

        $insert_sql = "INSERT INTO `E_RESERVATIOB` (`libraryID`, `equipID`) VALUE ('$libraryID', '$equipID')";
        $insert_result = $conn->query($insert_sql);
        if ($insert_result) {
            echo "預約成功!";
        } else {
            echo "預約失敗";
        }
    } else {
        echo "查詢失敗";
    }

}else{
    // 跳到失敗頁面
    echo "資料不完整";
}
                
?>