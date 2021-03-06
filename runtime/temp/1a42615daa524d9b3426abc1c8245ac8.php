<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\shop\public/../application/admin\view\logistics\express_edit.html";i:1534150156;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <div class="title">
        <i class="back">＜ </i>
        <span>快递类型</span>
        <i> 快递类型添加和管理</i>
    </div>
    <form enctype="multipart/form-data" action="<?php echo url('admin/Logistics/express_edit'); ?>" method="post" >
    <input type="hidden" name="shipping_id" value="<?php echo $shipping['shipping_id']; ?>">
        <div class="inp_box">
            <span>快递名称：</span>
            <input type="text" name="shipping_name" class="inp_list" value="<?php echo $shipping['shipping_name']; ?>" >
        </div>
        <div class="inp_box">
            <span>快递编码：</span>
            <input type="text" name="shipping_code" class="inp_list" value="<?php echo $shipping['shipping_code']; ?>">
        </div>
        <div class="inp_box">
            <span>快递logo：</span>
            <img src="/uploads/<?php echo $shipping['shipping_logo']; ?>" style="height: 60px;width: 80px">
            <input type="file" name="shipping_logo" class="inp_list" >
        </div>
        <div class="inp_box">
            <span>描述：</span> <br>
            <span></span> <textarea name="shipping_desc" class="inp_text"><?php echo $shipping['shipping_desc']; ?> </textarea>
        </div>
       
        <div class="inp_box">
            <span></span>
            <input type="submit" name="sub" value="确认提交" class="sub">
        </div>
    </form>
</body>


<style>
    .title {
        background-color: bisque;
        padding: 20px 20px;
        border-radius: 6px;
    }
    
    .title span {
        font-size: 18px;
        font-weight: 700;
    }
    
    .title .back {
        display: inline-block;
        background-color: rgb(182, 167, 145);
        width: 28px;
        height: 28px;
        line-height: 26px;
        font-size: 26px;
        border-radius: 50%;
        font-weight: 800;
        margin-right: 6px;
        color: #424242;
    }
    
    .title i {
        margin-left: 10px;
        font-style: normal;
    }
    
    from {
        margin: 20px 20px;
    }
    
    .inp_box {
        padding: 12px 0;
    }
    
    .inp_box:nth-of-type(even) {
        background-color: #fbfbfb;
        border-top: 1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .choice {
        margin-top: 4px;
    }
    
    .sel {
        width: 160px;
        height: 26px;
    }
    
    .inp_text {
        width: 400px;
        height: 100px;
    }
    
    .inp_list {
        width: 240px;
        height: 20px;
    }
    
    .sub {
        margin-top: 10px;
        width: 100px;
        height: 32px;
    }
    
    form span {
        display: inline-block;
        width: 200px;
        text-align: right;
        margin-right: 4px;
    }
</style>

</html>