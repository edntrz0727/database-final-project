<html>
    <head>
        <title>最新消息</title>
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
        tr,th{
           padding-top: 2%;
        }
        </style>
    </head>
    <body>
        <div id="banner" class="banner" style="background-color:brown;">
			<p style="color: white; font-size: large;font-weight: bolder;margin-left: 5%;">三校資工圖書系統
		</div>
        <div id="collection info" style="margin-top: 2%;text-align: center;">
            <p style="font-size: large;font-weight: bold;color: brown;">最新消息</p>
            <form action="get_collection_info.php" method="get">
                <table  style="margin-left: 40%;margin-top: 1%;">
                <?php
                    $conn=require_once "config.php";

                    $ID = $_GET["id"];
                    $sql = "SELECT * 
                            from NEWS 
                            where newID = '$ID'";	// set up your sql query
                    $result = $conn->query($sql);	// Send SQL Query
                    if($result){
                        $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
                        $title = $row['title'];
                        $text = $row['test'];
                    }
                    else{
                        echo "查無資料!";
                    }
                    
                ?>
                <tr>
                    <th>標題</th>
                    <th><?php echo $title; ?></th>
                </tr>
                <tr>
                    <th>內文</th>
                    <th><?php echo $text; ?></th>
                </tr>
                    
                </table>
            </form>
        </div>
        <div class="btn" style="text-align: center;margin-top: 2%;">
            <input type="button" value="返回首頁" onclick="javascript:location.href='user_index.php'" style=" background-color: antiquewhite;color: brown;border: none;"/>
        </div>
    </body>
</html>