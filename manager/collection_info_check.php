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
    <meta charset="utf-8">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteLinks = document.querySelectorAll('.delete-link');
            deleteLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    var check = confirm('確認刪除');
                    if (check === false) {
                        event.preventDefault(); // 取消默认行为，阻止链接的跳转
                    }
                });
            });
        });
    </script>
    <body>
        <?php 
            $conn=require_once "db_info.php";
            $ISBN=$_GET["ISBN"];
            $sql = "SELECT * FROM book where ISBN = $ISBN";
            $result=mysqli_query($conn,$sql);	
            $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC );
        ?>
        <div id="banner" class="banner" style="background-color:brown;">
			<p style="color: white; font-size: large;font-weight: bolder;margin-left: 5%;">三校資工圖書系統
		</div>
        <div id="collection info" style="text-align: center;">
            <p style="margin-top: 2%;font-weight: bold;font-size: large;color: brown;">館藏資訊</p>
            <form action="" method="get">
                <table style="margin-left: 35%;">
                    <tr>
                        <th>館藏名稱：</th>
                        <th><?php echo $row['title'] ?></th>
                    </tr>
                    <tr>
                        <th>書籍作者：</th>
                        <th><?php echo $row['writer'] ?></th>
                    </tr>
                    <tr>
                        <th>ISBN：</th>
                        <th><?php echo $row['ISBN'] ?></th>
                    </tr>
                    <tr>
                        <th>書籍譯者：</th>
                        <th><?php echo $row['translator'] ?></th>
                    </tr>
                    <tr>
                        <th>書籍語言：</th>
                        <th><?php echo $row['language'] ?></th>
                    </tr>
                    <tr>
                        <th>書籍科目：</th>
                        <th><?php echo $row['subjecthead'] ?></th>
                    </tr>
                    <tr>
                        <th>版次：</th>
                        <th><?php echo $row['edition'] ?></th>
                    </tr>
                    <tr>
                        <th>出版日期：</th>
                        <th><?php echo $row['publishDate'] ?></th>
                    </tr>
                    <tr>
                        <th>出版商：</th>
                        <th><?php echo $row['company'] ?></th>
                    </tr>
                </table>
            </form>
                <input type="button" value="修改館藏資訊" onclick="javascript:location.href='collection_revise.php?id=<?php echo $row['ISBN'] ?>'" style="margin-top: 2%;background-color: antiquewhite;color: brown;border: none;"/>
                <input type="button" value="刪除館藏" onclick="javascript:location.href='deletebook.php?id=<?php echo $row['ISBN'] ?>'" style="margin-left: 5%; background-color: antiquewhite;color: brown;border: none;" class='delete=link'/>
        </div>
        
    </body>
</html>