<html>
    <head>
        <title>修改個人資料</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <?php
            $conn=require_once "config.php";

            session_start();
            //$libraryID = $_SESSION['libraryID'];
            $libraryID = '1111111';
            $info_sql = "SELECT *
                         FROM READER
                         WHERE libraryID = '$libraryID'";
            
            $result = $conn->query($info_sql);
            if ($result) {
                $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
                $name = $row['name'];
                $studentID = $row['studentID'];
                $phone = $row['phone'];
                $address = $row['address'];
                $email = $row['email'];

            } else {
                echo "讀取失敗";
            }
        ?>
        <form action="" method="get">
            <table>
                <tr>
                    <th>姓名</th>
                    <th><?php echo $name; ?></th>
                </tr>
                <tr>
                    <th>學號</th>
                    <th><?php echo $studentID; ?></th>
                </tr>
                <tr>
                    <th>圖書館ID</th>
                    <th><?php echo $libraryID; ?></th>
                </tr>
            </table>
        </form>
        <!--上面用get，因為這三個通常是不會改動到的東西-->
        <form action="dorevise_usr.php" method="post">
            <?php
                echo 
                '<table>
                    <tr>
                        <th>電話</th>
                        <td><input type="text" name="tel" value = '.$phone.' /></td>
                    </tr>
                    <tr>
                        <th>地址</th>
                        <td><input type="text" name="address" value = '.$address.' /></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><input type="text" name="email" value = '.$email.' /></td>
                    </tr>
                </table>'
            ?>
            <input type="submit" value="修改資料"/>
            <input type="reset" value="清除資料"/>
            <input type="button" value="取消修改" onclick="javascript:location.href='user_info.php'"/>
        </form>
    </body>
</html>