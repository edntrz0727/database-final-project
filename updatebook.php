<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>書籍管理系統</title>
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
    <?php
        $conn=require_once "db_info.php";
        $ISBN=$_GET["id"];
        $sql = "SELECT * FROM book where ISBN = $ISBN";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $ISBN = $row['ISBN'];
        $title = $row['title'];
        $writer = $row['writer'];
        $company = $row['company'];
        $translator = $row['translator'];
        $publishDate = $row['publishDate'];
        $edition = $row['edition'];
        $subjecthead = $row['subjecthead'];
        $language = $row['language'];
        $state = $row['state'];
    ?>
<h3 align="center" style="color:brown">修改書籍資料</h3>
	<form action="run_updatebook.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">
		<tr>
			<th>ISBN</th>
			<td bgcolor="antiquewhite"><input type="text" name="ISBN" value="<?php echo $ISBN; ?>" readonly/></td>
		</tr>
		<tr>
		  <th>title</th>
		  <td bgcolor="antiquewhite"><input type="text" name="title" value="<?php echo $title; ?>" /></td>
		</tr>
		 <tr>
		  <th>writer</th>
		  <td bgcolor="antiquewhite"><input type="text" name="writer" value="<?php echo $writer; ?>" /></td>
		</tr>
		<tr>
		  <th>company</th>
		  <td bgcolor="antiquewhite"><input type="text" name="company" value="<?php echo $company; ?>" /></td>
		</tr>
        <tr>
		  <th>translator</th>
		  <td bgcolor="antiquewhite"><input type="text" name="translator" value="<?php if($translator==''){echo 0;}else{echo $translator;} ?>" /></td>
		</tr>
        <tr>
		  <th>publishDate</th>
		  <td bgcolor="antiquewhite"><input type="text" name="publishDate" value="<?php echo $publishDate; ?>" /></td>
		</tr>
        <tr>
		  <th>edition</th>
		  <td bgcolor="antiquewhite"><input type="text" name="edition" value="<?php echo $edition; ?>" /></td>
		</tr>
        <tr>
		  <th>subjecthead</th>
		  <td bgcolor='antiquewhite'>
            <input type='radio' name='subjecthead' value='Algorithms' <?php if($subjecthead=="Algorithms"){echo "checked";}?> >Algorithms</input> 
			      <input type='radio' name='subjecthead' value='Amazon Web Services' <?php if($subjecthead=="Amazon Web Services"){echo "checked";}?>>Amazon Web Services</input><br>
            <input type='radio' name='subjecthead' value='Artificial Intelligence' <?php if($subjecthead=="Artificial Intelligence"){echo "checked";}?> >Artificial Intelligence</input> 
            <input type='radio' name='subjecthead' value='Blockchain' <?php if($subjecthead=="Blockchain"){echo "checked";}?> >Blockchain</input> 
            <input type='radio' name='subjecthead' value='C++ Programming' <?php if($subjecthead=="C++ Programming"){echo "checked";}?> >C++ Programming</input> 
            <input type='radio' name='subjecthead' value='Computer Networking' <?php if($subjecthead=="Computer Networking"){echo "checked";}?> >Computer Networking</input> 
            <input type='radio' name='subjecthead' value='Computer Science' <?php if($subjecthead=="Computer Science"){echo "checked";}?> >Computer Science</input><br>
            <input type='radio' name='subjecthead' value='Data Analysis' <?php if($subjecthead=="Data Analysis"){echo "checked";}?> >Data Analysis</input>
            <input type='radio' name='subjecthead' value='Data Science' <?php if($subjecthead=="Data Science"){echo "checked";}?> >Data Science</input>
            <input type='radio' name='subjecthead' value='Deep Learning' <?php if($subjecthead=="Deep Learning"){echo "checked";}?> >Deep Learning</input><br>
            <input type='radio' name='subjecthead' value='Docker' <?php if($subjecthead=="Docker"){echo "checked";}?> >Docker</input>
            <input type='radio' name='subjecthead' value='Interview Preparation' <?php if($subjecthead=="Interview Preparation"){echo "checked";}?> >Interview Preparation</input><br>
            <input type='radio' name='subjecthead' value='Java Programming' <?php if($subjecthead=="Java Programming"){echo "checked";}?> >Java Programming</input>
            <input type='radio' name='subjecthead' value='JavaScript' <?php if($subjecthead=="JavaScript"){echo "checked";}?> >JavaScript</input><br>
            <input type='radio' name='subjecthead' value='Machine Learning' <?php if($subjecthead=="Machine Learning"){echo "checked";}?> >Machine Learning</input>
            <input type='radio' name='subjecthead' value='Natural Language Processing' <?php if($subjecthead=="Natural Language Processing"){echo "checked";}?> >Natural Language Processing</input><br>
            <input type='radio' name='subjecthead' value='Operating Systems' <?php if($subjecthead=="Operating Systems"){echo "checked";}?> >Operating Systems</input>
            <input type='radio' name='subjecthead' value='Pattern Recognition' <?php if($subjecthead=="Pattern Recognition"){echo "checked";}?> >Pattern Recognition</input><br>
            <input type='radio' name='subjecthead' value='Perl Programming' <?php if($subjecthead=="Perl Programming"){echo "checked";}?> >Perl Programming</input>
            <input type='radio' name='subjecthead' value='Python Programming' <?php if($subjecthead=="Python Programming"){echo "checked";}?> >Python Programming</input><br>
            <input type='radio' name='subjecthead' value='Reinforcement Learning' <?php if($subjecthead=="Reinforcement Learning"){echo "checked";}?> >Reinforcement Learning</input>
            <input type='radio' name='subjecthead' value='Software Development' <?php if($subjecthead=="Software Development"){echo "checked";}?> >Software Development</input><br>
            <input type='radio' name='subjecthead' value='Software Engineering' <?php if($subjecthead=="Software Engineering"){echo "checked";}?> >Software Engineering</input>
            <input type='radio' name='subjecthead' value='SQL' <?php if($subjecthead=="SQL"){echo "checked";}?> >SQL</input>
            <input type='radio' name='subjecthead' value='Statistical Learning' <?php if($subjecthead=="Statistical Learning"){echo "checked";}?> >Statistical Learning</input><br>
            <input type='radio' name='subjecthead' value='Theory of Computation' <?php if($subjecthead=="Theory of Computation"){echo "checked";}?> >Theory of Computation</input>
            <input type='radio' name='subjecthead' value='Web Development' <?php if($subjecthead=="Web Development"){echo "checked";}?> >Web Development</input>
        </td>
		</tr>
    <tr>
		  <th>language</th>
		  <td bgcolor='antiquewhite'>
          <input type='radio' name='language' value='Chinese' <?php if($language=="Chinese"){echo "checked";}?> >Chinese</input> 
			    <input type='radio' name='language' value='English' <?php if($language=="English"){echo "checked";}?>>English</input>
      </td>
		</tr>
		<tr>
		  <th>state</th>
			<td bgcolor='antiquewhite'>
          <input type='radio' name='state' value='空閒' <?php if($state=="空閒"){echo "checked";}?> >空閒</input> 
			    <input type='radio' name='state' value='遺失' <?php if($state=="遺失"){echo "checked";}?>>遺失/沒還</input>
          <input type='radio' name='state' value='預約中' <?php if($state=="預約中"){echo "checked";}?>>預約中</input>
          <input type='radio' name='state' value='借閱中' <?php if($state=="借閱中"){echo "checked";}?>>借閱中</input>
      </td>
		<tr>
		  <th colspan="2"><input type="submit" value="更新" class="delete-link"/></th>
		</tr>
    </table>
    <br>
    <h3 align="center" style="color:brown">修改地點</h3>
	  <table style="width:50%" align="center">
		<tr><th>ISBN</th><th>bookID</th><th>Lname</th><th>number</th></tr>
		<?php   
          $sql2 = "SELECT * FROM book_place where ISBN = '$ISBN'";
          $result2=mysqli_query($conn,$sql2);
          $count = 0;
				if ($result2->num_rows > 0) {	
					while ( $row2 = mysqli_fetch_array ( $result2, MYSQLI_ASSOC ) ) {
            $bookID = $row2['bookID'];
             $Lname = $row2['Lname'];
            $number = $row2['number'];
						echo "<tr>";
            echo "<td bgcolor='antiquewhite'><input type='text' name='id[$count]' value='$ISBN' readonly/></td>";
						echo "<td bgcolor='antiquewhite'><input type='text' name='bookID[$count]' value='$bookID' readonly/></td>";
						echo "<td bgcolor='antiquewhite'><input type='text' name='Lname[$count]' value='$Lname'/></td>";
						echo "<td bgcolor='antiquewhitewhite'><input type='text' name='number[$count]' value='$number'/></td>";
						echo "</tr>";
            $count++;
					}
				}
		?>
	</table>
	</form>
</body>
</html>