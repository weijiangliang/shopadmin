<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\shop\public/../application/admin\view\admin\admin_rule_allot.html";i:1534324050;}*/ ?>
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
	</head>
	<body>
		<div class="weadmin-body">
			<form action="" method="post" class="layui-form layui-form-pane" action="<?php echo url('admin/admin/admin_role_allot'); ?>" method="post">
			<input type="hidden" name="role_id" value="<?php echo $role_id; ?>">
			<?php if(is_array($auth) || $auth instanceof \think\Collection || $auth instanceof \think\Paginator): if( count($auth)==0 ) : echo "" ;else: foreach($auth as $key=>$v): ?>
				<div class="layui-form-item">
					<label for="role_name" class="layui-form-label">
                        <span class="we-red">*</span><?php echo $v['menu_name']; ?>
                    </label>
					<div class="layui-input-inline">
						<input type="checkbox" i name="role_permissions[]"  lay-verify="required" autocomplete="off"  value="<?php echo $v['menu_id']; ?>" style="width: 15px;height: 20px;">
					</div>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				
				<div class="layui-form-item">
					<button class="layui-btn" lay-submit="" lay-filter="add">确定更新</button>
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