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
	<?php
        if (isset($_GET['count']) && $_GET['count'] !== '' || isset($_GET['page']) && $_GET['page'] !== '' ){
            $count = $_GET['count'] + 10;
            $page = $_GET['page'] + 1;
        }else{
            $count = 0;
            $page = 1;
        }
        $conn=require_once "db_info.php";
        $search=$_POST["search"];
        $order = $_GET["order"];
        if($order == ''){
            $order = 0;
        }
        $type = $_GET["type"];
        if($type == ''){
            $type=$_POST["type"];
        }
        if($search == ''){
            if($order == 0){
                $sql = "SELECT * FROM db order by $type ASC limit $count, 10 ";
                $order = 1;
            }else if($order == 1){
                $sql = "SELECT * FROM db order by $type DESC limit $count, 10 ";
                $order = 0;
            }
        }else{
            $sql = "SELECT * FROM db where $type like '%$search%' limit $count, 10 ";
        }
        $result=mysqli_query($conn,$sql);
    ?>
	<h3 align="center" style="color:brown">搜尋結果</h3>
    <div align="center">
		<form action="searchdb.php?order=<?php echo $order;?>" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找db關鍵字">
			<button class="search-btn"></button>
            <input type="radio" name="type" value="databaseID" <?php if($type=="databaseID"){echo "checked";}?>>journalID</input>
            <input type="radio" name="type" value="title" <?php if($type=="title"){echo "checked";} ?>>tilte</input>
		</form>
	</div>
    <p align="center">
        <a href="insertdb.php">新增資料</a>
        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        <a href="buy.php">借閱記錄</a>
    <p>
	<table style="width:50%" align="center">
		<tr><th>databaseID</th><th>title</th><th>company</th><th colspan="2">Action</th></tr>
		<?php   
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['databaseID']."</td>";
						echo "<td>".$row['title']."</td>";
						echo "<td>".$row['company']."</td>";
						echo "<td><a href='updatedb.php?id=".$row['databaseID']."'>查看</a></td>";
						echo "<td><a href='deletedb.php?id=".$row['databaseID']."' oncick='return check()'>刪除</a></td>";
						echo "</tr>";
					}
				} else {
					echo "0 results";
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
                        echo "<form action='searchdb.php?page=".($page-2)."&count=".($count-20)."&type=".$type."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                    echo "$page&ensp;";
                    if($result->num_rows == 10){
                        echo "<form action='searchdb.php?page=".$page."&count=".$count."&type=".$type."' method='post'>";
                        echo "<button>></button>";
                        echo "</form>";
                    }
                ?>
        </div>
    <div id="back" align="center">
        <a href="db.php">返回</a>
    <div>
</body>
	
</html>	