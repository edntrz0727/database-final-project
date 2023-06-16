<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>讀者管理系統</title> <!-- mysql 自動化同步預約-->
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
	<h3 align="center" style="color:brown">進行審核</h3>
    <?php
        $conn=require_once "db_info.php";
        $recommandID=$_GET["id"];
        session_start();
        $librarianID = $_SESSION['librarianID'];
        $sql = "SELECT * FROM manage natural join recommend where recommendID = '$recommandID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $reason = $row['reason'];
        $state = $row['state'];
        $senddate = $row['senddate'];

        $libraryID = $row['libraryID'];
        $ISBN = $row['ISBN'];
        $title = $row['title'];
        $writer = $row['writer'];
        $company = $row['company'];
        $translator = $row['translator'];
        $publishDate = $row['publishDate'];
        $edition = $row['edition'];
        $subjecthead = $row['subjecthead'];
        $language = $row['language'];
    ?>
	<form action="run_updatereciverecommand.php" method="post">	
	  <table width="500" border="1" bgcolor="antiquewhite" align="center">
		<tr>
			<th>recommendID</th>
			<td bgcolor="antiquewhite"><input type="text" name="recommendID" value="<?php echo $recommandID; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>librarianID</th>
		  <td bgcolor="antiquewhite"><input type="text" name="librarianID" value="<?php echo $librarianID; ?>" readonly /></td>
		</tr>
		 <tr>
		  <th>reason</th>
		  <td bgcolor="antiquewhite"><input type="text" name="reason" value="<?php echo $reason; ?>" /></td>
		</tr>
        <tr>
		  <th>state</th>
		  <td bgcolor="antiquewhite">
            <input type="radio" name="state" value="沒審核" <?php if($state=="沒審核"){echo "checked";} ?>/>沒審核</input>
            <input type="radio" name="state" value="準核" <?php if($state=="準核"){echo "checked";} ?>/>準核</input>
            <input type="radio" name="state" value="不準核" <?php if($state=="不準核"){echo "checked";} ?>/>不準核</input>
          </td>
		</tr>
        <tr>
		  <th>senddate</th>
		  <td bgcolor="antiquewhite"><input type="text" name="reason" value="<?php echo $senddate; ?>" readonly/></td>
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
    <br>
    <h3 align="center" style="color:brown">詳細資料</h3>
	  <table width="500" border="1" border-color="brown" bgcolor="#cccccc" align="center">
		<tr>
		    <th>libraryID</th>
			<td bgcolor="antiquewhite"><?php echo $libraryID;?></td>
		</tr>
		<tr>
		  <th>ISBN</th>
		  <td bgcolor="antiquewhite"><?php echo $ISBN;?></td>
		</tr>
		 <tr>
		  <th>title</th>
		  <td bgcolor="antiquewhite"><?php echo $title;?></td>
		</tr>
        <tr>
		  <th>writer</th>
		  <td bgcolor="antiquewhite"><?php echo $writer;?></td>
		</tr>
        <tr>
		  <th>company</th>
		  <td bgcolor="antiquewhite"><?php echo $company;?></td>
		</tr>
        <tr>
		  <th>translator</th>
		  <td bgcolor="antiquewhite"><?php echo $translator;?></td>
		</tr>
        <tr>
		  <th>publishDate</th>
		  <td bgcolor="antiquewhite"><?php echo $publishDate;?></td>
		</tr>
        <tr>
		  <th>edition</th>
		  <td bgcolor="antiquewhite"><?php echo $edition;?></td>
		</tr>
        <tr>
		  <th>subjecthead</th>
		  <td bgcolor="antiquewhite"><?php echo $subjecthead;?></td>
		</tr>
        <tr>
		  <th>language</th>
		  <td bgcolor="antiquewhite"><?php echo $language;?></td>
		</tr>
	  </table>
      <br>
    <div id="back" align="center">
        <a href="reciverecommand.php">返回</a>
    <div>
</body>
</html>