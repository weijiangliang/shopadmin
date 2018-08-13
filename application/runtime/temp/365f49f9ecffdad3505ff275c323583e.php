<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\shop\public/../application/admin\view\product\product_brand_add.html";i:1533349213;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-商品品牌添加</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/static/css/font.css">
    <link rel="stylesheet" href="/static/static/css/weadmin.css">
    <link rel="stylesheet" href="/static/static/css/bootstrap.min.css">
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
	      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
	      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
</head>

<body>
    <div class="title">
        <i class="back">＜ </i>
        <span>品牌</span>
        <i> 商品品牌添加和管理</i>
    </div>
    <form action="<?php echo url('admin/product/product_brand_add'); ?>" enctype="multipart/form-data" method="post">
        <div class="inp_box">
            <span >品牌名称：</span>
            <input type="text" name="brand_name" class="inp_list">
        </div>
          <div class="inp_box">
            <span>品牌网址：</span>
            <input type="text" name="url" class="inp_list">
        </div>
         <div class="inp_box">
            <span>品牌logo：</span>
            <input type="file" name="brand_logo" class="inp_list">
        </div>
        <div class="inp_box">
            <span>所属分类：</span>
            <select name="parent_cate_id" class="sel" id="parent_id" > 
              <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): if( count($cate)==0 ) : echo "" ;else: foreach($cate as $key=>$v): ?>
            <option value="<?php echo $v['id']; ?>" ><?php echo $v['name']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <select name="cate_id" class="sel" id="cateson_id"> 
            <option value="3">111</option>
            </select>
        </div>
        <div class="inp_box">
            <span>能否推荐：</span>
            <input type="radio" name="is_hot" value="1"> 是
            <input type="radio" name="is_hot" value="2"> 否
        </div>
       
        <div class="inp_box">
            <span>描述：</span> <br>
            <span></span> <textarea name="desc" class="inp_text"> </textarea>
        </div>
        <div class="inp_box">
            <span>排序</span>
            <input type="text" name="sort" value="50" id="sort">
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
<script type="text/javascript" src="/static/static/js/jquery.js"></script>
<script type="text/javascript">
$(function(){
   $("#parent_id").change(function(){
    $("#cateson_id").html("");
      //var option = $("<option value='11'>333333</option>");
      // $("#cateson_id").append(option);
     var parent_id = $('#parent_id option:selected').val();
     $.post('ajax_category',{parent_id:parent_id},function(data){
        $.each(data, function (index,obj) {
           var option = $("<option value='"+obj.id+"'>"+obj.name+"</option>");
              $("#cateson_id").append(option);      
       });
});
});

});
</script>



</html>