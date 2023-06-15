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
<body>
	
	<h1 align="center">搜尋結果</h1>
    <div align="center">
		<form action="searchallreciverecommand.php" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找設施ID">
			<button class="search-btn"></button>
		</form>
	</div>
	<table style="width:50%" align="center">
		<tr><th>recommendID</th><th>state</th><th>date</th></tr>
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
                    header("location:allreciverecommand.php");
                }else{
                    $sql = "SELECT * FROM manage where recommendID like '%$search%' limit $count, 10 ";
                }
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['recommendID']."</td>";
						echo "<td>".$row['state']."</td>";
                        echo "<td>".$row['senddate']."</td>";
						echo "</tr>";
					}
				} 
                mysqli_close($conn);
		?>
	</table>
    <div id="move" class="move">
                <?php
                    if($page > 1){
                        echo "<form action='searchallreciverecommand.php?page=".($page-2)."&count=".($count-20)."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                    echo "$page&ensp;";
                    if($result->num_rows == 0){
                        echo "<form action='searchallreciverecommand.php?page=".$page."&count=".$count."' method='post'>";
                        echo "<button>></button>";
                        echo "</form>";
                    }
                ?>
        </div>
    <div id="back" align="center">
        <a href="reciverecommand.php">返回</a>
    <div>
</body>
	
</html>	