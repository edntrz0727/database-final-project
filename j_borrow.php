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
<body>
	
	<h1 align="center">借閱雜誌紀錄</h1>
    <div align="center">
		<form action="searchj_borrow.php" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找libraryID">
			<button class="search-btn"></button>
		</form>
	</div>
	<p align="center"><a href="insertj_borrow.php">新增借閱</a></p>
	<table style="width:50%" align="center">
		<tr><th>libraryID</th><th>journalID</th><th>state</th><th colspan="1">Action</th></tr>
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
				$sql = "SELECT * FROM j_borrow limit $count, 10";
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['libraryID']."</td>";
						echo "<td>".$row['journalID']."</td>";
						echo "<td>".$row['state']."</td>";
						echo "<td><a href='updatej_borrow.php?id=".$row['jbID']."'>修改狀態</a></td>";
						echo "</tr>";
					}
				} else {
					echo "0 results";
				}
		?>
	</table>
    <br>
    <div id="move" class="move">
                <?php
                    if($page > 1){
                        echo "<form action='j_borrow.php?page=".($page-2)."&count=".($count-20)."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                ?>
                <?php echo $page ?>&ensp;
                <form action="j_borrow.php?page=<?php echo $page ?>&count=<?php echo $count ?>" method='post'>
                    <button>></button>
                </form>
        </div>
    <div id="back" align="center">
        <a href="journal.php">返回</a>
    <div>
</body>
	
</html>	