<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"E:\shop\public/../application/admin\view\admin\admin_role_add.html";i:1534321191;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>XXXX后台管理系统-角色管理添加</title>
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
			<form action="" method="post" class="layui-form layui-form-pane" action="<?php echo url('admin/admin/admin_role_add'); ?>" method="post">
				<div class="layui-form-item">
					<label for="role_name" class="layui-form-label">
                        <span class="we-red">*</span>角色名
                    </label>
					<div class="layui-input-inline">
						<input type="text" id="role_name" name="role_name" required="" lay-verify="required" autocomplete="off" class="layui-input">
					</div>
				</div>
				<!-- <div class="layui-form-item layui-form-text">
					<label class="layui-form-label">
                        拥有权限
                    </label>
					<table class="layui-table layui-input-block">
						<tbody>
							<tr>
								<td>
									用户管理
									<input name="id[]" type="checkbox" value="2">
								</td>
								<td>
									<div class="layui-input-block">
										<input name="id[]" type="checkbox" value="2"> 用户停用
										<input name="id[]" type="checkbox" value="2"> 用户删除
										<input name="id[]" type="checkbox" value="2"> 用户修改
										<input name="id[]" type="checkbox" value="2"> 用户改密
										<input name="id[]" type="checkbox" value="2"> 用户列表
									</div>
								</td>
							</tr>
													</tbody>
					</table>
				</div> -->
				<div class="layui-form-item layui-form-text">
					<label for="user_desc" class="layui-form-label">
                        描述
                    </label>
					<div class="layui-input-block">
						<textarea placeholder="请输入内容" id="user_desc" name="role_desc" class="layui-textarea"></textarea>
					</div>
				</div>
				<div class="layui-form-item">
					<button class="layui-btn" lay-submit="" lay-filter="add">增加</button>
				</div>
			</form>
		</div>
		<script src="/static/lib/layui/layui.js" charset="utf-8"></script>
<!-- 		<script type="text/javascript">
			layui.extend({
				admin: '/static/static/js/admin'
			});
			layui.use(['form', 'layer', 'admin'], function() {
				var form = layui.form,
					admin = layui.admin,
					layer = layui.layer;

				//监听提交
				form.on('submit(add)', function(data) {
					console.log(data);
					//发异步，把数据提交给php
					layer.alert("增加成功", {
						icon: 6
					}, function() {
						// 获得frame索引
						var index = parent.layer.getFrameIndex(window.name);
						//关闭当前frame
						parent.layer.close(index);
					});
					return false;
				});

			});
		</script> -->
	</body>

</html>