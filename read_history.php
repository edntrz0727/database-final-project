<html>
    <head>
        <title>閱讀紀錄</title>
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
        <p style="color: brown;font-weight: bold;font-size: large;text-align: center;margin-top: 2%;">閱讀紀錄</p>
        <div>
            <form action="" method="get">
                <table style="margin-left: 44%;">
                    <tr>
                        <th>筆記名稱</th>
                        <th></th>
                    </tr>
            <?php
                session_start();
                $libraryID = $_SESSION['libraryID'];
                //$libraryID = '1111111';

                $conn=require_once "config.php";
                
                // ******** update your personal settings ******** 
                $sql = "SELECT * from READHISTORY where libraryID = '$libraryID'";	// set up your sql query
                $result = $conn->query($sql);	// Send SQL Query

                if ($result->num_rows > 0) {	
                    while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
                        // Process the Result here , need to modify.
                        echo'<tr>
                                <th>
                                    <a href="note.php?id='.$row['hisID'].'">'.$row['title'].'</a>
                                </th>
                            </tr>';
                    }
                } else {
                    echo "0 results";
                }

            ?>
                </table>
                <div class="btn" style="text-align: center;margin-top: 2%;">
                    <input type="button" value="新增筆記" onclick="javascript:location.href='new_note.html'" style=" background-color: antiquewhite;color: brown;border: none;"/>
                </div>
            </form>
        </div>
    </body>
</html>