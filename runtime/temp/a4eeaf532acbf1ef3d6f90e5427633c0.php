<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"E:\shop\public/../application/admin\view\product\product_mode_add.html";i:1533223722;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-商品模型添加</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/static/css/font.css">
    <link rel="stylesheet" href="/static/static/css/weadmin.css">
    <link rel="stylesheet" href="/static/static/css/bootstrap.min.css">
</head>

<body>
    <div class="weadmin-body">
        <div class="Tips">
            <h4>* 操作提示</h4>
            <p>商品模型是对不同商品的分组</p>
            <p>商品模型关联商品规格，商品属性</p>
            <p>一个商品归属到这个商品的模型就知道它在那里规格属性</p>
        </div>
        <form action="<?php echo url('admin/product/product_mode_add'); ?>" method="post">

            模型名称：<input type="text" name="name" value="" class="inp_box"><br />

            <input type="submit" name="sub" value="确认提交" class="sub">

        </form>

        <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    </div>
</body>
<style>
    .Tips {
        background-color: bisque;
        padding: 10px 20px;
        border-radius: 6px;
    }
    
    form {
        margin: 20px 0;
    }
    
    form .inp_box {
        width: 220px;
        height: 26px;
        outline: none;
    }
    
    form .sub {
        margin-top: 16px;
        margin-left: 80px;
        width: 80px;
        height: 32px;
        outline: none;
    }
</style>

</html>