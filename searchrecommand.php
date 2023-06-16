<html>
<head>
	<title>result</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
    body{
        width: 100%;
        height: 100%;
        background-color: antiquewhite;
        text-align:center;
    }
	table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	}
	th, td {
	padding: 5px;
	text-align: left;    
	}
    .move{
        display: flex;
        justify-content: center;
    }
</style>
<script>
	document.addEventListener('DOMContentLoaded', function() {
        var deleteLinks = document.querySelectorAll('.delete-link');
        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                var check = confirm('確認刪除');
                if (check === false) {
                    event.preventDefault(); // 取消默认行为，阻止链接的跳转
                }
            });
        });
    });
</script>
<body>
    <div id="banner" class="banner" style="background-color:brown;">
                <p style="color: white; font-size: large;font-weight: bolder">三校資工圖書系統
    </div>
	<h3 align="center" style="color:brown">搜尋結果</h3>
    <div align="center">
		<form action="searchrecommand.php" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找設施ID">
			<button class="search-btn"></button>
		</form>
	</div>
    <p align="center"><a href="insertrecommand.html">新增推薦</a><p>
	<table style="width:50%" align="center">
		<tr><th>ISBN</th><th>title</th><th>description</th><th colspan="2">Action</th></tr>
		<?php   
                if (isset($_GET['count']) && $_GET['count'] !== '' || isset($_GET['page']) && $_GET['page'] !== '' ){
                    $count = $_GET['count'] + 10;
                    $page = $_GET['page'] + 1;
                }else{
                    $count = 0;
                    $page = 1;
                }
                $countnull = 0;
				$conn=require_once "db_info.php";
                $search=$_POST["search"];
                if($search == ''){
                    $countnull = 1;
                    header("location:recommand.php");
                }else{
                    $sql = "SELECT * FROM mouthlist where ISBN like '%$search%' limit $count, 10 ";
                }
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['ISBN']."</td>";
						echo "<td>".$row['title']."</td>";
                        echo "<td>".$row['description']."</td>";
						echo "<td><a href='updaterecommand.php?id=".$row['ISBN']."'>修改</a></td>";
                        echo "<td><a href='deleterecommand.php?id=".$row['ISBN']."' class='delete-link''>刪除</a></td>";
						echo "</tr>";
					}
				}
                mysqli_close($conn);
		?>
	</table>
    <div id="move" class="move">
                <?php
                    if($order == 1){
                        $order = 0;
                    }else{
                        $order = 1;
                    }
                    if($page > 1){
                        echo "<form action='searchrecommand.php?page=".($page-2)."&count=".($count-20)."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                    echo "$page&ensp;";
                    if($result->num_rows == 0){
                        echo "<form action='searchrecommand.php?page=".$page."&count=".$count."' method='post'>";
                        echo "<button>></button>";
                        echo "</form>";
                    }
                ?>
        </div>
    <div id="back" align="center">
        <a href="recommand.php">返回</a>
    <div>
</body>
	
</html>	