<html>
<head>
	<title>設施管理</title>
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
	
	<h1 align="center">設施管理系統</h1>
    <div align="center">
		<form action="searchequipment.php" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找設施ID">
			<button class="search-btn"></button>
			<input type="radio" name="type" value="equipID" checked>equipID</input>
            <input type="radio" name="type" value="name">name</input>
            <input type="radio" name="type" value="Lname">place</input>
			<input type="radio" name="type" value="state">state</input>
		</form>
	</div>
    <p align="center"><a href="insertequipment.php">新增設施</a><p>
	<table style="width:50%" align="center">
		<tr><th>name</th><th>place</th><th>state</th><th colspan="2">Action</th></tr>
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
				$sql = "SELECT * FROM equipment limit $count, 10";
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['Lname']."</td>";
						echo "<td>".$row['state']."</td>";
						echo "<td><a href='updateequip.php?id=".$row['equipID']."'>修改</a></td>";
						echo "<td><a href='deleteequip.php?id=".$row['equipID']."' class='delete-link''>刪除</a></td>";
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
                        echo "<form action='equipment.php?page=".($page-2)."&count=".($count-20)."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                ?>
                <?php echo $page ?>&ensp;
                <form action="equipment.php?page=<?php echo $page ?>&count=<?php echo $count ?>" method='post'>
                    <button>></button>
                </form>
        </div>
    <div id="back" align="center">
        <a href="managerindex.php">返回</a>
    <div>
</body>
	
</html>	