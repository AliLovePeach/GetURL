<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}
?>
<a href ="AddH.php">Add Item</a>

<!-- this table is show all info in database -->
<table >
    <tr>
        <th style="width: 160px;">ID</th>
        <th style="width: 160px;">NAME</th>
        <th style="width: 240px;">JMPURL</th>
        <th style="width: 260px;">MAGIC</th>
        <th style="width: 40px;">CreateUrl</th>
        <th style="width: 40px;">LOOKIP</th>
        <th style="width: 40px;">DELETE</th>
    </tr>
    <?php
    header('content-type:text/html;charset=utf-8');
    //连接数据库
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


    foreach ($dbh->query("SELECT * FROM ipinfo") as $row) {
        ?>
        <tr>
            <td style="width: 160px;"><?= $row['id'] ?></td>
            <td style="width: 160px;"><?= $row['urlname'] ?></td>
            <td style="width: 240px;"><?= $row['jmpurl'] ?></td>
            <td style="width: 260px;"><?= $row['randid'] ?></td>
            <td style="width: 40px;"><a href="lookurl.php?id=<?= $row['id'] ?>">LookURL</a></td>
            <td style="width: 40px;"><a href="lookip.php?id=<?= $row['id'] ?>">LookIP</a></td>
            <td style="width: 40px;"><a href="delete.php?id=<?= $row['id'] ?>">Delete</a></td>

        </tr>

        <?php
    }
    ?>

</table>