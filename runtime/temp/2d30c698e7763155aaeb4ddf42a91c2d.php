<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"E:\shop\public/../application/admin\view\product\product_attribute_add.html";i:1534488286;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="/static/static/js/jquery.js"></script>
</head>
<body>
    <div class="title">
        <i class="back">＜ </i>
        <span>商品属性</span>
        <i> 商品属性添加和管理</i>
    </div>
    <form action="<?php echo url('admin/product/product_attribute_add'); ?>" method="post">
        <div class="inp_box">
            <span>属性名称：</span>
            <input type="text" name="attr_name" class="inp_list">
        </div>
        <div class="inp_box">
            <span>所属模型：</span>
            <select name="type_id" class="sel">
                <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): if( count($type)==0 ) : echo "" ;else: foreach($type as $key=>$v): ?>
                <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?> </option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
        <div class="inp_box">
            <span>能否进行检索：</span>
            <input type="radio" name="indx" value="1"> 不需要检索
            <input type="radio" name="indx" value="2"> 关键字检索
        </div>
        <div class="inp_box">
            <span>该属性值的录入方式：</span>
            <!-- <div class="choice"> -->
            <input type="radio" name="luru" value="1"> 手工录入
            <input type="radio" name="luru" value="2"> 从下列的列表中选择（以逗号隔开）
            <input type="radio" name="luru" value="3"> 多行文本框
            <!-- </div> -->
        </div>
        <div class="inp_box">
            <span>属性值：</span> <br>
            <span></span> <textarea name="attr_values" class="inp_text"> </textarea>
        </div>
        <div class="inp_box">
            <span>排序</span>
            <input type="text" name="sort" value="50">
        </div>
        <div class="inp_box">
            <span></span>
            <input type="submit" name="sub" value="确认提交" class="sub"  id="btn1">
        </div>
    </form>
</body>
<script type="text/javascript">

$("#btn1").change(function(){
    alert(11);
    layer.closeAll();
});

</script>

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
</html>