<?php
$id=0;


if (isset($_GET["id"]))
{
    $id=intval($_GET["id"]);

}

if ($id==0)
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

foreach ($dbh->query("SELECT * FROM ipinfo where id=".$id) as $row) {
    $title= $row['title'];
    $png= $row['png'];
    $content= $row['content'];
    $magic=$row['randid'];
   // http://connect.qq.com/widget/shareqq/index.html?url=http%3A%2F%2Fbbs.microdesktop.com/index.php%3Fid%3D41P3w80rxV2&desc=&title=%E8%85%BE%E4%BF%A1%20-%20%E9%80%81qb&summary=%E9%A9%AC%E5%8C%96%E8%85%BE70%E5%B2%81%E7%94%9F%E6%97%A5%EF%BC%8C%E7%8E%B0%E5%9C%A8%E6%AF%8F%E4%BA%BA%E9%80%81100%E4%B8%AAqb%EF%BC%88%E6%9D%A5%E8%87%AA%20PC%20%E9%85%B7%E7%8B%97%E9%9F%B3%E4%B9%90%EF%BC%89&pics=http://imge.kugou.com/stdmusic/135/20150720/20150720173400344661.jpg&flash=&site=bbs.microdesktop.com
    echo "http://connect.qq.com/widget/shareqq/index.html?url=http://bbs.microdesktop.com/GetUrl/Parser.php?id=".$magic."&desc=&title=".$title."&summary=".$content."&pics=".$png."&flash=&site=bbs.microdesktop.com";
}

?>