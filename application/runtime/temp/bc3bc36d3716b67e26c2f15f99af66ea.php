<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"E:\shop\public/../application/admin\view\user\member_add.html";i:1533541418;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>XXXX后台管理系统-添加会员</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="/static/static/css/font.css">
<!-- 	<link rel="stylesheet" href="/static/static/css/weadmin.css"> -->
	<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
	<!--[if lt IE 9]>
	      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
	      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
</head>

<body>
	<div class="weadmin-body">
		<form class="layui-form" method="post" action="<?php echo url('admin/user/member_add'); ?>">
			<div class="layui-form-item">
				<label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>会员ID
				</label>
				<div class="layui-input-inline">
					<input type="text" id="vip_id" name="vip_id" lay-verify="required|nikename" autocomplete="off" class="layui-input">
				</div>
				<!-- <div class="layui-form-mid layui-word-aux">
						请设置至少5个字符，将会成为您唯一的登录名
					</div> -->
			</div>
			<div class="layui-form-item">
				<div class="layui-input-inline">
					<input type="text" id="vip_name" name="vip_name" lay-verify="required|nikename" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="vip_sex" class="layui-form-label">性别</label>
              <input type="radio" name="sex" value="1">男
              <input type="radio" name="sex" value="2">女
              <input type="radio" name="sex" value="3">保密
			</select>
			</div>

			<div class="layui-form-item">
				<label for="vip_phone" class="layui-form-label">
					<span class="we-red">*</span>手机
				</label>
				<div class="layui-input-inline">
					<input type="text" id="vip_phone" name="vip_phone" lay-verify="required|phone" autocomplete="" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="vip_email" class="layui-form-label">
					<span class="we-red">*</span>微信
				</label>
				<div class="layui-input-inline">
					<input type="text" id="vip_email" name="vip_email" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="vip_address" class="layui-form-label">
					<span class="we-red">*</span>地址
				</label>
				<div class="layui-input-inline">
					<input type="text" id="vip_address" name="user_address" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="vip_date" class="layui-form-label">
					<span class="we-red">*</span>申请为会员时间
				</label>
				<div class="layui-input-inline">
					<input type="datetime-local" id="vip_date" name="add_time" autocomplete="off" class="layui-input">
				</div>
			</div>
			<div class="layui-form-item">
				</label>
				<input class="layui-btn" type="submit" value="确定" />
			</div>
		</form>
	</div>
<!-- 	<script src="/static/lib/layui/layui.js" charset="utf-8"></script> -->

	<!-- <script>
		layui.extend({
			admin: '{/}/static/static/js/admin'
		});
		layui.use(['form', 'jquery', 'util', 'admin', 'layer'], function () {
			var form = layui.form,
				$ = layui.jquery,
				util = layui.util,
				admin = layui.admin,
				layer = layui.layer;

			//自定义验证规则
			form.verify({
				nikename: function (value) {
					if (value.length < 5) {
						return '昵称至少得5个字符啊';
					}
				},
				pass: [/(.+){6,12}$/, '密码必须6到12位'],
				repass: function (value) {
					if ($('#L_pass').val() != $('#L_repass').val()) {
						return '两次密码不一致';
					}
				}
			});
			//失去焦点时判断值为空不验证，一旦填写必须验证
			$('input[name="email"]').blur(function () {
				//这里是失去焦点时的事件
				if ($('input[name="email"]').val()) {
					$('input[name="email"]').attr('lay-verify', 'email');
				} else {
					$('input[name="email"]').removeAttr('lay-verify');
				}
			});

			//监听提交
			form.on('submit(add)', function (data) {
				//console.log(data.field);
				var f = data.field;
				//console.log(f.username);
				//console.log(f.sex);				
				//var sex = $('input:radio[name="sex"]:checked').val();

				//发异步，把数据提交给php
				layer.alert("增加成功", {
					icon: 6
				}, function () {
					//获取提交成功的时间
					var time = new Date();
					var timeNow = util.toDateString(time);
					// 获得frame索引
					var index = parent.layer.getFrameIndex(window.name);

					var _len = parent.$('#memberList tr').length;
					alert(_len);
					parent.$('#memberList').append(
						'<tr data-id="' + _len + '">' +
						'<td>' +
						'<div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="' + _len +
						'"><i class="layui-icon">&#xe605;</i></div>' +
						'</td>' +
						'<td>' + _len + '</td>' +
						'<td>' + f.username + '</td>' +
						'<td>' + f.sex + '</td>' +
						'<td>' + f.phone + '</td>' +
						'<td>' + f.email + '</td>' +
						'<td>北京市西城区</td>' +
						'<td>' + timeNow + '</td>' +
						'<td class="td-status"><span class="layui-btn layui-btn-normal layui-btn-xs">已启用</span></td>' +
						'<td class="td-manage">' +
						'<a onclick="member_stop(this,\'10001\')" href="javascript:;" title="启用"><i class="layui-icon">&#xe601;</i></a>' +
						'<a title="编辑" onclick="WeAdminShow(\'编辑\',\'./edit.html\',600,400)" href="javascript:;"><i class="layui-icon">&#xe642;</i></a>' +
						'<a onclick="WeAdminShow(\'修改密码\',\'./password.html\',600,400)" title="修改密码" href="javascript:;"><i class="layui-icon">&#xe631;</i></a>' +
						'<a title="删除" onclick="member_del(this,\'要删除的id\')" href="javascript:;"><i class="layui-icon">&#xe640;</i></a>' +
						'</td>' +
						'</tr>'
					);
					//关闭当前frame
					parent.layer.close(index);
				});
				return false;
			});

		});
	</script> -->
</body>

</html>