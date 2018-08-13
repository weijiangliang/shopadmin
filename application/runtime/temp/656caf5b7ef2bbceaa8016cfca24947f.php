<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"E:\shop\public/../application/admin\view\order\son_order_list.html";i:1533869863;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>XXXX后台管理系统-订单列表</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="/static/static/css/font.css">
	<link rel="stylesheet" href="/static/static/css/weadmin.css">
	<script src="/static/lib/layui/layui.js" charset="utf-8"></script>
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
			<a href="">订单管理</a>
			<a>
				<cite>订单列表</cite>
			</a>
		</span>
		<a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
		    title="刷新">
			<i class="layui-icon" style="line-height:30px">ဂ</i>
		</a>
	</div>
	<div class="weadmin-body">
		<div class="layui-row">
			<form class="layui-form layui-col-md12 we-search" action="<?php echo url('admin/Order/son_order_list'); ?>" method="post">
				<div class="layui-inline">
					<input type="text" name="parent_sn" placeholder="请输入父订单编号" autocomplete="off" class="layui-input">
				</div>
				<button class="layui-btn" lay-submit="" lay-filter="sreach">
					<i class="layui-icon">&#xe615;</i>
				</button>
			</form>
		</div>
		<div class="weadmin-block">
			<span class="fr" style="line-height:40px">共有数据：<?php echo $count; ?>条</span>
		</div>
		<table class="layui-table">
			<thead>
				<tr>
					<th>
						<div class="layui-unselect header layui-form-checkbox" lay-skin="primary">
							<i class="layui-icon">&#xe605;</i>
						</div>
					</th>
					<th>订单ID</th>
					<th>父订单号</th>
					<th>父订单id</th>
					<th>用户id</th>
					<th>发货状态</th>
					<th>物流单号</th>
					<th>管理员备注</th>
					<th>供货商id</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($order_info) || $order_info instanceof \think\Collection || $order_info instanceof \think\Paginator): if( count($order_info)==0 ) : echo "" ;else: foreach($order_info as $key=>$v): ?>
				<tr>
					<td>
						<div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'>
							<i class="layui-icon">&#xe605;</i>
						</div>
					</td>
					<td><?php echo $v['order_info_id']; ?></td>
					<td><?php echo $v['parent_sn']; ?></td>
					<td><?php echo $v['order_id']; ?></td>
					<td><?php echo $v['user_id']; ?></td>
					<td><?php echo $v['shipping_status']; ?></td>
					<td><?php echo $v['shipping_number']; ?></td>
					<td><?php echo $v['admin_note']; ?></td>
					<td><?php echo $v['suppliers_id']; ?></td>
					<td class="td-manage">
					<!-- 	<a title="查看" href="<?php echo url('admin/Order/order_view'); ?>?id =<?php echo $v['order_info_id']; ?> ">
							<i class="layui-icon">&#xe63c;</i>查看
						</a> -->
						<a class="layui-btn" onclick="WeAdminShow('添加管理员','<?php echo url('admin/Order/order_view'); ?>?id=<?php echo $v['order_info_id']; ?>')"><i class="layui-icon"></i>查看</a>
					</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</div>
	<?php echo $order_info->render(); ?>
	<script>
		layui.extend({
			admin: '/static/static/js/admin'
		});
		layui.use(['laydate', 'jquery', 'admin'], function () {
			var laydate = layui.laydate,
				$ = layui.jquery,
				admin = layui.admin;
			//执行一个laydate实例
			laydate.render({
				elem: '#start' //指定元素
			});
			//执行一个laydate实例
			laydate.render({
				elem: '#end' //指定元素
			});

			/*用户-停用*/
			function member_stop(obj, id) {
				layer.confirm('确认要停用吗？', function (index) {
					if ($(obj).attr('title') == '启用') {
						//发异步把用户状态进行更改
						$(obj).attr('title', '停用')
						$(obj).find('i').html('&#xe62f;');

						$(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
						layer.msg('已停用!', {
							icon: 5,
							time: 1000
						});

					} else {
						$(obj).attr('title', '启用')
						$(obj).find('i').html('&#xe601;');

						$(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
						layer.msg('已启用!', {
							icon: 5,
							time: 1000
						});
					}
				});
			}

			/*用户-删除*/
			function member_del(obj, id) {
				layer.confirm('确认要删除吗？', function (index) {
					//发异步删除数据
					$(obj).parents("tr").remove();
					layer.msg('已删除!', {
						icon: 1,
						time: 1000
					});
				});
			}

			function delAll(argument) {
				var data = tableCheck.getData();
				layer.confirm('确认要删除吗？' + data, function (index) {
					//捉到所有被选中的，发异步进行删除
					layer.msg('删除成功', {
						icon: 1
					});
					$(".layui-form-checked").not('.header').parents('tr').remove();
				});
			}
		});
	</script>
	<script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>