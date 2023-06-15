<html>
<head>
	<title>三校資工領域圖書整合系統</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="https://kit.fontawesome.com/998bef7baf.js" crossorigin="anonymous"></script>
    <style>
* {
                margin: 0;
                padding: 0;
                list-style: none;
                text-decoration: none;
                box-sizing: border-box;
            }
		body{
			background-color: antiquewhite;
			width: 100%;
			height: 100%;
		}
		form.page{
			width: 100%;
			height: 100%;
			background-color: antiquewhite;
		}
		.login{
			width: 100%;
			height: 5%;
			background-color: brown;
		}
		.option_btn{
            background-color: rgb(255, 253, 250);
            color: brown;
            border-style: none;
            margin-top: 5%;
            width: 80%;
            margin-left: 10%;
            height: 5%;
        }
		.sidebar{
			width: 30%;
			float: left;
		}
		.announcement{
			width: 70%;
			float: right;
			text-align: center;
		}
		tr,th{
			padding-top: 2%;
			padding-left: 100px;
		}
	</style>
</head>
<body>
    <div id="banner" class="banner" style="background-color:brown;">
        <p style="color: white; font-size: large;font-weight: bolder;margin-left: 5%;">三校資工圖書系統
        <a href="user_info.php" style="font-size:medium;margin-left: 80%; color:white;font-weight: normal;">會員資料</a>
    </div>

	<div class="search" style="text-align: center; margin-top: 5%;height: 5%">
        <form action="search.php" method="post">
            <input type="text" name="search" id="search" placeholder="輸入尋找書籍" style="width: 40%;border: none;height: 100%;">
            <button class="submit" style="background-color: antiquewhite;border-color: brown;border: none;margin-left: 2%;"><i class="fas fa-search"></i></button>
        </form>
	</div>

	<div class="advanced search" style="text-align: center;margin-top: 1%;">
		<a href="adv_research.html" >進階搜尋選項</a>
	</div>
	
	<div class="sidebar" style="margin-top: 2%;">
		<p style="color: brown;text-align: center;font-size: large;margin-top: 2%;font-weight: bold;">其他功能</p>
			<input type="button" class="option_btn" value="設施預約" onclick="javascript:location.href='equip_reserve.html'"/>
			<input type="button" class="option_btn" value="書籍推薦" onclick="javascript:location.href='recommend.html'"/>
	</div>
	<div class="announcement" style="margin-top: 2%;">
		<form action="" method="get">	
			<p style="color: brown;text-align: center;font-size: large;margin-top: 2%;font-weight: bold;">最新消息</p>
			<table><!--css之後再說-->
				<tr>
					<th>發布時間</th>
					<th>公告內容</th>
				</tr>
                <?php
                    $conn=require_once "config.php";
				
                    // ******** update your personal settings ******** 
                    $sql = "SELECT * from NEWS";	// set up your sql query
                    $result = $conn->query($sql);	// Send SQL Query
    
                    if ($result->num_rows > 0) {	
                        while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
                            // Process the Result here , need to modify.
                            echo'<tr>'.
                                '<td>'.$row['postDate'].'</td>'.
                                '<td>'.$row['title'].'</td>'.
                            '</tr>';
                        }
                    } else {
                        echo "暫無公告";
                    }
                ?>
			</table>
		</form>
	</div>
</body>
</html>
