<html>
<head>
	<title>學生資料庫管理系統</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
</style>
<body>
	
	<h1 align="center">查詢結果</h1>
	<table style="width:50%" align="center">
		<tr><th>書名</th><th>作者</th><th>出版日期</th></tr>
        <?php

        $conn=require_once "config.php";

        session_start();

        if (isset($_POST['book_name']) || isset($_POST['author']) || isset($_POST['ISBN']) || isset($_POST['publisher']) || isset($_POST['translator'])
            || isset($_POST['publish_date']) || isset($_POST['edition']) || isset($_POST['subject_handling']) || isset($_POST['language']) ) {
            $title = $_POST['book_name'];
            $writer = $_POST['author'];
            $ISBN = $_POST['ISBN'];
            $company = $_POST['publisher'];
            $translator = $_POST['translator'];
            $publishDate = $_POST['publish_date'];
            $edition = $_POST['edition'];
            $subjecthead = $_POST['subject_handling'];
            $language = $_POST['language'];

            

            $sql = "SELECT title, writer, publishDate
                    FROM BOOK
                    WHERE title = '$title' or writer = '$writer' or ISBN = '$ISBN' or company = '$company' or translator = '$translator' or 
                    publishDate = '$publishDate' or edition = '$edition' or subjecthead =  '$subjecthead' or language = '$language'";
            
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {	
                while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
                    // Process the Result here , need to modify.
                    echo'<tr>'.
                        '<td>'.$row['title'].'</td>'.
                        '<td>'.$row['writer'].'</td>'.
                        '<td>'.$row['publishDate'].'</td>'.
                    '</tr>';
                }
            } else {
                echo "查詢失敗";
            }

        }else{
            // 跳到失敗頁面
            echo "資料不完整";
        }
                        
        ?>
    </table>

</body>
</html>