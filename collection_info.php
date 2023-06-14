<html>
    <head>
        <title>館藏資訊</title>
    </head>
    <body>
        <div id="collection info">
            <form action="get_collection_info.php" method="get">
                <table>
                <?php
                    $conn=require_once "config.php";

                    $ISBN = $_GET["id"];
                    $sql = "SELECT * 
                            from BOOK 
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
                </table>
            </form>
        </div>
        <div id="collection reservation">
            <form action="collection_info.php" method="get">
                <table>
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
        <div>
            <form action="" method="post"><!--送出預約-->
                <input type="submit" value="預約" />
            </form>
        </div>
    </body>
</html>