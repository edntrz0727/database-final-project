<html>
<head>
	<title>期刊管理系統</title>
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
        $journalID=$_GET["id"];
        $sql = "SELECT * FROM journal where journalID = '$journalID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $publishDate = $row['publishDate'];
        $subjecthead = $row['subjecthead'];
        $frequency = $row['frequency'];
        $state = $row['state'];
?>
	<form action="run_updatejournal.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>journalID</th>
			<td bgcolor="antiquewhite"><input type="text" name="journalID" value="<?php echo $journalID;?>" readonly/></td>
		</tr>
		<tr>
		  <th>title</th>
		  <td bgcolor="antiquewhite"><input type="text" name="title" value="<?php echo $title;?>" /></td>
		</tr>
        <tr>
		  <th>publishDate</th>
		  <td bgcolor="antiquewhite"><input type="text" name="publishDate" value="<?php echo $publishDate;?>" /></td>
		</tr>
        <tr>
		  <th>frequency</th>
		  <td bgcolor='antiquewhite'>
            <input type='radio' name='frequency' value='Bi-monthly' <?php if($frequency=='Bi-monthly'){echo "checked";} ?>>Bi-monthly</input> 
            <input type='radio' name='frequency' value='Monthly' <?php if($frequency=='Monthly'){echo "checked";} ?>>Monthly</input>
            <input type='radio' name='frequency' value='Quarterly' <?php if($frequency=='Quarterly'){echo "checked";} ?>>Quarterly</input>
          </td>
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
  <h3 align="center" style="color:brown">修改地點</h3>
	<table style="width:50%" align="center">
		<tr><th>libraryjournalID</th><th>journalID</th><th>Lname</th><th>number</th></tr>
		<?php   
                $sql2 = "SELECT * FROM journal_place where journalID = '$journalID'";
                $result2=mysqli_query($conn,$sql2);
                $count = 0;
				if ($result2->num_rows > 0) {	
					while ( $row2 = mysqli_fetch_array ( $result2, MYSQLI_ASSOC ) ) {
                        $libraryjournalID = $row2['libraryjournalID'];
                        $Lname = $row2['Lname'];
                        $number = $row2['number'];
						echo "<tr>";
                        echo "<td bgcolor='antiquewhite'><input type='text' name='id[$count]' value='$libraryjournalID' readonly/></td>";
						echo "<td bgcolor='antiquewhite'><input type='text' name='mediaIDplace[$count]' value='$journalID' readonly/></td>";
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
