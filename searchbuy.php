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
<h3 align="center" style="color:brown">搜尋結果</h3>
    <div align="center">
		<form action="searchbuy.php" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找databaseID">
			<button class="search-btn"></button>
		</form>
	</div>
	<table style="width:50%" align="center">
		<tr><th>buy</th><th>databaseID</th><th>Lname</th><th colspan="1">Action</th></tr>
		<?php   
                if (isset($_GET['count']) && $_GET['count'] !== '' || isset($_GET['page']) && $_GET['page'] !== '' ){
                    $count = $_GET['count'] + 10;
                    $page = $_GET['page'] + 1;
                }else{
                    $count = 0;
                    $page = 1;
                }
                $countnull = 0;
				$conn=require_once "db_info.php";
                $search=$_POST["search"];
                if($search == ''){
                    $countnull = 1;
                    header("location:buy.php");
                }else{
                    $sql = "SELECT * FROM buy where databaseID like '%$search%' limit $count, 10 ";
                }
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
                mysqli_close($conn);
		?>
	</table>
    <div id="move" class="move">
                <?php
                    if($page > 1){
                        echo "<form action='searchbuy.php?page=".($page-2)."&count=".($count-20)."&type=".$type."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                    echo "$page&ensp;";
                    if($result->num_rows == 10){
                        echo "<form action='searchbuy.php?page=".$page."&count=".$count."&type=".$type."' method='post'>";
                        echo "<button>></button>";
                        echo "</form>";
                    }
                ?>
        </div>
    <div id="back" align="center">
        <a href="checksource.html">返回</a>
    <div>
</body>
	
</html>	