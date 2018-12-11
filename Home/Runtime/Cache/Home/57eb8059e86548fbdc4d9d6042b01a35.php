<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>
    <tr>
        <?php if(is_array($cost)): $i = 0; $__LIST__ = $cost;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><td>花费:</td>
            <td><?php echo ($v["price"]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
    </tr>
</table>
</body>
</html>