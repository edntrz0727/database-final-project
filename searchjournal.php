<html>
<head>
	<title>result</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
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
                $sql = "SELECT * FROM journal order by $type ASC limit $count, 10 ";
                $order = 1;
            }else if($order == 1){
                $sql = "SELECT * FROM journal order by $type DESC limit $count, 10 ";
                $order = 0;
            }
        }else{
            $sql = "SELECT * FROM journal where $type like '%$search%' limit $count, 10 ";
        }
        $result=mysqli_query($conn,$sql);
    ?>
	<h1 align="center">搜尋結果</h1>
    <div align="center">
		<form action="searchjournal.php?order=<?php echo $order;?>" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找關鍵字">
			<button class="search-btn"></button>
            <input type="radio" name="type" value="journalID" <?php if($type=="journalID"){echo "checked";}?>>journalID</input>
            <input type="radio" name="type" value="title" <?php if($type=="title"){echo "checked";} ?>>tilte</input>
            <input type="radio" name="type" value="subjecthead" <?php if($type=="subjecthead"){echo "checked";} ?>>subjecthead</input>
		</form>
	</div>
    <p align="center">
        <a href="insertjour.php">新增資料</a>
        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        <a href="j_borrow.php">借閱記錄</a>
    <p>
	<table style="width:50%" align="center">
		<tr><th>journalID</th><th>title</th><th>subjecthead</th><th colspan="2">Action</th></tr>
		<?php   
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['journalID']."</td>";
						echo "<td>".$row['title']."</td>";
						echo "<td>".$row['subjecthead']."</td>";
						echo "<td><a href='updatejournal.php?id=".$row['journalID']."'>查看</a></td>";
						echo "<td><a href='deletejournal.php?id=".$row['journalID']."' class='delete-link'>刪除</a></td>";
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
                        echo "<form action='searchjournal.php?page=".($page-2)."&count=".($count-20)."&type=".$type."&order=".$order."' method='post'>";
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
                        echo "<form action='searchjournal.php?page=".$page."&count=".$count."&type=".$type."&order=".$order."' method='post'>";
                        echo "<button>></button>";
                        echo "</form>";
                    }
                ?>
        </div>
    <div id="back" align="center">
        <a href="journal.php">返回</a>
    <div>
</body>
	
</html>	