<html>
<head>
	<title>db管理</title>
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
	
	<h1 align="center">DB管理系統</h1>
    <div align="center">
		<form action="searchbuy.php" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找databaseID">
			<button class="search-btn"></button>
		</form>
	</div>
	<table style="width:50%" align="center">
		<tr><th>buyID</th><th>databaseID</th><th>Lname</th><th colspan="1">Action</th></tr>
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
				$sql = "SELECT * FROM buy limit $count, 10";
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['buyID']."</td>";
						echo "<td>".$row['databaseID']."</td>";
						echo "<td>".$row['Lname']."</td>";
						echo "<td><a href='updatebuy.php?id=".$row['buyID']."'>修改</a></td>";
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
                        echo "<form action='buy.php?page=".($page-2)."&count=".($count-20)."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                ?>
                <?php echo $page ?>&ensp;
                <form action="buy.php?page=<?php echo $page ?>&count=<?php echo $count ?>" method='post'>
                    <button>></button>
                </form>
        </div>
        </table>
    <div id="back" align="center">
        <a href="db.php">返回</a>
    <div>
</body>
	
</html>	