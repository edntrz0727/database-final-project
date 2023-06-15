<html>
    <head>
        <title>閱讀狀態</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <div id="state">
            <form action="read_state.php" method="get">
                <table>
                    <tr>
                        <th>館藏名稱</th>
                        <th>借閱狀態</th>
                    </tr>
                </table>
            </form>
        </div>
        <?php

            $conn=require_once "config.php";

            session_start();

            //$libraryID = $_SESSION['libraryID'];
            $libraryID = '1111111';

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
                    echo "0 results";
                }
            } else {
                echo "查詢失敗";
            }

                            
        ?>
    </body>
</html>
