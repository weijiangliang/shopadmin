<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\shop\public/../application/admin\view\advimage\advimage_list_edit.html";i:1534828270;}*/ ?>
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
        <form class="layui-form" enctype="multipart/form-data" action="<?php echo url('admin/Advimage/advimage_list_edit'); ?>"  method="post">
        <input type="hidden" name="id" value="<?php echo $adv['id']; ?>">
            <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>名称
				</label>
                <div class="layui-input-inline">
                    <input type="text" id="vip_id" name="ad_name" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="<?php echo $adv['ad_name']; ?>">
                </div>
             </div>
             <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>类型
				</label>
                <div class="layui-input-inline">
                 <input type="radio" name="media_type" value="1" <?php if($adv['media_type']==1): ?> checked <?php endif; ?> >app轮播
                 <input type="radio" name="media_type" value="2" <?php if($adv['media_type']==2): ?> checked <?php endif; ?> >app启动页
              
                </div>
             </div>
               <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>链接地址
				</label>
                <div class="layui-input-inline">
                    <input type="text" id="vip_id" name="ad_link" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="<?php echo $adv['ad_link']; ?>">
                </div>
             </div>
               <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>图片上传
				</label>
                <div class="layui-input-inline">
                <img src="/uploads/<?php echo $adv['ad_img']; ?>">
                    <input type="file" id="vip_id" name="ad_img" lay-verify="required|nikename" autocomplete="off" class="layui-input">
                </div>
             </div>
               <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>排序
				</label>
                <div class="layui-input-inline">
                    <input type="text" id="vip_id" name="sort" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="<?php echo $adv['sort']; ?>">
                </div>
             </div>

            <div class="layui-form-item">
                <label for="vip_name" class="layui-form-label">
					<span class="we-red">*</span>状态显示
				</label>
                <div class="layui-input-inline">
                   <input type="radio" name="show_status" value="1" <?php if($adv['show_status']==1): ?> checked <?php endif; ?> >正常
                   <input type="radio" name="show_status" value="2" <?php if($adv['show_status']==2): ?> checked <?php endif; ?> >不显示
                </div>
            </div>
           
            <div class="layui-form-item">
                </label>
                <!-- <button class="layui-btn" lay-filter="add" lay-submit="" style="margin-left: 136px">确定</button> -->
             <input type="submit" value="确定" class="btn1">
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
    display: none;

 }
.btn1{
	    display: inline-block;
    height: 38px;
    line-height: 38px;
    padding: 0 18px;
    background-color: #009688;
    color: #fff;
    white-space: nowrap;
    text-align: center;
    font-size: 14px;
    border: none;
    border-radius: 2px;
    cursor: pointer;
    margin-left: 150px;
}
</body>

</html>