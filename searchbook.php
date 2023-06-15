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
                $sql = "SELECT * FROM book order by $type ASC limit $count, 10 ";
                $order = 1;
            }else if($order == 1){
                $sql = "SELECT * FROM book order by $type DESC limit $count, 10 ";
                $order = 0;
            }
        }else{
            $sql = "SELECT * FROM book where $type like '%$search%' limit $count, 10 ";
        }
        $result=mysqli_query($conn,$sql);
    ?>
	<h3 align="center" style="color:brown">搜尋結果</h3>
    <div align="center">
		<form action="searchbook.php?order=<?php echo $order; ?>" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找書籍">
			<button class="search-btn"></button>
            <input type="radio" name="type" value="ISBN" <?php if($type=="ISBN"){echo "checked";} ?>>ISBN</input>
            <input type="radio" name="type" value="title" <?php if($type=="title"){echo "checked";} ?>>tilte</input>
            <input type="radio" name="type" value="subjecthead" <?php if($type=="subjecthead"){echo "checked";} ?>>subjecthead</input>
            <input type="radio" name="type" value="state" <?php if($type=="state"){echo "checked";} ?>>state</input>
		</form>
	</div>
    <p align="center"><a href="insertbk.php">新增資料</a><p>
	<table style="width:50%" align="center">
		<tr><th>ISBN</th><th>title</th><th>writer</th><th>state</th><th colspan="2">Action</th></tr>
		<?php   
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['ISBN']."</td>";
						echo "<td>".$row['title']."</td>";
						echo "<td>".$row['writer']."</td>";
                        echo "<td>".$row['state']."</td>";
						echo "<td><a href='updatebook.php?id=".$row['ISBN']."'>修改</a></td>";
						echo "<td><a href='deletebook.php?id=".$row['ISBN']."' class='delete-link''>刪除</a></td>";
						echo "</tr>";
					}
				}
                mysqli_close($conn);
		?>
	</table>
    <div id="move" class="move">
                <?php
                    if($page > 1){
                        if($order == 1){
                            $order = 0;
                        }else{
                            $order = 1;
                        }
                        echo "<form action='searchbook.php?page=".($page-2)."&count=".($count-20)."&order=".$order."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                    echo "$page&ensp;";
                    if($result->num_rows == 10){
                        if($order == 1){
                            $order = 0;
                        }else{
                            $order = 1;
                        }
                        echo "<form action='searchbook.php?page=".$page."&count=".$count."&type=".$type."&order=".$order."' method='post'>";
                        echo "<button>></button>";
                        echo "</form>";
                    }
                ?>
        </div>
    <div id="back" align="center">
        <a href="book.php">返回</a>
    <div>
</body>
	
</html>	