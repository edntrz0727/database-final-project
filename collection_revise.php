<html>
    <head>
        <title>修改館藏資訊</title>
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
    <meta charsrt="utf-8">
    <body>
        <?php
            $conn=require_once "db_info.php";
            $ISBN=$_GET["id"];
            $sql = "SELECT * FROM book where ISBN = '$ISBN'";
            $result=mysqli_query($conn,$sql);
            $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
        ?>
        <div id="banner" class="banner" style="background-color:brown;">
			<p style="color: white; font-size: large;font-weight: bolder;margin-left: 5%;">三校資工圖書系統
		</div>
        <div id="option" style="width: 100%; text-align: center; margin-top: 2%;">
            <p style="color: brown;font-weight: bold;">修改館藏資訊</p>
            <form action="run_updatebook.php" method="post">
                <table style="margin-left: 40%;">
                    <tr>
                        <th>書籍名稱：</th>
                        <th>
                            <input type="text" name="title" value="<?php echo $row['title'] ?>" class="options" readonly>
                        </th>
                    </tr>
                    <tr>
                        <th>書籍作者：</th>
                        <th>
                            <input type="text" name="writer" value="<?php echo $row['writer'] ?>" class="options">
                        </th>
                    </tr>
                    <tr>
                        <th>ISBN：</th>
                        <th>
                            <input type="text" name="ISBN" value="<?php echo $row['ISBN'] ?>" class="options">
                        </th>
                    </tr>
                    <tr>
                        <th>書籍譯者：</th>
                        <th>
                            <input type="text" name="translator" value="<?php echo $row['translator'] ?>" class="options">
                        </th>
                    </tr>
                    <tr>
                        <th>書籍語言：</th>
                        <th>
                            <input type="text" name="language" value="<?php echo $row['language'] ?>" class="options">
                        </th>
                    </tr>
                    <tr>
                        <th>書籍科目：</th>
                        <th>
                            <input type="text" name="subjecthead" value="<?php echo $row['subjecthead'] ?>" class="options">
                        </th>
                    </tr>
                    <tr>
                        <th>版次：</th>
                        <th>
                            <input type="text" name="edition" value="<?php echo $row['edition'] ?>" class="options">
                        </th>
                    </tr>
                    <tr>
                        <th>出版日期：</th>
                        <th>
                            <input type="text" name="publishDate" value="<?php echo $row['publishDate'] ?>" class="options">
                        </th>
                    </tr>
                    <tr>
                        <th>出版商：</th>
                        <th>
                            <input type="text" name="company" value="<?php echo $row['company'] ?>" class="options">
                        </th>
                    </tr>
                    <tr>
                        <th>狀態：</th>
                        <th>
                            <input type="radio" name="state" value="空閒"<?php if($row['state']=='空閒'){echo "checked";}?>" class="options">空閒</input>
                            <input type="radio" name="state" value="沒還/遺失"<?php if($row['state']=='沒還/遺失'){echo "checked";}?>" class="options">沒還/遺失</input>
                            <input type="radio" name="state" value="預約中"<?php if($row['state']=='預約中'){echo "checked";}?>" class="options">預約中</input>
                            <input type="radio" name="state" value="借閱中"<?php if($row['state']=='借閱中'){echo "checked";}?>" class="options">借閱中</input>
                        </th>
                    </tr>
                </table>
                <input type="submit" name="button" value="修改資訊" style="background-color: brown;color: white;border: none;border-radius: 10%;margin-top: 2%;">
            </form>
        </div>
    </body>
</html>