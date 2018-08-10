<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"E:\shop\public/../application/admin\view\product\product_category_add.html";i:1533283096;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-商品分类添加</title>
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
        <span>商品分类</span>
        <i> 商品分类添加和管理</i>
    </div>
    <div class="Tips">
        <h4>* 操作提示</h4>
        <p>商品分类最多分为三级</p>
        <p>添加或者修改分类时应注意选择对应的上级</p>
        <h4>关于分类图标替换</h4>
        <p>WEB</p>
        <p>APP</p>
    </div>
    <form action="<?php echo url("","",true,false);?>" enctype="multipart/form-data" method="post">
        <div class="inp_box">
            <span>分类名称：</span>
            <input type="text" name="name" class="inp_list">
        </div>
        <div class="inp_box">
            <span>手机分类名称：</span>
            <input type="text" name="mobile_name" class="inp_list" placeholder="手机分类名称">
        </div>
        <div class="inp_box">
            <span>上级分类：</span>
         <select name="parent_id">
                    <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): if( count($cate)==0 ) : echo "" ;else: foreach($cate as $key=>$v): ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
        </div>
        <div class="inp_box">
            <span>分类分组：</span>
            <select name="cate_group" class="sel">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    </select>
        </div>
        <div class="inp_box">
            <span class="">分类展示图片：</span>
            <input type="file" id="product_price" name="thumb" lay-verify="required|nikename" autocomplete="off" class="">
        </div>
        <div class="inp_box">
            <span>是否显示：</span>
            <input type="radio" name="is_show" value="1"> 是
            <input type="radio" name="is_show" value="0"> 否
        </div>
        <div class="inp_box">
            <span>是否热门：</span>
            <input type="radio" name="is_hot" value="1"> 是
            <input type="radio" name="is_hot" value="0"> 否
        </div>
        <div class="inp_box">
            <span>标签：</span>
            <input type="text" name="tag" class="inp_list">
        </div>
        <div class="inp_box">
            <span>排序</span>
            <input type="text" name="sort" value="50">
        </div>
        <div class="inp_box">
            <span></span>
            <input type="submit" name="sub" value="确认提交" class="sub">
        </div>
    </form>
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