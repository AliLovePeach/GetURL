<?php
$name="";
$jmpurl="";
$title="";
$png="";
$content="";

if (isset($_POST["username"]))
{
    $name=trim($_POST["username"]);

}
if (isset($_POST["jmpurl"]))
{
    $jmpurl=trim($_POST["jmpurl"]);
}
if (isset($_POST["title"]))
{
    $title=trim($_POST["title"]);
}
if (isset($_POST["png"]))
{
    $png=trim($_POST["png"]);
}
if (isset($_POST["content"]))
{
    $content=trim($_POST["content"]);
}
if (empty($name)||empty($jmpurl)||empty($title)||empty($png)||empty($content))
{
    echo"<script>alert('请填写');history.go(-1);</script>";
    die(0);
}
$randId=build_order_no();


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


    //在表user_list中插入数据
    $dbh->exec("insert into ipinfo( urlname, jmpurl, randid,title,png,content) values('$name','$jmpurl','$randId','$title','$png','$content')");
    if ($dbh->errorCode() != '00000')
    {echo "errorInfo为： ";
        print_r($pdo->errorInfo());
       die(0);
}
echo"<script>alert(\"生成完成！\"); top.location='index.php'; </script>";
function build_order_no()
{
    return base64_encode (date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8));
}

?>