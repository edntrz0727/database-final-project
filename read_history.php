<html>
    <head>
        <title>閱讀紀錄</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <div>
            <form action="" method="get">
                <table>
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
                <input type="button" value="新增筆記" onclick="javascript:location.href='new_note.html'"/>
            </form>
        </div>
    </body>
</html>