<html>
<body>
	
	<h1 align="center">館藏清單</h1>
	<table style="width:50%" align="center">
		<tr><th>Title</th><th>Author</th><th colspan="2">Action</th></tr>
		<!-- TODO 
			從資料庫中撈出student表格的資料，用html呈現。
			
			以下html為範例。
		-->
				<!-- hint: 用這段php code 讀取資料庫的資料-->

		<?php
		
                $conn=require_once "config.php";
				
				// ******** update your personal settings ******** 
				$sql = "SELECT * from BOOK";	// set up your sql query
				$result = $conn->query($sql);	// Send SQL Query

				if ($result->num_rows > 0) {	
					while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
						// Process the Result here , need to modify.
						echo'<tr>'.
							'<td>'.$row['title'].'</td>'.
							'<td>'.$row['writer'].'</td>'.
							'<td><a href="collection_info.php?id='.$row['ISBN'].'">查看</td>'.
						'</tr>';
					}
				} else {
					echo "0 results";
				}
		
		?>
		
	</table>
</body>
	
</html>


				
		