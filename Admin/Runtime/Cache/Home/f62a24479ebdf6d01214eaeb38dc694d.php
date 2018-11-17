<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js">
    </script>
    <script>
        $(document).ready(function(){
            $("#delete").click(function(){
                $.ajax({
                    url:"/think3.2/admin.php?s=/Home/Index/delete",
                    data:{
                        table:"admin",
                        user:$.trim($("#user").text())
                    },
                    datatype:"JSON",
                    type:"POST",
                    success:function(result){
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
        <td>管理员账号</td>
        <td>密码</td>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
            <td id="user"><?php echo ($v["user"]); ?></td>
            <td id="password"><?php echo ($v["password"]); ?></td>
            <td id="update">修改</td>
            <td id="delete">删除</td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>


</body>
</html>