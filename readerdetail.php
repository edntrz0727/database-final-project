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
        $libraryID=$_GET["id"];
        $sql = "SELECT * FROM reader where libraryID = '$libraryID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $libraryID = $row['libraryID'];
        $studentID = $row['studentID'];
        $name = $row['name'];
        $school = $row['school'];
        $password = $row['password'];
        $phone = $row['phone'];
        $address = $row['address'];
        $email = $row['email'];
    ?>
<h1 align="center">修改讀者資料</h1>
	<form action="run_updatereader.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>libraryID</th>
			<td bgcolor="#FFFFFF"><input type="text" name="libraryID" value="<?php echo $libraryID; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>studentID</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="studentID" value="<?php echo $studentID; ?>" /></td>
		</tr>
		 <tr>
		  <th>name</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="name" value="<?php echo $name; ?>" /></td>
		</tr>
		<tr>
		  <th>school</th>
		  <td bgcolor="#FFFFFF">
			<input type="radio" name="school" value="ntu" <?php if($school=='ntu'){echo "checked";}?>>ntu</input>
			<input type="radio" name="school" value="ntnu" <?php if($school=='ntnu'){echo "checked";}?>>ntnu</input>
			<input type="radio" name="school" value="ntust" <?php if($school=='ntust'){echo "checked";}?>>ntust</input>
		</td>
		</tr>
        <tr>
		  <th>password</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="password" value="<?php echo $password; ?>" /></td>
		</tr>
        <tr>
		  <th>phone</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="phone" value="<?php echo $phone; ?>" /></td>
		</tr>
        <tr>
		  <th>address</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="address" value="<?php echo $address; ?>" /></td>
		</tr>
        <tr>
		  <th>email</th>
          <td bgcolor="#FFFFFF"><input type="text" name="email" value="<?php echo $email; ?>" /></td> 
        </td>
		</tr>
		<tr>
		  	<th colspan="2">
			  <div class="move">
				<input type="submit" value="更新" class="delete-link"/>
			  </div>
			</th>
		</tr>
	  </table>
    </form>
    <br>
    <h1 align="center">罰款狀態</h1>
    <p align="center"><a href="allpenalty.php?libraryID=<?php echo $libraryID?>">全罰款記錄</a><p> <!--新增罰款 MYSQL 自動化-->
	<table style="width:50%" align="center">
		<tr><th>LibrarianID</th><th>detail</th><th>state</th><th colspan="1">Action</th></tr>
		<?php   
				$libraryID=$_GET["id"];
				$sql = "SELECT * FROM penalty where state = '沒交付' and libraryID = '$libraryID'";
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['librarianID']."</td>";
						echo "<td>".$row['detail']."</td>";
						echo "<td>".$row['state']."</td>";
						echo "<td><a href='updatepenally.php?id=".$row['penallyID']."'>修改狀態</a></td>";
						echo "</tr>";
					}
				}
		?>
	</table>
    <br>
    <h1 align="center">借閱書籍</h1>
    <p align="center">
		<a href="allb_borrow.php?libraryID=<?php echo $libraryID?>">全借閱記錄</a>
		&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
		<a href="insertb_borrow.php?libraryID=<?php echo $libraryID?>">新增借閱</a>
	<p>
	<table style="width:50%" align="center">
		<tr><th>LibrarianID</th><th>ISBN</th><th>state</th><th colspan="1">Action</th></tr>
		<?php   
				$libraryID=$_GET["id"];
				$sql = "SELECT * FROM b_borrow where state = '借閱中' and libraryID = '$libraryID'";
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['librarianID']."</td>";
						echo "<td>".$row['ISBN']."</td>";
						echo "<td>".$row['state']."</td>";
						echo "<td><a href='updateb_borrow.php?id=".$row['bbID']."'>修改狀態</a></td>";
						echo "</tr>";
					}
				}
		?>
	</table>
	<br>
	<h1 align="center">借閱設施</h1>
    <p align="center">
		<a href="alle_borrow.php?libraryID=<?php echo $libraryID?>">全借閱記錄</a>
		&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
		<a href="inserte_borrow.php?libraryID=<?php echo $libraryID?>">新增借閱</a>
	<p>
	<table style="width:50%" align="center">
		<tr><th>LibrarianID</th><th>equipID</th><th>state</th><th colspan="1">Action</th></tr>
		<?php   
				$libraryID=$_GET["id"];
				$sql = "SELECT * FROM e_borrow where state = '借閱中' and libraryID = '$libraryID'";
                $result=mysqli_query($conn,$sql);
				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						echo "<tr>";
						echo "<td>".$row['librarianID']."</td>";
						echo "<td>".$row['equipID']."</td>";
						echo "<td>".$row['state']."</td>";
						echo "<td><a href='updatee_borrow.php?id=".$row['ebID']."'>修改狀態</a></td>";
						echo "</tr>";
					}
				}
		?>
	</table>
    <div id="back" align="center">
        <a href="reader.php">返回</a>
    <div>
</body>
</html>