<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>讀者管理系統</title>
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
        $bbID=$_GET["id"];
        $sql = "SELECT * FROM b_borrow where bbID = '$bbID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $librarianID = $row['librarianID'];
        $libraryID = $row['libraryID'];
        $ISBN = $row['ISBN'];
        $state = $row['state'];
    ?>
<h1 align="center">修改借閱狀態</h1>
	<form action="run_updateb_borrow.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>bbID</th>
			<td bgcolor="#FFFFFF"><input type="text" name="bbID" value="<?php echo $bbID; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>librarianID</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="librarianID" value="<?php echo $librarianID; ?>" readonly/></td>
		</tr>
		 <tr>
		  <th>libraryID</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="libraryID" value="<?php echo $libraryID; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>ISBN</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="ISBN" value="<?php echo $ISBN; ?>" readonly/></td>
		</tr>
        <tr>
		  <th>state</th>
		  <td bgcolor="#FFFFFF">
            <input type="radio" name="state" value="借閱中" <?php if($state=="借閱中"){echo "checked";} ?>/>借閱中</input>
            <input type="radio" name="state" value="已過期" <?php if($state=="已過期"){echo "checked";} ?>/>已過期</input>
            <input type="radio" name="state" value="已還書" <?php if($state=="已還書"){echo "checked";} ?>/>已還書</input>
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