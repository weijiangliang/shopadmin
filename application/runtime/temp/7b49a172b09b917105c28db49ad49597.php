<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"E:\shop\public/../application/admin\view\user\member_edit.html";i:1533800691;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>XXXX后台管理系统-编辑会员</title>
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
		<form class="layui-form" action="<?php echo url('admin/User/member_edit'); ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
			<div class="layui-form-item">
				<label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>手机号
				</label>
				<div class="layui-input-inline">
					<input type="text" id="vip_id" name="phone" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="<?php echo $user['phone']; ?>"> 
				</div>
				<!-- <div class="layui-form-mid layui-word-aux">
						请设置至少5个字符，将会成为您唯一的登录名
					</div> -->
			</div>
			<div class="layui-form-item">
				<label for="vip_name" class="layui-form-label">
					<span class="we-red">*</span>用户昵称
				</label>
				<div class="layui-input-inline">
					<input type="text" id="vip_name" name="nickname" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="<?php echo $user['nickname']; ?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="vip_sex" class="layui-form-label">性别</label>
				<div class="layui-input-block" id="sex">
				<?php if($user['sex']==1): ?>
					<input type="radio" name="sex" value="2" title="男" >男
					<input type="radio" name="sex" value="3" title="女">女
					<input type="radio" name="sex" value="1" title="未知" checked>保密
					<?php elseif($user['sex']==2): ?>
					<input type="radio" name="sex" value="2" title="男" checked>男
					<input type="radio" name="sex" value="3" title="女">女
					<input type="radio" name="sex" value="1" title="未知">保密
					<?php else: ?>
					<input type="radio" name="sex" value="2" title="男" >男
					<input type="radio" name="sex" value="3" title="女" checked>女
					<input type="radio" name="sex" value="1" title="未知">保密
					<?php endif; ?>

				</div>
			</div>

			
			<div class="layui-form-item">
				<label for="vip_email" class="layui-form-label">
					<span class="we-red">*</span>用户会员等级
				</label>
				<div class="layui-input-inline">
				<select name="user_role">
				<?php if(is_array($level) || $level instanceof \think\Collection || $level instanceof \think\Paginator): if( count($level)==0 ) : echo "" ;else: foreach($level as $key=>$v): ?>
				<option value="<?php echo $v['level_id']; ?>" <?php if($v['level_id']==$user['user_role']): ?> selected <?php endif; ?>><?php echo $v['level_name']; ?></option>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</div>
			</div>
			<div class="layui-form-item">
				<label for="vip_address" class="layui-form-label">
					<span class="we-red">*</span>支付密码
				</label>
				<div class="layui-input-inline">
					<input type="text" id="vip_address" name="pay_password" autocomplete="off" class="layui-input" value="<?php echo $user['pay_password']; ?>">
				</div>
			</div>
			<div class="layui-form-item">
				<label for="vip_date" class="layui-form-label">
					<span class="we-red">*</span>生日
				</label>
				<div class="layui-input-inline">
					<input type="text" id="bt_date" name="birthday" autocomplete="off" class="layui-input" value="<?php echo $user['birthday']; ?>" >
				</div>
			</div>
			<div class="layui-form-item">
				<label for="L_repass" class="layui-form-label">
				</label>
				<button class="layui-btn" lay-filter="add" lay-submit="">确定</button>
			</div>
		</form>
	</div>
	<script src="/static/lib/layui/layui.js" charset="utf-8"></script>

	<!-- <script>
		layui.extend({
			admin: '{/}../../static/js/admin'
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