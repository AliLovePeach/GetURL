<?php
session_start();

//注销登录
if(isset($_POST['action'])){
    if($_GET['action'] == "logout"){
        unset($_SESSION['userid']);
        unset($_SESSION['username']);
        echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
        exit;
    };
}


//登录
if(!isset($_POST['submit'])){
    exit('非法访问!');
}
$username = addslashes(htmlspecialchars($_POST['username']));
$password = MD5($_POST['password']);

//包含数据库连接文件
$dbms='mysql';
$host='localhost';
$dbName='ipaddrlist';
$user='root';
$pass='';
$dsn="$dbms:host=$host;dbname=$dbName";
try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e)
{
    echo 'Connection failed: ' . $e->getMessage();
}
foreach ($dbh->query("select uid from ipuser where username='$username' and password='$password' limit 1") as $row)
{
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $row['uid'];
    echo"<script> top.location='index.php'; </script>";
    exit;
}

    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');


?>