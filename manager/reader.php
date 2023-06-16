<html>
<head>
	<title>讀者管理</title>
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
	
	<h1 align="center">讀者管理系統</h1>
    <div align="center">
		<form action="searchreader.php" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找">
			<button class="search-btn"></button>
			<input type="radio" name="type" value="libraryID" checked>libraryID</input>
            <input type="radio" name="type" value="name">name</input>
            <input type="radio" name="type" value="school">school</input>
		</form>
	</div>
    <p align="center"><a href="insertreader.html">新增資料</a><p>
	<table style="width:50%" align="center">
		<tr><th>LibraryID</th><th>name</th><th>school</th><th colspan="2">Action</th></tr>
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
				$sql = "SELECT * FROM reader limit $count, 10";
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['libraryID']."</td>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['school']."</td>";
						echo "<td><a href='updatereader.php?id=".$row['libraryID']."'>修改權限</a></td>";
						echo "<td><a href='readerdetail.php?id=".$row['libraryID']."'>查看詳細</a></td>";
						echo "</tr>";
					}
				}
                mysqli_close($conn);
		?>
	</table>
    <div id="move" class="move">
                <?php
                    if($page > 1){
                        echo "<form action='reader.php?page=".($page-2)."&count=".($count-20)."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                ?>
                <?php echo $page ?>&ensp;
                <form action="reader.php?page=<?php echo $page ?>&count=<?php echo $count ?>" method='post'>
                    <button>></button>
                </form>
        </div>
    <div id="back" align="center">
        <a href="managerindex.php">返回</a>
    <div>
</body>
	
</html>	