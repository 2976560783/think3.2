<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js">
    </script>
    <script>
        function deleteId(id){
            $.ajax({
                url:"/think3.2/admin.php?s=/Home/Index/delete",
                data:{
                    table:"user_info",
                    id:id
                },
                datatype:"JSON",
                type:"POST",
                success:function(result){
                    $("#show").html(result);
                }

            })
        }
        function updateId(id) {

        }

        $("tr.updateForm").css('display','none');
        $("button.update").click(function () {
            $("tr.updateForm").toggle(1000);
        })
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
            <td>
                <button onclick="updateId(<?php echo ($v["id"]); ?>)" class="update">修改</button>
            </td>
            <td>
                <button onclick="deleteId(<?php echo ($v["id"]); ?>)">删除</button>
            </td>
        </tr>
        <tr class="updateForm">
            <td><input type="text"> </td>
            <td>电话号码</td>
            <td>身份证号码</td>
            <td>预定的房间号</td>
            <td>入住日期</td>
            <td>离开日期</td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>



</table>




</body>
</html>