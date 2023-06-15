<html>
    <head>
        <title>設施預約</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
        <p style="margin-top: 2%;font-size: large;font-weight: bold;color: brown;text-align: center;">設施預約</p>
        <div id="equip_reserve">
            <form action="doequip_reserve.php" method="post">
                <table style="margin-top: 1%; margin-left: 37%;">
                   <tr>您目前已預約:</tr>
                   <tr>
                        <th>設備/空間名</th>
                        <th>地點</th>
                        <th>狀態</th>
                        <th>取消預約</th>
                   </tr>
                    <?php
                        $conn=require_once "config.php";

                        session_start();
                        $libraryID = $_SESSION['libraryID'];
                        $sql = "SELECT * FROM E_RESERVATIOB as r,  EQUIPMENT as e 
                        where r.equipID = e.equipID and libraryID = '$libraryID'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {	
                            while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
                                // Process the Result here , need to modify.
                                echo'<tr>'.
                                    '<td>'.$row['name'].'</td>'.
                                    '<td>'.$row['Lname'].'</td>'.
                                    '<td>'.$row['state'].'</td>'.
                                    '<td><a href="ereserv_del.php?id='.$row['EreservationID'].'">取消</td>'.
                                '</tr>';
                            }
                        } else {
                            echo "暫無資料";
                        }
                    ?>
                </table>
                <table style="margin-top: 1%; margin-left: 37%;">
                    <tr>
                        <th>輸入設施名稱：</th>
                        <th>
                            <input type="text" name="equip_name" />
                        </th>
                    </tr>
                    <tr>
                        <th>輸入設施ID：</th>
                        <th>
                            <input type="text" name="equip_id" />
                        </th>
                    </tr>
                    <tr>
                        <th>輸入設施位置：</th>
                        <th>
                            <input type="text" name="equip_loc" />
                        </th>
                    </tr>
                </table>
                <table style="margin-top: 1%; margin-left: 37%;">
                   <tr>目前可預約:</tr>
                   <tr>
                        <th>設備/空間ID</th>
                        <th>設備/空間名</th>
                        <th>地點</th>
                        <th>狀態</th>
                   </tr>
                    <?php
                        $free_sql = "SELECT * FROM `EQUIPMENT`
                                where state = '空閒'";
                        $result = $conn->query($free_sql);
                        if ($result->num_rows > 0) {	
                            while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
                                // Process the Result here , need to modify.
                                echo'<tr>'.
                                    '<td>'.$row['equipID'].'</td>'.
                                    '<td>'.$row['name'].'</td>'.
                                    '<td>'.$row['Lname'].'</td>'.
                                    '<td>'.$row['state'].'</td>'.
                                '</tr>';
                            }
                        } else {
                            echo "暫無資料";
                        }
                    ?>
                </table>
                <div class="btns" style="text-align: center;margin-top: 2%;">
                    <input type="submit" name="button" value="送出預約" style=" background-color: antiquewhite;color: brown;border: none;"/>
                    <input type="button" name="button" value="取消預約" style=" background-color: antiquewhite;color: brown;border: none;margin-left: 5%;"/>
                </div>
            </form>
        </div>
        <div class="btn" style="text-align: center;margin-top: 2%;">
            <input type="button" value="返回首頁" onclick="javascript:location.href='user_index.php'" style=" background-color: antiquewhite;color: brown;border: none;"/>
        </div>
    </body>
</html>