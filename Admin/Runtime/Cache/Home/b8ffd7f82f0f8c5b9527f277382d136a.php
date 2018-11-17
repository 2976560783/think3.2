<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>operate</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js">
    </script>
    <script>
        function searchData(){
            $.ajax({
                url: "/think3.2/admin.php?s=/Home/Index/cost",
                data: {table: "user_info",
                    name:document.getElementById('nameCost').value
                },
                type: "POST",
                datatype: "JSON",
                success: function (result) {
                    $("#show").html(result);
                }
            })
        }
        $(document).ready(function () {
            $("#admin").click(function () {
                $.ajax({
                    url: "/think3.2/admin.php?s=/Home/Index/read",
                    data: {table: "admin"},
                    type: "POST",
                    datatype: "JSON",
                    success: function (result) {
                        $("#show").html(result);
                    }
                })
            })
            $("#room_set").click(function () {
                $.ajax({
                    url: "/think3.2/admin.php?s=/Home/Index/read",
                    data: {table: "room_set"},
                    type: "POST",
                    datatype: "JSON",
                    success: function (result) {
                        $("#show").html(result);
                    }
                })
            })
            $("#room_state").click(function () {
                $.ajax({
                    url: "/think3.2/admin.php?s=/Home/Index/read",
                    data: {table: "room_state"},
                    type: "POST",
                    datatype: "JSON",
                    success: function (result) {
                        $("#show").html(result);
                    }
                })
            })
            $("#user_info").click(function () {
                $.ajax({
                    url: "/think3.2/admin.php?s=/Home/Index/read",
                    data: {table: "user_info"},
                    type: "POST",
                    datatype: "JSON",
                    success: function (result) {
                        $("#show").html(result);
                    }
                })
            })
        })
    </script>
</head>
<body>
<table>
    <tr>
        <td id="admin">管理员数据管理</td>
    </tr>
    <tr>
        <td id="room_set">房间设置</td>
    </tr>
    <tr>
        <td id="room_state">房间使用情况</td>
    </tr>
    <tr>
        <td id="user_info">客户预定房间信息</td>
    </tr>
    <tr>
        <td>结账</td>
        <td><input type="text" id="nameCost" onkeyup="searchData()"/></td>
    </tr>
</table>
<HR style="FILTER: progid:DXImageTransform.Microsoft.Shadow(color:#987cb9,direction:145,strength:15)" width="100%" color=#987cb9 SIZE=1>
<div id="show"></div>

</body>
</html>