<!-- this table is show all info in database -->
<table >
    <tr>
        <th style="width: 160px;">ID</th>
        <th style="width: 160px;">IP</th>

    </tr>
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

foreach ($dbh->query("SELECT * FROM iplist where ipinfo_id=".$id) as $row) {
    ?>
    <tr>
        <td style="width: 160px;"><?= $row['id'] ?></td>
        <td style="width: 160px;"><?= $row['ip'] ?></td>


    </tr>
    <?php
}

?>
    </table>
