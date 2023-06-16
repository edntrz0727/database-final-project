<html>
<head>
	<title>雜誌管理</title>
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
	function check(){
		var check = confirm('確認刪除');
		if(check === false){
			return false;
		}
	}
</script>
<body>
	
	<h1 align="center">雜誌管理系統</h1>
    <div align="center">
		<form action="searchjournal.php" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找關鍵字">
			<button class="search-btn"></button>
            <input type="radio" name="type" value="journalID" checked>journalID</input>
            <input type="radio" name="type" value="title" >tilte</input>
            <input type="radio" name="type" value="subjecthead">subjecthead</input>
		</form>
	</div>
    <p align="center">
        <a href="insertjour.php">新增雜誌</a>
        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        <a href="j_borrow.php">借閱記錄</a>
    </p>
	<table style="width:50%" align="center">
		<tr><th>journalID</th><th>title</th><th>subjecthead</th><th colspan="2">Action</th></tr>
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
				$sql = "SELECT * FROM journal limit $count, 10";
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['journalID']."</td>";
						echo "<td>".$row['title']."</td>";
						echo "<td>".$row['subjecthead']."</td>";
						echo "<td><a href='updatejournal.php?id=".$row['journalID']."'>查看</a></td>";
						echo "<td><a href='deletejournal.php?id=".$row['journalID']."' onclick='return check();'>刪除</a></td>";
						echo "</tr>";
					}
				}
		?>
	</table>
    <br>
    <div id="move" class="move">
                <?php
                    if($page > 1){
                        echo "<form action='journal.php?page=".($page-2)."&count=".($count-20)."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                ?>
                <?php echo $page ?>&ensp;
                <form action="journal.php?page=<?php echo $page ?>&count=<?php echo $count ?>" method='post'>
                    <button>></button>
                </form>
        </div>
        </table>
    <div id="back" align="center">
        <a href="checksource.html">返回</a>
    <div>
</body>
	
</html>	