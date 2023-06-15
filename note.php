<html>
    <head>
        <title>筆記</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body> 
        <form action="" method="get">
            <input type="button" value="返回閱讀紀錄" onclick="javascript:location.href='read_history.php'"/>
            <p>筆記內容</p>
            <?php
                $conn=require_once "config.php";
                $hisID = $_GET['id'];

                $sql = "SELECT * from READHISTORY where hisID = '$hisID'";
                $result = $conn->query($sql);
                if($result){
                    $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
                    echo '<p>2023/06/14 db project快做不完了'.$row['text'].'</p>';
                }
                else{
                    echo '載入失敗';
                }
            ?>
            <input type="button" value="修改筆記" onclick="javascript:location.href='revise_note.html?id=<?php echo $_GET['id']?>'"/>
            <input type="button" value="刪除筆記" onclick="delete_note"/>
            
        </form>
    </body>
</html>