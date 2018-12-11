<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>
    <script>
        function change(id) {
            $.ajax({
                url:"/think3.2/admin.php?s=/Home/Index/change",
                data:{
                    id:id
                },
                type:"POST",
                datatype:"JSON",
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
        <td>姓名</td>
        <td>电话号码</td>
        <td>身份证号码</td>
        <td>预定的房间号</td>
        <td>入住日期</td>
        <td>离开日期</td>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($v["name"]); ?></td>
            <td><?php echo ($v["phone"]); ?></td>
            <td><?php echo ($v["user_number"]); ?></td>
            <td><?php echo ($v["book_room"]); ?></td>
            <td><?php echo ($v["in_date"]); ?></td>
            <td><?php echo ($v["out_date"]); ?></td>
            <td><button onclick="change(<?php echo ($v["id"]); ?>)">确认结账，修改房间信息</button> </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
        <td>顾客支付费用</td>
    </tr>
    <?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
            <td>
                <?php echo ($v["price"]); ?>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>



</body>
</html>