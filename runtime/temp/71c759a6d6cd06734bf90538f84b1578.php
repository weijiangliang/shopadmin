<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\shop\public/../application/admin\view\user\exam_list.html";i:1534416284;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>XXXX-后台管理系统-会员列表</title>
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
        <a href="">会员管理</a>
        <a>
          <cite>会员列表</cite></a>
      </span>
			<a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
				<i class="layui-icon" style="line-height:30px">&#x1002;</i></a>
		</div>
		<!-- <div id="testText">
			zheli是文字
		</div> -->
		<div class="weadmin-body">
			<div class="layui-row">
				<form class="layui-form layui-col-md12 we-search" action="<?php echo url('admin/User/exam_list'); ?>" method="post">
					会员搜索：
					<div class="layui-inline">
						<input type="text" name="user_id" placeholder="请输入会员ID" autocomplete="off" class="layui-input">
					</div>
					<button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
				</form>
			</div>
			<div class="weadmin-block">
				<span class="fr" style="line-height:40px">共有数据：<?php echo $count; ?>条</span>
			</div>
			<table class="layui-table" id="memberList">
				<thead>
					<tr>
						<th>
							<div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
						</th>
						<th>认证ID</th>
						<th>用户ID</th>
						<th>真实姓名</th>
						<th>身份证号</th>
						<th>身份证手持照片</th>
						<th>状态</th>
						<th>操作</th>
					</tr>
					
				</thead>
				<tbody>
				<?php if(is_array($auth) || $auth instanceof \think\Collection || $auth instanceof \think\Paginator): if( count($auth)==0 ) : echo "" ;else: foreach($auth as $key=>$v): ?>     
					<tr data-id="1">
						<td>
							<div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1"><i class="layui-icon">&#xe605;</i></div>
						</td>
						<td><?php echo $v['id']; ?></td>
						<td><?php echo $v['user_id']; ?></td>
						<td><?php echo $v['real_name']; ?></td>
						<td><?php echo $v['cardno']; ?></td>
						<td><img src="/uploads<?php echo $v['auth_img']; ?>" title="身份证"> </td>
						<td><a 
						onclick="WeAdminShow('审核','exam_list_add.html?id=<?php echo $v['id']; ?>',1000,600)"
						style="color:blue"> <?php echo exam_status($v['auth_status']); ?></a></td>
						<td class="td-status">
							<!-- <a title="编辑"  href="<?php echo url('admin/user/user_status'); ?>?id=<?php echo $v['id']; ?>&user_status=<?php echo $v['id']; ?>">
								<i class="layui-icon">&#xe642;</i>编辑
							</a> -->
							<a title="删除" href="<?php echo url('admin/user/member_del'); ?>?id=<?php echo $v['id']; ?>">
								<i class="layui-icon">&#xe640;</i>删除
							</a>
						</td>
					</tr>	
					<?php endforeach; endif; else: echo "" ;endif; ?>				
				</tbody>
			</table>
		</div>
		<!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
		<script src="/static/lib/layui/layui.js" charset="utf-8"></script>
		<script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
	</body>

</html>