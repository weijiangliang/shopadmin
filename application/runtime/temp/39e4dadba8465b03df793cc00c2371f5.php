<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"E:\shop\public/../application/admin\view\user\exam_list_add.html";i:1533785880;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>多啦优选后台管理系统-身份认证</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/static/css/font.css">
    <link rel="stylesheet" href="/static/static/css/weadmin.css">
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
        <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
        <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body>
    <div class="title">
        <i class="back">＜ </i>
        <span>身份认证审核</span>
        <i> 身份认证审核管理</i>
    </div>
   <!--  <div class="Tips">
        <h4>* 操作提示</h4>
        <p>商品分类最多分为三级</p>
        <p>添加或者修改分类时应注意选择对应的上级</p>
        <h4>关于分类图标替换</h4>
        <p>WEB</p>
        <p>APP</p>
    </div> -->
        <div class="inp_box">
            <span>用户ID:</span>
            <input type="text" name="name" class="inp_list" value="<?php echo $auth['user_id']; ?>" >
        </div>
        <div class="inp_box">
            <span>真是姓名:</span>
            <input type="text" name="mobile_name" class="inp_list" value="<?php echo $auth['real_name']; ?>" >
        </div>
        <div class="inp_box">
            <span class="">身份证号:</span>
             <input type="text" name="mobile_name" class="inp_list" value="<?php echo $auth['cardno']; ?>" >
        </div>
        <div class="inp_box">
            <span>身份证手持照片:</span>
            <img src="<?php echo $auth['auth_img']; ?>">
        </div>
    <button style="color:blue"><a href="<?php echo url('admin/User/pass_exam'); ?>?user_id=<?php echo $auth['user_id']; ?>&id=<?php echo $auth['id']; ?>" style="color:blue">审核通过</a> </button> &nbsp;&nbsp;&nbsp;<button style="color:blue"><a href="<?php echo url('admin/User/nopass_exam'); ?>?user_id=<?php echo $auth['user_id']; ?>&id=<?php echo $auth['id']; ?>" style="color:blue">审核不过</a></button>
</body>


<style>
    .Tips {
        background-color: #efefef;
        padding: 10px 20px;
        margin: 6px;
    }
    
    .Tips p,
    .Tips h4 {
        margin: 6px 0 !important;
    }
    
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