<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js">
    </script>
    <script>
        $("tr.updateForm").css('display','none');
        $("button.update").click(function () {
            $("tr.updateForm").toggle(1000);
        })
        $("tr.createForm").css('display','none');
        $("#create").click(function () {
            $("tr.createForm").toggle('1000');
        })
        function deleteUser(id) {
            $.ajax({
                url:"/think3.2/admin.php?s=/Home/Index/delete",
                data:{
                    table:"admin",
                    id:id
                },
                datatype:"JSON",
                type:"POST",
                success:function (result) {
                    $("#show").html(result);
                }
            })
        }
        function updateUser() {
            $.ajax({
                url:"/think3.2/admin.php?s=/Home/Index/update",
                data:{
                    table:"admin",
                    user:document.getElementById('userUpdate').value,
                    password:document.getElementById('passwordUpdate').value
                },
                datatype:"JSON",
                type:"POST",
                success:function (result) {
                    $("#show").html(result);
                }
            })
        }
        function createUser() {
            $.ajax({
                url:"/think3.2/admin.php?s=/Home/Index/create",
                data:{
                    table:"admin",
                    user:document.getElementById('userCreate').value,
                    password:document.getElementById('passwordCreate').value
                },
                datatype:"JSON",
                type:"POST",
                success:function (result) {
                    $("#show").html(result);
                }
            })
        }
    </script>
</head>
<body>

<table>
    <tr>
        <td>管理员账号</td>
        <td>密码</td>
        <td><button id="create">添加</button></td>
        <td><button class="update">修改</button></td>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
            <td id="user"><?php echo ($v["user"]); ?></td>
            <td id="password"><?php echo ($v["password"]); ?></td>
            <td><button onclick="deleteUser(<?php echo ($v["id"]); ?>)">删除</button></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr class="updateForm">
        <td><input type="text" id="userUpdate"></td>
        <td><input type="password" id="passwordUpdate"></td>
        <td><button onclick="updateUser()">确定</button> </td>
    </tr>
    <tr class="createForm">
        <td><input type="text" id="userCreate"></td>
        <td><input type="password" id="passwordCreate"></td>
        <td><button onclick="createUser()">确定</button> </td>
    </tr>
</table>


</body>
</html>