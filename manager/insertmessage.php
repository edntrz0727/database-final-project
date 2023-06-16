<html>
<head>
	<title>公告管理系統</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script>
	document.addEventListener('DOMContentLoaded', function() {
        var deleteLinks = document.querySelectorAll('.delete-link');
        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                var check = confirm('確認新增');
                if (check === false) {
                    event.preventDefault(); // 取消默认行为，阻止链接的跳转
                }
            });
        });
    });
</script>
<body>
	<h1 align="center">新增公告</h1>
	<form action="run_insertmessage.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
		  <th>librarianID</th>
		  <td bgcolor="antiquewhite"><input type="text" name="librarianID" value="<?php session_start();echo $_SESSION['librarianID']; ?>" readonly /></td>
		</tr>
		<tr>
		  <th>title</th>
		  <td bgcolor="antiquewhite"><input type="text" name="title"  /></td>
		</tr>
		<tr>
		  <th>postDate</th>
		  <td bgcolor="antiquewhite"><input type="text" name="postDate" value="<?php echo date("Y-m-d");?>" /></td>
		</tr>
        <tr>
            <th>dueDate</th>
            <td bgcolor="antiquewhite"><input type="text" name="dueDate" placeholder="以yyyy-mm-dd格式輸入"/></td>
          </tr>
          <tr>
            <th>text</th>
            <td bgcolor="antiquewhite"><textarea name="text" style="width: 100%; height: 200px; resize: none; padding: 5px; box-sizing: border-box;"></textarea></td>
          </tr>
          <tr>
            <th>tag</th>
            <td bgcolor="antiquewhite"><input type="text" name="tag"  /></td>
          </tr>
		<tr>
		  <th colspan="2"><input type="submit" value="新增" class="delete-link"/></th>
		</tr>
	  </table>
	</form>
</body>
	
</html>
