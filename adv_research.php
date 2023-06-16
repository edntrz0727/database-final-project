<html>
<head>
    <title>搜尋結果</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://kit.fontawesome.com/998bef7baf.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            box-sizing: border-box;
        }
        
    body{
        width: 100%;
        height: 100%;
        background-color: antiquewhite;
    }
    .options{
        margin-top: 2%;
        border-color: brown;
    }
    tr,th{
        padding-top:  5%;
    }
    </style>
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
        <div id="banner" class="banner" style="background-color:brown;">
			<p style="color: white; font-size: large;font-weight: bolder;margin-left: 5%;">三校資工圖書系統
		</div>
        <div class="search" style="text-align: center;margin-top: 2%;">
            <input type="text" class="search" placeholder="輸入搜尋館藏">
            <button class="search"><i class="fas fa-search"></i></button>
        </div>
        <p style="color: brown;font-weight: bold;margin-top: 2%;font-size: large;text-align: center;">搜尋結果</p>
        <form action="" method="get">
            <table style="margin-top: 1%;margin-left: 20%;">
                <tr>
                <tr><th>書名</th><th>作者</th><th>出版日期</th><th colspan="2">館藏頁面</th></tr>
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

                    

                    $sql = "SELECT title, writer, publishDate, ISBN
                            FROM BOOK
                            WHERE title = '$title' or writer = '$writer' or ISBN = '$ISBN' or company = '$company' or translator = '$translator' or 
                            publishDate = '$publishDate' or edition = '$edition' or subjecthead = '$subjecthead' or language = '$language'";
                    
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {	
                        while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
                            // Process the Result here , need to modify.
                            echo'<tr>'.
                                '<td>'.$row['title'].'</td>'.
                                '<td>'.$row['writer'].'</td>'.
                                '<td>'.$row['publishDate'].'</td>'.
                                '<td><a href="collection_info.php?id='.$row['ISBN'].'">查看</td>'.
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
                </tr>
            </table>
        </form>
		<div class="btn" style="text-align: center;margin-top: 2%;">
            <input type="button" value="返回首頁" onclick="javascript:location.href='user_index.php'" style=" background-color: antiquewhite;color: brown;border: none;"/>
        </div>

</body>
</html>