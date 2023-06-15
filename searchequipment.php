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
                $sql = "SELECT * FROM equipment order by $type ASC limit $count, 10 ";
                $order = 1;
            }else if($order == 1){
                $sql = "SELECT * FROM equipment order by $type DESC limit $count, 10 ";
                $order = 0;
            }
        }else{
            $sql = "SELECT * FROM equipment where $type like '%$search%' limit $count, 10 ";
        }
        $result=mysqli_query($conn,$sql);
    ?>
	<h1 align="center">搜尋結果</h1>
    <div align="center">
		<form action="searchequipment.php?order=<?php echo $order;?>" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找">
			<button class="search-btn"></button>
            <input type="radio" name="type" value="equipID" <?php if($type=="equipID"){echo "checked";} ?>>equipID</input>
            <input type="radio" name="type" value="name" <?php if($type=="name"){echo "checked";} ?>>name</input>
            <input type="radio" name="type" value="Lname" <?php if($type=="Lname"){echo "checked";} ?>>place</input>
            <input type="radio" name="type" value="state" <?php if($type=="state"){echo "checked";} ?>>state</input>
		</form>
	</div>
    <p align="center"><a href="insertequipment.php">新增設施</a><p>
	<table style="width:50%" align="center">
		<tr><th>name</th><th>palce</th><th>state</th><th colspan="2">Action</th></tr>
		<?php   
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
                    if($order == 1){
                        $order = 0;
                    }else{
                        $order = 1;
                    }
                    if($page > 1){
                        echo "<form action='searchequipment.php?page=".($page-2)."&count=".($count-20)."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                    echo "$page&ensp;";
                    if($result->num_rows == 0){
                        echo "<form action='searchequipment.php?page=".$page."&count=".$count."' method='post'>";
                        echo "<button>></button>";
                        echo "</form>";
                    }
                ?>
        </div>
    <div id="back" align="center">
        <a href="equipment.php">返回</a>
    <div>
</body>
	
</html>	