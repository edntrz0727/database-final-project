<html>
    <head>
        <title>館藏管理</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="https://kit.fontawesome.com/998bef7baf.js" crossorigin="anonymous"></script>
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
        <?php
            $conn=require_once "db_info.php";
            $search=$_POST["search"];
            $order = $_GET["order"];
            if($order == ''){
                $order = 0;
            }
            if($type == ''){
                $type=$_POST["type"];
            }
            if($search == ''){
                if($order == 0){
                    $sql = "SELECT * FROM book order by $type ASC";
                    $order = 1;
                }else if($order == 1){
                    $sql = "SELECT * FROM book order by $type DESC";
                    $order = 0;
                }
            }else{
                $sql = "SELECT * FROM book where $type like '%$search%'";
            }
            $result=mysqli_query($conn,$sql);
        ?>
        <div id="banner" class="banner" style="background-color:brown;">
			<p style="color: white; font-size: large;font-weight: bolder;margin-left: 5%;">三校資工圖書系統
		</div>
        <form action="htmlsearchbook.php?order=<?php echo $order;?>"method="post">
            <div id="search collection" style="margin-top: 2%; text-align: center;">
                <p style="font-size: large;font-weight: bold;color: brown;">館藏查詢</p>
                <input type="text" name="search" id="search" placeholder="尋找...">
                <button class="search" style="margin-top:1%;"><i class="fas fa-search"></i></button>
                <input type="radio" name="type" value="ISBN" checked>ISBN</input>
                <input type="radio" name="type" value="title">tilte</input>
                <input type="radio" name="type" value="subjecthead">subjecthead</input>
                <input type="radio" name="type" value="state">state</input>
            </div>
        </form>
        <div id="collections">
            <form action="" method="post">
                <table style="margin-left: 26%;margin-top: 1%;">
                    <tr>
                        <th>館藏名稱</th>
                    </tr>
                    <tr>
                        <th>
                            <?php
                                if ($result->num_rows > 0) {	
                                    while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
                                        echo "<a href='collection_info_check.php?ISBN=".$row['ISBN']."'>".$row['title']."</a><br>";
                                    }
                                }
                                mysqli_close($conn);
                            ?>
                        </th>
                    </tr>
                </table>
            </form>
        </div>
        <div id="add collection" style="text-align: center;">
            <input type="button" value="新增館藏" onclick="javascript:location.href='new_collection.html'" style="background-color: antiquewhite;color: brown;border: none;margin-top: 1%;"/>
        </div>
    </body>
</html>