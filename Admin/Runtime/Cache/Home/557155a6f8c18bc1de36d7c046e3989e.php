<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js">
    </script>
    <script>
        $("td.updateForm").css('display','none');
        $("button.update").click(function () {
            $("td.updateForm").toggle(1000);
        })
        function updateRoom() {
            $.ajax({
                url:"/think3.2/admin.php?s=/Home/Index/update",
                data:{
                    table:"room_set",
                    class:document.getElementById('classUpdate').value,
                    state:document.getElementById('stateUpdate').value,
                    number:document.getElementById('numberUpdate').value,
                    price:document.getElementById('priceUpdate').value
                },
                datatype:"JSON",
                type:"POST",
                success:function (result) {
                    $("#show").html(result);
                }
            })
        }
        function deleteRoom(id) {
            $.ajax({
                url:"/think3.2/admin.php?s=/Home/Index/delete",
                data:{
                    table:"room_set",
                    id:id
                },
                datatype:"JSON",
                type:"POST",
                success:function (result) {
                    $("#show").html(result);
                }
            })
        }
        function createRoom() {
            $.ajax({
                url:"/think3.2/admin.php?s=/Home/Index/create",
                data:{
                    table:"room_set",
                    class:document.getElementById('classCreate').value,
                    state:document.getElementById('stateCreate').value,
                    number:document.getElementById('numberCreate').value,
                    price:document.getElementById('priceCreate').value
                },
                datatype:"JSON",
                type:"POST",
                success:function (result) {
                    $("#show").html(result);
                }
            })
        }
        $("td.createForm").css('display','none');
        $("#create").click(function () {
            $("td.createForm").toggle('1000');
        })


    </script>
</head>
<body>

<table>
    <tr>
        <td>类别</td>
        <td>房间号</td>
        <td>价格</td>
        <td>房间状态</td>
        <td><button id="create">添加</button></td>
        <td><button class="update">修改</button></td>
    </tr>
    <tr><td>修改时根据房间号来定</td></tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($v["class"]); ?></td>
            <td><?php echo ($v["number"]); ?></td>
            <td><?php echo ($v["price"]); ?></td>
            <td><?php echo ($v["state"]); ?></td>

            <td><button onclick="deleteRoom(<?php echo ($v["id"]); ?>)">删除</button></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
        <td class="updateForm"><input type="text" id="classUpdate"></td>
        <td class="updateForm"><input type="number"  id="numberUpdate"></td>
        <td class="updateForm"><input type="number" id="priceUpdate"></td>
        <td class="updateForm"><input type="text" id="stateUpdate"></td>
        <td class="updateForm"><button onclick="updateRoom()">确定</button></td>
    </tr>
    <tr>
        <td class="createForm"><input type="text" id="classCreate"></td>
        <td class="createForm"><input type="number"  id="numberCreate"></td>
        <td class="createForm"><input type="number" id="priceCreate"></td>
        <td class="createForm"><input type="text" id="stateCreate"></td>
        <td class="createForm"><button onclick="createRoom()">确定</button></td>
    </tr>

</table>


</body>
</html>