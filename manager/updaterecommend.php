<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>讀者管理系統</title>
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
                var check = confirm('確認修改');
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
<h3 align="center" style="color:brown">修改推薦</h3>
    <?php
        $conn=require_once "db_info.php";
        $ISBN=$_GET["id"];
        $sql = "SELECT * FROM mouthlist where ISBN = '$ISBN'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $description = $row['description'];
        $detail = $row['detail'];
        $state = $row['state'];
    ?>

	<form action="run_updaterecommand.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>ISBN</th>
			<td bgcolor="antiquewhite"><input type="text" name="ISBN" value="<?php echo $ISBN; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>title</th>
		  <td bgcolor="antiquewhite"><input type="text" name="title" value="<?php echo $title; ?>"/></td>
		</tr>
		 <tr>
		  <th>description</th>
		  <td bgcolor="antiquewhite"><textarea name="description" style="width: 100%; height: 200px; resize: none; padding: 5px; box-sizing: border-box;"><?php echo $description;?></textarea></td>
		</tr>
		<tr>
		  <th colspan="2">
            <div class="move">
                <input type="submit" value="修改" class="delete-link"/>
            </div>
          </th>
		</tr>
	  </table>
</form>
</body>
</html>