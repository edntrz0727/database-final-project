<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>讀者管理系統</title> <!-- mysql 自動化同步預約-->
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
                var check = confirm('確認新增');
                if (check === false) {
                    event.preventDefault(); // 取消默认行为，阻止链接的跳转
                }
            });
        });
    });
</script>
<body>
<h1 align="center">新增設施</h1>
	<form action="insertequip.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
		  <th>name</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="name" value="" /></td>
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
		  <th>state</th>
		  <td bgcolor="#FFFFFF">
            <input type="radio" name="state" value="空閒"/>空閒</input>
            <input type="radio" name="state" value="使用中"/>使用中</input>
            <input type="radio" name="state" value="已預約"/>已預約</input>
            <input type="radio" name="state" value="維修中"/>維修中</input>
          </td>
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