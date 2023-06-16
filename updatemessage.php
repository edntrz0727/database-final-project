<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>公告管理系統</title>
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
<h3 align="center" style="color:brown">修改公告</h3>
    <?php
        $conn=require_once "db_info.php";
        $newID=$_GET["id"];
        $sql = "SELECT * FROM news where newID = '$newID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        session_start();
        $librarianID = $_SESSION['librarianID'];
        $title = $row['title'];
        $postDate = $row['postDate'];
        $dueDate = $row['dueDate'];
        $test = $row['test'];
        $taq = $row['taq'];
    ?>

	<form action="run_updatemessage.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>newID</th>
			<td bgcolor="antiquewhite"><input type="text" name="newID" value="<?php echo $newID; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>librarianID</th>
		  <td bgcolor="antiquewhite"><input type="text" name="librarianID" value="<?php echo $librarianID; ?>" readonly/></td>
		</tr>
		 <tr>
		  <th>title</th>
		  <td bgcolor="antiquewhite"><input type="text" name="title" value="<?php echo $title; ?>" /></td>
		</tr>
		<tr>
		  <th>postDate</th>
		  <td bgcolor="antiquewhite"><input type="text" name="postDate" value="<?php echo $postDate; ?>" readonly/></td>
		</tr>
        <tr>
		  <th>dueDate</th>
		  <td bgcolor="antiquewhite"><input type="text" name="dueDate" value="<?php echo $dueDate; ?>" /></td></td>
		</tr>
        <tr>
		  <th>text</th>
		  <td bgcolor="antiquewhite"><textarea name="text" style="width: 100%; height: 200px; resize: none; padding: 5px; box-sizing: border-box;"><?php echo $test;?></textarea></td>
		</tr>
        <tr>
		  <th>tag</th>
		  <td bgcolor="antiquewhite"><input type="text" name="taq" value="<?php echo $taq; ?>" /></td></td>
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