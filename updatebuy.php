<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DB管理系統</title> <!-- mysql 自動化同步預約-->
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
        $buyID=$_GET["id"];
        $sql = "SELECT * FROM buy where buyID = '$buyID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $databaseID = $row['databaseID'];
        $Lname = $row['Lname'];
    ?>
<h1 align="center">修改地點</h1>
	<form action="run_updatebuy.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>buyID</th>
			<td bgcolor="#FFFFFF"><input type="text" name="buyID" value="<?php echo $buyID; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>databaseID</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="databaseID" value="<?php echo $databaseID; ?>" readony/></td>
		</tr>
		 <tr>
		  <th>Lname</th>
		  <td bgcolor="#FFFFFF">
          <?php
            $sql2 = "SELECT * FROM library";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2->num_rows > 0) {
                while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                    echo "<input type='radio' name='Lname' value='".$row2['Lname']."'";
                    if ($Lname == $row2['Lname']){echo "checked";}
                    echo "/>".$row2['Lname'] ."</input><br>";
                }
            }
          ?>
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