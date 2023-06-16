<?php

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: managerindex.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
}

?>
<!Doctype html>
<html>
    <head>
        <title>館員登入</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <div>請輸入館員帳號密碼</div>
        <div id="login">
            <form action="managerlogin.php" method="post">
                帳號: <input type="text" name="ID" value=""><br>
                密碼: <input type="password" name="password" value=""><br>
                <input type="submit" name="button" value="登入">
            </form>
        </div>
    </body>
</html>