<html>
<head>
	<title>管理系統</title>
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
	<?php session_start(); $librarianID = $_SESSION['librarianID']; ?>
	<h1 align="center">新增借閱</h1>
	<form action="run_insertj_borrow.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>libraryID</th>
			<td bgcolor="#FFFFFF"><input type="text" name="libraryID" value=""/></td>
		</tr>
		<tr>
		  <th>librarianID</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="librarianID" value="<?php echo $librarianID?>" readonly /></td>
		</tr>
		 <tr>
		  <th>journalID</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="journalID" value="" /></td>
		</tr>
		<tr>
		  <th colspan="2"><input type="submit" value="新增" class="delete-link"/></th>
		</tr>
	  </table>
	</form>
	
</body>
	
</html>
