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
<body>
<div id="banner" class="banner" style="background-color:brown;">
			<p style="color: white; font-size: large;font-weight: bolder">三校資工圖書系統
</div>
<h3 align="center" style="color: brown;">修改罰款狀態</h3>
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

	<form action="run_updatepenally.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>penallyID</th>
			<td bgcolor="antiquewhite"><input type="text" name="penallyID" value="<?php echo $penallyID; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>librarianID</th>
		  <td bgcolor="antiquewhite"><input type="text" name="librarianID" value="<?php echo $librarianID; ?>" readonly/></td>
		</tr>
		 <tr>
		  <th>libraryID</th>
		  <td bgcolor="antiquewhite"><input type="text" name="libraryID" value="<?php echo $libraryID; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>detail</th>
		  <td bgcolor="antiquewhite"><input type="text" name="detail" value="<?php echo $detail; ?>" /></td>
		</tr>
        <tr>
		  <th>state</th>
		  <td bgcolor="antiquewhite">
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