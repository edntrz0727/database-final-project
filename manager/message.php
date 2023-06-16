<html>
<head>
	<title>公告管理</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
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
<body>
<div id="banner" class="banner" style="background-color:brown;">
			<p style="color: white; font-size: large;font-weight: bolder">三校資工圖書系統
</div>
<h3 align="center" style="color:brown">公告管理</h3>
    <div align="center">
		<form action="searchmessage.php" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找">
			<button class="search-btn"></button>
			<input type="radio" name="type" value="newID" checked>newID</input>
            <input type="radio" name="type" value="title">title</input>
            <input type="radio" name="type" value="postDate">postDate</input>
			<input type="radio" name="type" value="dueDate">dueDate</input>
		</form>
	</div>
    <p align="center"><a href="insertmessage.php">新增公告</a><p>
	<table style="width:50%" align="center">
		<tr><th>newsID</th><th>tilte</th><th>postDate</th><th>dueDate</th><th colspan="2">Action</th></tr>
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
				$sql = "SELECT * FROM news limit $count, 10";
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['newID']."</td>";
						echo "<td>".$row['title']."</td>";
						echo "<td>".$row['postDate']."</td>";
                        echo "<td>".$row['dueDate']."</td>";
						echo "<td><a href='updatemessage.php?id=".$row['newID']."'>修改</a></td>";
						echo "<td><a href='deletemessage.php?id=".$row['newID']."' class='delete-link'>刪除</a></td>";
						echo "</tr>";
					}
				}
                mysqli_close($conn);
		?>
	</table>
    <div id="move" class="move">
                <?php
                    if($page > 1){
                        echo "<form action='message.php?page=".($page-2)."&count=".($count-20)."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                ?>
                <?php echo $page ?>&ensp;
                <form action="message.php?page=<?php echo $page ?>&count=<?php echo $count ?>" method='post'>
                    <button>></button>
                </form>
        </div>
    <div id="back" align="center">
        <a href="managerindex.php">返回</a>
    <div>
</body>
	
</html>	