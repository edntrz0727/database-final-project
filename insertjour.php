<html>
<head>
	<title>雜誌管理系統</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<script>
	document.addEventListener('DOMContentLoaded', function() {
        var deleteLinks = document.querySelectorAll('.delete-link');
        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                var check = confirm('確認新增');
                if (check === false) {
                    event.preventDefault(); // 取消默认行为，阻止链接的跳转
                }
            });
        });
    });
</script>
<body>
	
	<h1 align="center">新增雜誌資料</h1>
	<form action="insertjournal.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
	  	<tr>
		  <th>journalID</th>
		  <td bgcolor="antiquewhite"><input type="text" name="journalID" value="" placeholder="只有新增地點才要墳" /></td>
		</tr>
		<tr>
		  <th>title</th>
		  <td bgcolor="antiquewhite"><input type="text" name="title" value="" /></td>
		</tr>
        <tr>
		  <th>publishDate</th>
		  <td bgcolor="antiquewhite"><input type="text" name="publishDate" value="" /></td>
		</tr>
        <tr>
		  <th>subjecthead</th>
		  <td bgcolor='antiquewhite'>
            <input type='radio' name='subjecthead' value='Computer Science'>Computer Science</input>
            <input type='radio' name='subjecthead' value='Data Structures'>Data Structures</input><br>
            <input type='radio' name='subjecthead' value='Java Programming'>Java Programming</input>
            <input type='radio' name='subjecthead' value='Web Development'>Web Development</input><br>
            <input type='radio' name='subjecthead' value='Database Management'>Database Management</input>
            <input type='radio' name='subjecthead' value='Artificial Intelligence'>Artificial Intelligence</input><br>
            <input type='radio' name='subjecthead' value='Network Security'>Network Security</input>
            <input type='radio' name='subjecthead' value='Software Engineering'>Software Engineering</input><br>
            <input type='radio' name='subjecthead' value='Computer Networks'>Computer Networks</input>
            <input type='radio' name='subjecthead' value='Operating Systems'>Operating Systems</input>
          </td>
		</tr>
    <tr>
		<th>frequency</th>
		  <td bgcolor='antiquewhite'>
            <input type='radio' name='frequency' value='Monthly'>Monthly</input> 
            <input type='radio' name='frequency' value='Bi-monthly'>Bi-monthly</input>
            <input type='radio' name='frequency' value='Quarterly'>Quarterly</input>
        </td>
		</tr>
		<tr>
		  <th>state</th>
			<td bgcolor='antiquewhite'>
          <input type='radio' name='state' value='Available'>Available </input> 
			    <input type='radio' name='state' value='miss'>miss </input>
      </td>
	  </tr>
	  </tr>
		 <tr>
		  <th>Lname</th>
        <td bgcolor='antiquewhite'>
          <?php
                $conn=require_once "db_info.php";
                $sql = "SELECT * FROM library";
                $result=mysqli_query($conn,$sql);
                if ($result->num_rows > 0) {	
                    while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
                        echo "<input type='radio' name='Lname' value='".$row['Lname']."'/>".$row['Lname']."</input><br>";
                    }
                } 
                mysqli_close($conn);
            ?>
         </td>
		</tr>
		<tr>
		  <th>number</th>
		  <td bgcolor="antiquewhite"><input type="text" name="number" value="" /></td>
		</tr>
		<tr>
		  <th colspan="2"><input type="submit" value="新增" class="delete-link"/></th>
		</tr>
	  </table>
	</form>
	
</body>
	
</html>
