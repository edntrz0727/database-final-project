<html>
    <head>
        <title>筆記</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <style>
            * {
                margin: 0;
                padding: 0;
                list-style: none;
                text-decoration: none;
                box-sizing: border-box;
            }
            
        body{
            width: 100%;
            height: 100%;
            background-color: antiquewhite;
        }
        .options{
            margin-top: 2%;
            border-color: brown;
        }
        tr,th{
            padding-top:  5%;
        }
        </style>
    </head>
    <body> 
        <div id="banner" class="banner" style="background-color:brown;">
			<p style="color: white; font-size: large;font-weight: bolder;margin-left: 5%;">三校資工圖書系統
		</div>
        <p style="color: brown;font-weight: bold;font-size: large;text-align: center;margin-top: 2%;">筆記紀錄</p>
        <form action="" method="get">
            <div class="top-btn" style="margin-top: 2%;margin-left: 10%;">
                <input type="button" value="返回閱讀紀錄" onclick="javascript:location.href='read_history.php'" style=" background-color: antiquewhite;color: brown;border: none;"/>
            </div>
            <p style="text-align: center;margin-top: 1%;">筆記內容</p>
            <?php
                $conn=require_once "config.php";
                $hisID = $_GET['id'];

                $sql = "SELECT * from READHISTORY where hisID = '$hisID'";
                $result = $conn->query($sql);
                if($result){
                    $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
                    echo '<p style="text-align: center;margin-top: 1%;">'.$row['text'].'</p>';
                }
                else{
                    echo '載入失敗';
                }
            ?>
            <div class="btm_btn" style="text-align: center;margin-top: 2%;">
                <input type="button" value="修改筆記" onclick="javascript:location.href='revise_note.html?id=<?php echo $_GET['id']?>'" style=" background-color: antiquewhite;color: brown;border: none;"/>
                <input type="button" value="刪除筆記" onclick="javascript:location.href='delete_note.php?id=<?php echo $_GET['id']?>'" style=" background-color: antiquewhite;color: brown;border: none;margin-left: 5%;"/>
            </div>
            
        </form>
    </body>
</html>