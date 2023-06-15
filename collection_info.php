<html>
    <head>
        <title>館藏資訊</title>
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
        tr,th{
           padding-top: 2%;
        }
        </style>
    </head>
    <body>
        <div id="banner" class="banner" style="background-color:brown;">
			<p style="color: white; font-size: large;font-weight: bolder;margin-left: 5%;">三校資工圖書系統
		</div>
        <div id="collection info" style="margin-top: 2%;text-align: center;">
            <p style="font-size: large;font-weight: bold;color: brown;">館藏資訊</p>
            <form action="get_collection_info.php" method="get">
                <table  style="margin-left: 40%;margin-top: 1%;">
                <?php
                    $conn=require_once "config.php";

                    $ISBN = $_GET["id"];
                    $sql = "SELECT * 
                            from BOOK natural join BOOK_PLACE
                            where ISBN = $ISBN";	// set up your sql query
                    $result = $conn->query($sql);	// Send SQL Query
                    if($result){
                        $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
                        $title = $row['title'];
                        $writer = $row['writer'];
                        $translator = $row['translator'];
                        $edition = $row['edition'];
                        $subjecthead = $row['subjecthead'];
                        $language = $row['language'];
                        $company = $row['company'];
                        $publishDate = $row['publishDate'];
                        $state = $row['state'];
                        $Lname = $row['Lname'];
                        $bookID = $row['bookID'];
                    }
                    else{
                        echo "查無資料!";
                    }
                    
                ?>
                    <tr>
                        <td>書籍名稱</td>
                        <td><?php echo $title; ?></td>
                    </tr>
                    <tr>
                        <td>ISBN</td>
                        <td><?php echo $ISBN; ?></td><!--echo ISBN-->
                    </tr>
                    <tr>
                        <td>書籍作者</td>
                        <td><?php echo $writer; ?></td><!--echo author-->
                    </tr>
                    <tr>
                        <td>書籍譯者</td>
                        <td><?php echo $translator; ?></td>
                    </tr>
                    <tr>
                        <td>版次</td>
                        <td><?php echo $edition; ?></td>
                    </tr>
                    <tr>
                        <td>相關科目</td>
                        <td><?php echo $subjecthead; ?></td>
                    </tr>
                    <tr>
                        <td>書籍語言</td>
                        <td><?php echo $language; ?></td>
                    </tr>
                    <tr>
                        <td>出版商</td>
                        <td><?php echo $company; ?></td>
                    </tr>
                    <tr>
                        <td>出版日期</td>
                        <td><?php echo $publishDate; ?></td>
                    </tr>
                    <tr>
                        <td>館藏地</td>
                        <td><?php echo $Lname,$bookID, $number; ?></td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="collection reservation">
            <form action="collection_info.php" method="get">
                <table  style="margin-left: 40%;margin-top: 5%;">
                    <tr>
                        <td>書籍狀態</td>
                        <td>能否預約</td>
                    </tr>
                    <tr>
                        <td><?php echo $state; ?></td><!--book state-->
                        <td>
                        <?php
                            $sql = "SELECT * 
                                    from B_RESERVATIOB
                                    where ISBN = $ISBN";	// set up your sql query
                            $result = $conn->query($sql);	// Send SQL Query
                            if($result->num_rows > 0){
                                echo $result->num_rows,"人預約";
                            }
                            else{
                                echo "0 人預約";
                            }
                        ?>
                        </td><!--reservation-->
                    </tr>
                </table>
            </form>
        </div>
        <div class="reseve" style="text-align: center;margin-top: 1%;">
            <form action="" method="post"><!--送出預約-->
                <input type="button" value="預約" style="background-color: antiquewhite;color: brown;border: none;" onclick="javascript:location.href='book_reserve.php?id=<?php echo $ISBN; ?>'"/>
            </form>
        </div>
    </body>
</html>