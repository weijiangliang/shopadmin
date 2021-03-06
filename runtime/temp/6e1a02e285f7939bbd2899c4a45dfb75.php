<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\shop\public/../application/admin\view\user\member_address_add.html";i:1533810958;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-添加会员收货地址</title>
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
        <form class="layui-form" action="<?php echo url('admin/User/member_address_add'); ?>" method="post">
            <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>用户id
				</label>
                <div class="layui-input-inline">
                    <input type="text" id="vip_id" name="user_id" lay-verify="required|nikename" autocomplete="off" class="layui-input" placeholder="请输入用户的user_id">
                </div>
                <!-- <div class="layui-form-mid layui-word-aux">
						请设置至少5个字符，将会成为您唯一的登录名
					</div> -->
            </div>
            <th class="my_vip_list"></th>
            <div class="layui-form-item">
                <label for="vip_name" class="layui-form-label">
					<span class="we-red">*</span>收件人姓名
				</label>
                <div class="layui-input-inline">
                    <input type="text" id="" name="name" lay-verify="required|nikename" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="vip_name" class="layui-form-label">
					<span class="we-red">*</span>身份证号
				</label>
                <div class="layui-input-inline">
                    <input type="text" id="" name="id_card" lay-verify="required|nikename" autocomplete="off" class="layui-input">
                </div>
            </div>
           <div class="layui-form-item">
                <label for="vip_name" class="layui-form-label">
					<span class="we-red">*</span>收件人电话
				</label>
                <div class="layui-input-inline">
                    <input type="text" id="" name="phone" lay-verify="required|nikename" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="vip_name" class="layui-form-label">
                            <span class="we-red">*</span>收货地址
                        </label>
                <div class="layui-input-inline">
                    <input type="text" id="" name="address" lay-verify="required|nikename" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn my_sure" lay-filter="add" lay-submit="" style="margin-left: 136px">确定</button>
            </div>
        </form>
    </div>
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
</body>

</html>