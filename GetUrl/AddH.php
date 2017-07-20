<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}
?>
<html>
<body>

<form enctype="multipart/form-data" action="Add.php" method="post">
    <table>
        <tr>
            <td><label for="txtname">user：</label></td>
            <td><input type="text" id="txtname" name="username" /></td>
        </tr>
        <tr>
            <td><label for="txtname">jmpurl：</label></td>
            <td><input type="text" id="txtname" name="jmpurl" /></td>
        </tr>
        <tr>
            <td><label for="txtpswd">title：</label></td>
            <td><input type="text" id="txtpswd" name="title" /></td>
        </tr>
        <tr>
            <td><label for="txtpswd">urlPng：</label></td>
            <td><input type="text" id="txtpswd" name="png" /></td>
        </tr>
        <tr>
            <td><label for="txtpswd">Content：</label></td>
            <td>
                <textarea rows="3" cols="20" name="content">
                </textarea>
            </td>
        </tr>
        <tr>
            <td colspan=2>
                <input type="reset" />
                <input type="submit" />
            </td>
        </tr>
    </table>
</form>

</body>
</html>