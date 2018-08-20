<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"E:\shop\public/../application/admin\view\admin\admin_list.html";i:1534472043;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>XXXX后台管理系统-管理员列表</title>
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
		<div class="weadmin-nav">
			<span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">管理员管理</a>
        <a>
          <cite>管理员列表</cite></a>
      </span>
			<a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
				<i class="layui-icon" style="line-height:30px">ဂ</i></a>
		</div>
		<div class="weadmin-body">
			<div class="layui-row">
				<form class="layui-form layui-col-md12 we-search" action="<?php echo url('admin/admin/admin_list'); ?>" method="post">
					<!-- <div class="layui-inline">
						<input class="layui-input" placeholder="申请为管理员开始时间" name="start" id="start">
					</div>
					<div class="layui-inline">
						<input class="layui-input" placeholder="申请为管理员结束时间" name="end" id="end">
					</div> -->
					<div class="layui-inline">
						<input type="text" name="admin_name" placeholder="请输入管理员名称" autocomplete="off" class="layui-input">
					</div>
					<button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
				</form>
			</div>
			<div class="weadmin-block">
				<button class="layui-btn" onclick="WeAdminShow('添加管理员','admin_list_add.html')"><i class="layui-icon"></i>添加</button>
				<span class="fr" style="line-height:40px">共有数据:<?php echo $count; ?>条</span>
			</div>
			<table class="layui-table">
				<thead>
					<tr>
						<th>
							<div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
						</th>
						<th>ID</th>
						<th>用户名</th>
						<th>昵称</th>
						<th>性别</th>
						<th>邮箱</th>
						<th>角色id</th>
						<th>创建时间</th>
						<th>操作</th>
				</thead>
				<tbody>
				<?php if(is_array($admin) || $admin instanceof \think\Collection || $admin instanceof \think\Paginator): if( count($admin)==0 ) : echo "" ;else: foreach($admin as $key=>$v): ?>
					<tr>
						<td>
							<div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
						</td>
						<td><?php echo $v['admin_id']; ?></td>
						<td><?php echo $v['admin_name']; ?></td>
						<td><?php echo $v['admin_nickname']; ?></td>
						<td><?php echo $v['admin_sex']; ?></td>
						<td><?php echo $v['admin_email']; ?></td>
						<td><?php echo $v['admin_role_id']; ?></td>
						<td><?php echo $v['admin_create_time']; ?></td>
						<td>
							<a title="编辑" onclick="WeAdminShow('编辑当前管理员信息','admin_list_edit.html?admin_id=<?php echo $v['admin_id']; ?>')" href="javascript:;">
								<i class="layui-icon">&#xe642;</i>编辑
							</a>
							<a title="编辑" onclick="WeAdminShow('分配管理员权限','admin_editrole.html?id=<?php echo $v['admin_id']; ?>')" href="javascript:;">
								<i class="layui-icon">&#xe642;</i>分配角色
							</a>
							<a title="删除" onclick="admin_list('<?php echo $v['admin_id']; ?>')" href="javascript:;">
								<i class="layui-icon">&#xe640;</i>删除
							</a>
						</td>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>

<!-- 		<script type="text/javascript" src="/static/static/js/jquery.js"></script>		 -->
	<!-- 	<script src="/static/lib/layui/layui.js" charset="utf-8"></script> -->
		<script src="/static/lib/layui/layui.js" charset="utf-8"></script>

    	<script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
    	<script src="/static/static/js/jquery.js" charset="utf-8"></script>

	</body>
<script type="text/javascript">
function admin_list(id){
	$.post('admin_list_del',{admin_id:id},function(data){
		if(data.status==1){
			alert(data.msg);
			window.location.reload();
		}else{
			alert('删除失败');
		}
	});
}
</script>
</html>