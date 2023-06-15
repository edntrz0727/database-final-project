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
<body>
    <?php
        $conn=require_once "db_info.php";
        $penallyID=$_GET["id"];
        $sql = "SELECT * FROM penalty where penallyID = '$penallyID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $librarianID = $row['librarianID'];
        $libraryID = $row['libraryID'];
        $detail = $row['detail'];
        $state = $row['state'];
    ?>
<h1 align="center">修改罰則狀態</h1>
	<form action="run_updatepenally.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>penallyID</th>
			<td bgcolor="#FFFFFF"><input type="text" name="penallyID" value="<?php echo $penallyID; ?>" readonly/></td>
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
		  <th>detail</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="detail" value="<?php echo $detail; ?>" /></td>
		</tr>
        <tr>
		  <th>state</th>
		  <td bgcolor="#FFFFFF">
            <input type="radio" name="state" value="已交付" <?php if($state=="已交付"){echo "checked";} ?>/>已交付</input>
            <input type="radio" name="state" value="沒交付" <?php if($state=="沒交付"){echo "checked";} ?>/>沒交付</input>
          </td>
		</tr>
		<tr>
		  <th colspan="2">
            <div class="move">
                <input type="submit" value="修改"/>
            </div>
          </th>
		</tr>
	  </table>
</form>
</body>
</html>