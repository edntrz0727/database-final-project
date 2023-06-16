<?php

session_start();  //很重要，可以用的變數存在session裡
$name=$_SESSION["name"];
//var_dump($_SESSION);
echo "你好,館員 ".$name."<br>";
echo "以下是功能列<br>";
echo "<div id=function>";
echo "<li><a href='checksource.html'>館藏管理</a></li>";
echo "<li><a href='reader.php'>讀者管理</a></li>";
echo "<li><a href='equipment.php'>設施管理</a></li>";
echo "<li><a href='reciverecommand.php'>讀者建議書單管理</a></li>";
echo "<li><a href='message.php'>公告管理</a></li>";
echo "<li><a href='recommand.php'>館員推薦書單</a></li><br>";
echo "<form action='managerlogout.php'><input type='submit' name='button' value='登出'></form>";
    
?>