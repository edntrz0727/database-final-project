<html>
<head>
	<title>三校資工領域圖書整合系統</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="https://kit.fontawesome.com/998bef7baf.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php
        session_start();
        
    ?>
	<div id="self_info">
		<li>
			<a href="user_info.php">會員資料</a>
		</li>
	</div>

	<div id="search">
		<input type="text" name="search" id="search" placeholder="輸入尋找書籍">
		<button class="search"><i class="fas fa-search"></i></button>
	</div>

	<div id="advanced search">
		<a href="adv_research.html">進階搜尋選項</a>
	</div>

	<div id="news">
		<form action="" method="get">	
			<h3>最新消息</h3>
			<table width="500" align="center"><!--css之後再說-->
				<tr>
					<td>發布時間</td>
					<td>內容</td>
				</tr>
			</table>
		</form>
	</div>
	
	<div id="sidebar">
		<h3>其他功能</h2>
		<ul>
			<li><a href="equip_reserve.html">設施預約</a></li>
			<li><a href="recommend.html">書籍推薦</a></li>
		</ul>
	</div>

</body>
	
</html>