<html>
    <head>
        <title>閱讀狀態</title>
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
        .options{
            margin-top: 2%;
            border-color: brown;
        }
        tr,th{
            padding-top:  5%;
        }
        </style>
    </head>
    <body>
        <div id="banner" class="banner" style="background-color:brown;">
			<p style="color: white; font-size: large;font-weight: bolder;margin-left: 5%;">三校資工圖書系統
		</div>
        <p style="color: brown;font-weight: bold;font-size: large;text-align: center;margin-top: 2%;">閱讀狀態</p>
        <div id="state">
            <form action="read_state.php" method="get">
                <table style="margin-left: 44%;">
                    <tr>
                        <th>館藏名稱</th>
                        <th>借閱狀態</th>
                    </tr>
                    <?php

                        $conn=require_once "config.php";

                        session_start();

                        $libraryID = $_SESSION['libraryID'];
                        //$libraryID = '1111111';

                        $sql = "SELECT *
                                FROM B_BORROW natural join BOOK
                                WHERE libraryID = $libraryID";

                        $result = $conn->query($sql);
                        if ($result) {
                            if ($result->num_rows > 0) {	
                                while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
                                    // Process the Result here , need to modify.
                                    echo'<tr>'.
                                        '<td>'.$row['title'].'</td>'.
                                        '<td>'.$row['borrowdate'].'</td>'.
                                        '<td>'.$row['duedate'].'</td>'.
                                    '</tr>';
                                }
                            } else {
                                echo '<tr>0 results</tr>';
                            }
                        } else {
                            echo "<tr>查詢失敗</tr>";
                        }      
                    ?>
                </table>

            </form>
        </div>
        
    </body>
</html>
