<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js">
    </script>
    <script>
        $("tr.createForm").css('display','none');
        $("button.createForm").click(function () {
            $("tr.createForm").toggle(1000);
        })
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
        function updateForm() {
            $.ajax({
                url:"/think3.2/admin.php?s=/Home/Index/update",
                data:{
                    table:"user_info",
                    name:document.getElementById('updateName').value,
                    phone:document.getElementById('updatePhone').value,
                    user_number:document.getElementById('updateUser_number').value,
                    book_room:document.getElementById('updateBook_room').value,
                    in_date:document.getElementById('updateIn_date').value,
                    out_date:document.getElementById('updateOut_date').value
                },
                datatype:"JSON",
                type:"POST",
                success:function(result){
                    $("#show").html(result);
                }
            })
        }
        function create() {
            $.ajax({
                url:"/think3.2/admin.php?s=/Home/Index/create",
                data:{
                    table:"user_info",
                    name:document.getElementById('createName').value,
                    phone:document.getElementById('createPhone').value,
                    user_number:document.getElementById('createUser_number').value,
                    book_room:document.getElementById('createBook_room').value,
                    in_date:document.getElementById('createIn_date').value,
                    out_date:document.getElementById('createOut_date').value
                },
                datatype:"JSON",
                type:"POST",
                success:function(result){
                    $("#show").html(result);
                }
            })
        }

        $("tr.updateForm").css('display','none');
        $("button.updateForm").click(function () {
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
        <td><button class="createForm">添加</button></td>
        <td><button class="updateForm">修改</button></td>

    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($v["name"]); ?></td>
            <td><?php echo ($v["phone"]); ?></td>
            <td><?php echo ($v["user_number"]); ?></td>
            <td><?php echo ($v["book_room"]); ?></td>
            <td><?php echo ($v["in_date"]); ?></td>
            <td><?php echo ($v["out_date"]); ?></td>
            <td>
                <button onclick="deleteId(<?php echo ($v["id"]); ?>)">删除</button>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr class="updateForm">
        <td><input type="text" id="updateName"> </td>
        <td><input type="number" id="updatePhone"></td>
        <td><input type="number" id="updateUser_number"></td>
        <td><input type="number" id="updateBook_room"></td>
        <td><input type="date" id="updateIn_date"></td>
        <td><input type="date" id="updateOut_date"></td>
        <td><button onclick="updateForm()">确定</button> </td>
    </tr>
    <tr class="createForm">
        <td><input type="text" id="createName"> </td>
        <td><input type="number" id="createPhone"></td>
        <td><input type="number" id="createUser_number"></td>
        <td><input type="number" id="createBook_room"></td>
        <td><input type="date" id="createIn_date"></td>
        <td><input type="date" id="createOut_date"></td>
        <td><button onclick="create()">确定</button> </td>
    </tr>


</table>




</body>
</html>