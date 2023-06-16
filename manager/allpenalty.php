<html>
<head>
	<title>管理</title>
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
	<?php $libraryID = $_GET['libraryID']; ?>
	<h1 align="center">全罰款記錄</h1>
    <div align="center">
		<form action="searchpenalty.php?libraryID=<?php echo $libraryID;?>" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找penaltyID">
			<button class="search-btn"></button>
		</form>
	</div>
	<table style="width:50%" align="center">
		<tr><th>libraryID</th><th>detail</th><th>state</th></tr>
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
				$sql = "SELECT * FROM penalty where libraryID = '$libraryID' limit $count, 10";
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['libraryID']."</td>";
						echo "<td>".$row['detail']."</td>";
						echo "<td>".$row['state']."</td>";
						echo "</tr>";
					}
				}
                mysqli_close($conn);
		?>
	</table>
    <div id="move" class="move">
                <?php
                    if($page > 1){
                        echo "<form action='allpenalty.php?page=".($page-2)."&count=".($count-20)."&libraryID=".$libraryID."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                ?>
                <?php echo $page ?>&ensp;
                <form action="allpenalty.php?page=<?php echo $page ?>&count=<?php echo $count ?>&libraryID=<?php echo $libraryID ?>" method='post'>
                    <button>></button>
                </form>
        </div>
    <div id="back" align="center">
        <a href="readerdetail.php?id=<?php echo $libraryID;?>">返回</a>
    <div>
</body>
	
</html>	