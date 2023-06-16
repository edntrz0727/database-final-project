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
                $sql = "SELECT * FROM reader order by $type ASC limit $count, 10 ";
                $order = 1;
            }else if($order == 1){
                $sql = "SELECT * FROM reader order by $type DESC limit $count, 10 ";
                $order = 0;
            }
        }else{
            $sql = "SELECT * FROM reader where $type like '%$search%' limit $count, 10 ";
        }
        $result=mysqli_query($conn,$sql);
    ?>
	<h3 align="center" style="color:brown">搜尋結果</h3>
    <div align="center">
		<form action="searchreader.php?order=<?php echo $order;?>" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找謮者LibraryID">
			<button class="search-btn"></button>
            <input type="radio" name="type" value="libraryID" <?php if($type=="libraryID"){echo "checked";} ?>>libraryID</input>
            <input type="radio" name="type" value="name" <?php if($type=="name"){echo "checked";} ?>>name</input>
            <input type="radio" name="type" value="school" <?php if($type=="school"){echo "checked";} ?>>school</input>
		</form>
	</div>
    <p align="center"><a href="insertreader.html">新增讀者</a><p>
	<table style="width:50%" align="center">
		<tr><th>LibraryID</th><th>name</th><th>school</th><th colspan="2">Action</th></tr>
		<?php   
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
                        echo "<form action='searchreader.php?page=".($page-2)."&count=".($count-20)."&type=".$type."&order=".$order."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                    echo "$page&ensp;";
                    if($result->num_rows > 0){
                        echo "<form action='searchreader.php?page=".$page."&count=".$count."&type=".$type."&order=".$order."' method='post'>";
                        echo "<button>></button>";
                        echo "</form>";
                    }
                ?>
        </div>
    <div id="back" align="center">
        <a href="reader.php">返回</a>
    <div>
</body>
	
</html>	