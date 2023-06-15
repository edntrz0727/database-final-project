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
    <div id="banner" class="banner" style="background-color:brown;">
          <p style="color: white; font-size: large;font-weight: bolder">三校資工圖書系統
    </div>
    <h3 align="center" style="color:brown">修改權限</h3>
    <?php
        $conn=require_once "db_info.php";
        $libraryID=$_GET["id"];
        $sql = "SELECT * FROM permission where libraryID = '$libraryID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $queueID = $row['queueID'];
        $sourcelimit = $row['sourcelimit'];
        $equiplimit = $row['equiplimit'];
    ?>

	<form action="run_updatepermission.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>libraryID</th>
			<td bgcolor="antiquewhite"><input type="text" name="libraryID" value="<?php echo $libraryID; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>queueID</th>
		  <td bgcolor="antiquewhite">
            <input type="radio" name="queueID" value="ntu" <?php if($queueID=='ntu'){echo "checked";}?>/>ntu</input>
            <input type="radio" name="queueID" value="ntust" <?php if($queueID=='ntust'){echo "checked";}?>/>ntust</input>
            <input type="radio" name="queueID" value="ntnu" <?php if($queueID=='ntnu'){echo "checked";}?>/>ntnu</input>
            <input type="radio" name="queueID" value="penalty" <?php if($queueID=='penalty'){echo "checked";}?>/>penalty</input>
            <input type="radio" name="queueID" value="special" <?php if($queueID=='special'){echo "checked";}?>/>special</input>
          </td>
		</tr>
		 <tr>
		  <th>sourcelimit</th>
		  <td bgcolor="antiquewhite"><input type="text" name="sourcelimit" value="<?php echo $sourcelimit; ?>"/></td>
		</tr>
		<tr>
		  <th>equiplimit</th>
		  <td bgcolor="antiquewhite"><input type="text" name="equiplimit" value="<?php echo $equiplimit; ?>" /></td>
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