<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"E:\shop\public/../application/admin\view\gift\gift_list_edit.html";i:1534825735;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>多啦优选后台管理系统-活动列表</title>
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
    <div class="weadmin-body">
        <form class="layui-form" enctype="multipart/form-data" action="<?php echo url('admin/Gift/gift_list_edit'); ?>"  method="post">
        <input type="hidden" name="id" value="<?php echo $gift['id']; ?>">
            <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>礼包名称
				</label>
                <div class="layui-input-inline">
                    <input type="text" id="vip_id" name="name" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="<?php echo $gift['name']; ?>">
                </div>
             </div>
            <!--  <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>发放类型
				</label>
                <div class="layui-input-inline">
                <select name="type" >
                <option value="1">下单赠送</option>
                </select>
                </div>
             </div> -->
               <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>缩略图
				</label>
                <div class="layui-input-inline">
                <img src="/uploads/<?php echo $gift['thumb']; ?>">
                    <input type="file" id="vip_id" name="thumb" lay-verify="required|nikename"   autocomplete="off" class="layui-input">
                </div>
             </div>
            
            <div class="layui-form-item">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="" style="margin-left: 136px">确定</button>
            </div>
        </form>
    </div>
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>

    	<script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>

   <style type="text/css">
 .layui-form-radio{
 	line-height: 28px;
    margin: 0px 0px  0; 
     padding-right: 0px; 
    cursor: pointer;
    font-size: 0;
 }
 </style>
</body>

</html>