<html>
<head>
	<title>媒體管理系統</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
  body{
        width: 100%;
        height: 100%;
        background-color: antiquewhite;
        text-align:center;
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
<h3 align="center" style="color:brown">修改資料</h3>
<?php
        $conn=require_once "db_info.php";
        $mediaID=$_GET["id"];
        $sql = "SELECT * FROM media where mediaID = '$mediaID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $company = $row['company'];
        $publishDate = $row['publishDate'];
        $subjecthead = $row['subjecthead'];
        $language = $row['language'];
        $state = $row['state'];
?>
	
	<form action="run_updatemedia.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>mediaID</th>
			<td bgcolor="antiquewhite"><input type="text" name="mediaID" value="<?php echo $mediaID;?>" readonly/></td>
		</tr>
		<tr>
		  <th>title</th>
		  <td bgcolor="antiquewhite"><input type="text" name="title" value="<?php echo $title;?>" /></td>
		</tr>
		<tr>
		  <th>company</th>
		  <td bgcolor="antiquewhite"><input type="text" name="company" value="<?php echo $company;?>" /></td>
		</tr>
        <tr>
		  <th>publishDate</th>
		  <td bgcolor="antiquewhite"><input type="text" name="publishDate" value="<?php echo $publishDate;?>" /></td>
		</tr>
        <tr>
		  <th>subjecthead</th>
		  <td bgcolor='antiquewhite'>
            <input type='radio' name='subjecthead' value='Computer Science' <?php if($subjecthead=='Computer Science'){echo "checked";} ?> >Computer Science</input>
            <input type='radio' name='subjecthead' value='Data Structures' <?php if($subjecthead=='Data Structures'){echo "checked";} ?> >Data Structures</input><br>
            <input type='radio' name='subjecthead' value='Java Programming' <?php if($subjecthead=='Java Programming'){echo "checked";} ?> >Java Programming</input>
            <input type='radio' name='subjecthead' value='Web Development' <?php if($subjecthead=='Web Development'){echo "checked";} ?> >Web Development</input><br>
            <input type='radio' name='subjecthead' value='Database Management' <?php if($subjecthead=='Database Management'){echo "checked";} ?> >Database Management</input>
            <input type='radio' name='subjecthead' value='Artificial Intelligence' <?php if($subjecthead=='Artificial Intelligence'){echo "checked";} ?> >Artificial Intelligence</input><br>
            <input type='radio' name='subjecthead' value='Network Security' <?php if($subjecthead=='Network Security'){echo "checked";} ?> >Network Security</input>
            <input type='radio' name='subjecthead' value='Software Engineering' <?php if($subjecthead=='Software Engineering'){echo "checked";} ?> >Software Engineering</input><br>
            <input type='radio' name='subjecthead' value='Computer Networks' <?php if($subjecthead=='Computer Networks'){echo "checked";} ?> >Computer Networks</input>
            <input type='radio' name='subjecthead' value='Operating Systems' <?php if($subjecthead=='Operating Systems'){echo "checked";} ?> >Operating Systems</input>
          </td>
		</tr>
    <tr>
		  <th>language</th>
		  <td bgcolor='antiquewhite'>
          <input type='radio' name='language' value='Chinese' <?php if($language=='Chinese'){echo "checked";} ?>>Chinese</input> 
		  <input type='radio' name='language' value='English' <?php if($language=='English'){echo "checked";} ?>>English</input>
      </td>
		</tr>
		<tr>
		  <th>state</th>
			<td bgcolor='antiquewhite'>
            <input type='radio' name='state' value='Available' <?php if($state=='Available'){echo "checked";} ?>>Available </input> 
            <input type='radio' name='state' value='miss' <?php if($state=='miss'){echo "checked";}?>>miss </input>
      </td>
		<tr>
		  <th colspan="2"><input type="submit" value="修改" class="delete-link"/></th>
		</tr>
	  </table>
	<br>
  <h3 align="center" style="color:brown">修改權限</h3>
	<table style="width:50%" align="center">
		<tr><th>librarymediaID</th><th>mediaID</th><th>Lname</th><th>number</th></tr>
		<?php   
                $sql2 = "SELECT * FROM media_place where mediaID = '$mediaID'";
                $result2=mysqli_query($conn,$sql2);
                $count = 0;
				if ($result2->num_rows > 0) {	
					while ( $row2 = mysqli_fetch_array ( $result2, MYSQLI_ASSOC ) ) {
                        $librarymediaID = $row2['librarymediaID'];
                        $Lname = $row2['Lname'];
                        $number = $row2['number'];
						echo "<tr>";
                        echo "<td bgcolor='antiquewhite'><input type='text' name='id[$count]' value='$librarymediaID' readonly/></td>";
						echo "<td bgcolor='antiquewhite'><input type='text' name='mediaIDplace[$count]' value='$mediaID' readonly/></td>";
						echo "<td bgcolor='antiquewhite'><input type='text' name='Lname[$count]' value='$Lname'/></td>";
						echo "<td bgcolor='antiquewhite'><input type='text' name='number[$count]' value='$number'/></td>";
						echo "</tr>";
                        $count++;
					}
				}
		?>
	</table>
    </form>
</body>
	
</html>
