<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>設施管理系統</title> <!-- mysql 自動化同步預約-->
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
<h3 align="center" style="color:brown">修改設施狀況</h3>
    <?php
        $conn=require_once "db_info.php";
        $equipID=$_GET["id"];
        $sql = "SELECT * FROM equipment where equipID = '$equipID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $Lname = $row['Lname'];
        $state = $row['state'];
    ?>
	<form action="run_updateequip.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>equipID</th>
			<td bgcolor="antiquewhite"><input type="text" name="equipID" value="<?php echo $equipID; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>name</th>
		  <td bgcolor="antiquewhite"><input type="text" name="name" value="<?php echo $name; ?>" /></td>
		</tr>
		 <tr>
		  <th>Lname</th>
		  <td bgcolor="antiquewhite">
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
		  <th>state</th>
		  <td bgcolor="antiquewhite">
            <input type="radio" name="state" value="空閒" <?php if($state=="空閒"){echo "checked";} ?>/>空閒</input>
            <input type="radio" name="state" value="使用中" <?php if($state=="使用中"){echo "checked";} ?>/>使用中</input>
            <input type="radio" name="state" value="已預約" <?php if($state=="已預約"){echo "checked";} ?>/>已預約</input><br>
            <input type="radio" name="state" value="維修中" <?php if($state=="維修中"){echo "checked";} ?>/>維修中</input>
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