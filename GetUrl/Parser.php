<?php
$id=0;

//获取IP地址
if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown'))
{
    $onlineip = getenv('HTTP_CLIENT_IP');
}
elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown'))
{
    $onlineip = getenv('HTTP_X_FORWARDED_FOR');
}
elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown'))
{
    $onlineip = getenv('REMOTE_ADDR');
}
elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown'))
{
    $onlineip = $_SERVER['REMOTE_ADDR'];
}

if (isset($_GET["id"]))
{
    $id=$_GET["id"];

}
if (empty($id))
{
    die(0);
}


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

foreach ($dbh->query("SELECT * FROM ipinfo where randid='".$id."'") as $row) {
    $title= $row['jmpurl'];
    $sid= intval($row['id']);
    //在表user_list中插入数据
    $dbh->exec("insert into iplist( ipinfo_id, ip) values($sid,'$onlineip')");
    if ($dbh->errorCode() != '00000')
    {echo "errorInfo为： ";
        print_r($pdo->errorInfo());
        die(0);
    }
    echo"<script> top.location='$title'; </script>";

}

?>