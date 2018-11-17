<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js">
    </script>
    <script>

    </script>

</head>
<body>
<p style="width: 100%;height: 45px;display: block;line-height: 45px;text-align: center;">请登录
<p>
<table width="1000" height="100" align="center">
    <form action="/think3.2/admin.php?s=/Home/Index/check" method="post">
        <tr>
            <td align="center" valign="middle">用户名</td>
            <td><input type="text" name="user"></td>
        </tr>
        <tr>
            <td align="center" valign="middle">密码</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td align="center" vlign="middle">
                <input type="submit" value="登录" class="bun">
                <input type="reset" value="重置" class="bun">
            </td>
        </tr>
    </form>
</table>
</body>
</html>