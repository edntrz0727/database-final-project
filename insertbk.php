<html>
<head>
	<title>學生資料庫管理系統</title>
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
	
	<h1 align="center">新增書籍資料</h1>
	<form action="insertbook.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>ISBN</th>
			<td bgcolor="#FFFFFF"><input type="text" name="ISBN" value=""/></td>
		</tr>
		<tr>
		  <th>title</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="title" value="" /></td>
		</tr>
		 <tr>
		  <th>writer</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="writer" value="" /></td>
		</tr>
		<tr>
		  <th>company</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="company" value="" /></td>
		</tr>
        <tr>
		  <th>translator</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="translator" value="" /></td>
		</tr>
        <tr>
		  <th>publishDate</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="publishDate" value="" /></td>
		</tr>
        <tr>
		  <th>edition</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="edition" value="" /></td>
		</tr>
        <tr>
		  <th>subjecthead</th>
		  <td bgcolor='#FFFFFF'>
            <input type='radio' name='subjecthead' value='Algorithms'>Algorithms</input> 
			<input type='radio' name='subjecthead' value='Amazon Web Services'>Amazon Web Services</input><br>
			<input type='radio' name='subjecthead' value='Artificial Intelligence'>Artificial Intelligence</input> 
			<input type='radio' name='subjecthead' value='Blockchain'>Blockchain</input> 
			<input type='radio' name='subjecthead' value='C++ Programming'>C++ Programming</input> 
			<input type='radio' name='subjecthead' value='Computer Networking'>Computer Networking</input> 
			<input type='radio' name='subjecthead' value='Computer Science'>Computer Science</input><br>
			<input type='radio' name='subjecthead' value='Data Analysis'>Data Analysis</input>
			<input type='radio' name='subjecthead' value='Data Science'>Data Science</input>
			<input type='radio' name='subjecthead' value='Deep Learning'>Deep Learning</input><br>
			<input type='radio' name='subjecthead' value='Docker'>Docker</input>
			<input type='radio' name='subjecthead' value='Interview Preparation'>Interview Preparation</input><br>
			<input type='radio' name='subjecthead' value='Java Programming'>Java Programming</input>
			<input type='radio' name='subjecthead' value='JavaScript'>JavaScript</input><br>
			<input type='radio' name='subjecthead' value='Machine Learning'>Machine Learning</input>
			<input type='radio' name='subjecthead' value='Natural Language Processing'>Natural Language Processing</input><br>
			<input type='radio' name='subjecthead' value='Operating Systems'>Operating Systems</input>
			<input type='radio' name='subjecthead' value='Pattern Recognition'>Pattern Recognition</input><br>
			<input type='radio' name='subjecthead' value='Perl Programming'>Perl Programming</input>
			<input type='radio' name='subjecthead' value='Python Programming'>Python Programming</input><br>
			<input type='radio' name='subjecthead' value='Reinforcement Learning'>Reinforcement Learning</input>
			<input type='radio' name='subjecthead' value='Software Development'>Software Development</input><br>
			<input type='radio' name='subjecthead' value='Software Engineering'>Software Engineering</input>
			<input type='radio' name='subjecthead' value='SQL'>SQL</input>
			<input type='radio' name='subjecthead' value='Statistical Learning'>Statistical Learning</input><br>
			<input type='radio' name='subjecthead' value='Theory of Computation'>Theory of Computation</input>
			<input type='radio' name='subjecthead' value='Web Development'>Web Development</input>
        </td>
		</tr>
    <tr>
		  <th>language</th>
		  <td bgcolor='#FFFFFF'>
          <input type='radio' name='language' value='Chinese'>Chinese</input> 
			    <input type='radio' name='language' value='English'>English</input>
      </td>
		</tr>
		<tr>
		  <th>state</th>
			<td bgcolor='#FFFFFF'>
          		<input type='radio' name='state' value='空閒'>空閒</input> 
			    <input type='radio' name='state' value='遺失'>遺失/沒還</input>
				<input type='radio' name='state' value='預約中'>預約中</input>
				<input type='radio' name='state' value='借閱中'>借閱中</input>
      </td>
	  <tr>
	  <tr>
		<th>Lname</th>
        <td bgcolor='#FFFFFF'>
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
		  <td bgcolor="#FFFFFF"><input type="text" name="number" value="" /></td>
		</tr>
		<tr>
		  <th colspan="2"><input type="submit" value="新增" class="delete-link"/></th>
		</tr>
	  </table>
	</form>
	
</body>
	
</html>
