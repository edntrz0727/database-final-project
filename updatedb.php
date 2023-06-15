<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DB管理系統</title>
</head>
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
    <?php
        $conn=require_once "db_info.php";
        $databaseID=$_GET["id"];
        $sql = "SELECT * FROM db where databaseID = '$databaseID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $company = $row['company'];
        $url = $row['url'];
        $year = $row['year'];
        $description = $row['description'];
        mysqli_close($conn);
    ?>
<h1 align="center">修改db資料</h1>
	<form action="run_updatedb.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>databaseID</th>
			<td bgcolor="#FFFFFF"><input type="text" name="databaseID" value="<?php echo $databaseID; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>title</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="title" value="<?php echo $title; ?>" /></td>
		</tr>
		<tr>
		  <th>company</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="company" value="<?php echo $company; ?>" /></td>
		</tr>
        <tr>
		  <th>url</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="url" value="<?php echo $url ?>"/></td>
		</tr>
        <tr>
		  <th>year</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="year" value="<?php echo $year; ?>" /></td>
		</tr>
        <tr>
		  <th>description</th>
		  <td bgcolor="#FFFFFF"><textarea name="description" style="width: 100%; height: 200px; resize: none; padding: 5px; box-sizing: border-box;"><?php echo $description; ?></textarea></td>
		</tr>
		<tr>
		  <th colspan="2"><input type="submit" value="更新" class="delete-link"/></th>
		</tr>
	  </table>
	</form>
</body>
</html>