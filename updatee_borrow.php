<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>設施管理系統</title>
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
        $ebID=$_GET["id"];
        $sql = "SELECT * FROM e_borrow where ebID = '$ebID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $librarianID = $row['librarianID'];
        $libraryID = $row['libraryID'];
        $equipID = $row['equipID'];
        $state = $row['state'];
    ?>
<h1 align="center">修改狀態</h1>
	<form action="run_updatee_borrow.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>ebID</th>
			<td bgcolor="#FFFFFF"><input type="text" name="bbID" value="<?php echo $ebID; ?>" readonly/></td>
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
		  <th>equipID</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="equipID" value="<?php echo $equipID; ?>" readonly/></td>
		</tr>
        <tr>
		  <th>state</th>
		  <td bgcolor="#FFFFFF">
            <input type="radio" name="state" value="借閱中" <?php if($state=="借閱中"){echo "checked";} ?>/>借閱中</input>
            <input type="radio" name="state" value="已超時" <?php if($state=="已超時"){echo "checked";} ?>/>已過期</input>
            <input type="radio" name="state" value="已還書" <?php if($state=="已還書"){echo "checked";} ?>/>已還</input>
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