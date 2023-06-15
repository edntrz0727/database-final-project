<html>
<head>
	<title>DB管理系統</title>
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
	
	<h1 align="center">新增DB資料</h1>
	<form action="insertdatabase.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
	  	<tr>
		  <th>databaseID</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="databaseID" value="" placeholder="只有新增地點才要墳" /></td>
		</tr>
		<tr>
		  <th>title</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="title" value="" /></td>
		</tr>
        <tr>
		  <th>company</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="company" value="" /></td>
		</tr>
        <tr>
		  <th>url</th>
		  <td bgcolor='#FFFFFF'><input type="text" name="url" value="" /></td>
		</tr>
        <tr>
		  <th>year</th>
		  <td bgcolor='#FFFFFF'><input type="text" name="year" value="" /></td>
		</tr>
		<tr>
		  <th>description</th>
			<td bgcolor='#FFFFFF'><textarea name="description" style="width: 100%; height: 200px; resize: none; padding: 5px; box-sizing: border-box;"></textarea></td>
	    </tr>
		 <tr>
		  <th>Lname</th>
        <td bgcolor='#FFFFFF'>
          <?php
                $conn=require_once "db_info.php";
                $sql = "SELECT * FROM library";
                $result=mysqli_query($conn,$sql);
                if ($result->num_rows > 0) {	
                    while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
                        echo "<input type='radio' name='Lname' value='".$row['Lname']."'/>".$row['Lname']."</input><br>";
                    }
                } 
                mysqli_close($conn);
            ?>
         </td>
		</tr>
		<tr>
		  <th colspan="2"><input type="submit" value="新增" class="delete-link"/></th>
		</tr>
	  </table>
	</form>
	
</body>
	
</html>
