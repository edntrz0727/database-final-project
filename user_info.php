<html>
    <head>
        <title>個人資料</title>
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
        <div>
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
                    <tr>
                        <th>電話</th>
                        <th><?php echo $phone; ?></th>
                    </tr>
                    <tr>
                        <th>地址</th>
                        <th><?php echo $address; ?></th>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th><?php echo $email; ?></th>
                    </tr>
                </table>
            </form>
        </div>
        <div id="revise">
            <form action="" method="post">
                <input type="button" value="修改個人資料" onclick="javascript:location.href='revise_user_info.php'" />
            </form>
        </div>
        <div id="reading state">
            <input type="button" value="查看閱讀狀態" onclick="javascript:location.href='read_state.html'"/>
        </div>
        <div id="reading history">
            <input type="button" value="閱讀紀錄" onclick="javascript:location.href='read_history.html'"/>
        </div>
    </body>
</html>