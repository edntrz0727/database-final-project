<html>
<head>
	<title>媒體管理</title>
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
	
	<h1 align="center">借閱媒體紀錄</h1>
    <div align="center">
		<form action="searchm_borrow.php" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找libraryID">
			<button class="search-btn"></button>
		</form>
	</div>
	<p align="center"><a href="insertm_borrow.php">新增借閱</a></p>
	<table style="width:50%" align="center">
		<tr><th>libraryID</th><th>mediaID</th><th>state</th><th colspan="1">Action</th></tr>
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
				$sql = "SELECT * FROM m_borrow limit $count, 10";
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['libraryID']."</td>";
						echo "<td>".$row['mediaID']."</td>";
						echo "<td>".$row['state']."</td>";
						echo "<td><a href='updatem_borrow.php?id=".$row['mbID']."'>修改狀態</a></td>";
						echo "</tr>";
					}
				}
		?>
	</table>
    <br>
    <div id="move" class="move">
                <?php
                    if($page > 1){
                        echo "<form action='m_borrow.php?page=".($page-2)."&count=".($count-20)."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                ?>
                <?php echo $page ?>&ensp;
                <form action="m_borrow.php?page=<?php echo $page ?>&count=<?php echo $count ?>" method='post'>
                    <button>></button>
                </form>
        </div>
    <div id="back" align="center">
        <a href="media.php">返回</a>
    <div>
</body>
	
</html>	