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
                        table:"room_state",
                        room:$.trim($("#room").text())
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
        <td>房间</td>
        <td>状态是否为空</td>
        <td>1代表房间为空，0代表房间不空</td>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
            <td id="room"><?php echo ($v["room"]); ?></td>
            <td><?php echo ($v["empty"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>


</body>
</html>