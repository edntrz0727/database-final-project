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
<div id="banner" class="banner" style="background-color:brown;">
			<p style="color: white; font-size: large;font-weight: bolder">三校資工圖書系統
</div>
	<?php  $libraryID=$_GET['libraryID']; ?>
	<h3 align="center" style="color:brown">搜尋結果</h3>
    <div align="center">
		<form action="searchb_borrow.php??libraryID=<?php echo $libraryID;?>" method="post">
			<input class="search-bar" type="text" name="search" placeholder="輸入尋找公告ID">
			<button class="search-btn"></button>
		</form>
	</div>
	<table style="width:50%" align="center">
		<tr><th>bbID</th><th>ISBN</th><th>state</th></tr>
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
                    header("location:allb_borrow.php?libraryID=$libraryID");
                }else{
                    $sql = "SELECT * FROM b_borrow where bbID like '%$search%' and libraryID = '$libraryID' limit $count, 10 ";
                }
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['bbID']."</td>";
						echo "<td>".$row['ISBN']."</td>";
						echo "<td>".$row['state']."</td>";
						echo "</tr>";
					}
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
                        echo "<form action='searchb_borrow.php?page=".($page-2)."&count=".($count-20)."&libraryID=".$libraryID."' method='post'>";
                        echo "<button><</button>&ensp;";
                        echo "</form>";
                    }
                    echo "$page&ensp;";
                    if($result->num_rows == 10){
                        echo "<form action='searchb_borrow.php?page=".$page."&count=".$count."&libraryID=".$libraryID."' method='post'>";
                        echo "<button>></button>";
                        echo "</form>";
                    }
                ?>
        </div>
    <div id="back" align="center">
        <a href="allb_borrow.php?libraryID=<?php echo $libraryID;?>">返回</a>
    <div>
</body>
	
</html>	