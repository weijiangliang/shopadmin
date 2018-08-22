<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"E:\shop\public/../application/admin\view\index\welcome.html";i:1534486863;}*/ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>多啦优选型后台管理系统-登录</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="/static/static/css/font.css">
	<link rel="stylesheet" href="/static/static/css/weadmin.css">


</head>

<body>
	<div class="weadmin-body">
		<blockquote class="layui-elem-quote">欢迎使用多啦优选后台管理系统</blockquote>
		<div class="layui-fluid" style="overflow: hidden;">
			<div class="layui-row layui-col-space15">
				<div class="layui-col-md6">
					<div class="layui-card">
						<!-- <div class="layui-card-header">快捷方式</div> -->
						<div class="layui-card-header layui-elem-quote">快捷方式</div>
						<div class="layui-card-body">
							<div class="layui-carousel weadmin-shortcut" lay-filter="shortcut" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 280px;">
								<div carousel-item="">
									<ul class="layui-row layui-col-space10 layui-this">
										<li class="layui-col-xs3">
											<a href="<?php echo url('admin/product/product_list'); ?>">
												<i class="layui-icon">&#xe698;</i>
												<cite>商品管理</cite>
												<p>
													<span>点击进入商品信息管理</span>
												</p>
											</a>
										</li>
										<li class="layui-col-xs3">
											<a href="<?php echo url('admin/member/member_list'); ?>">
												<i class="layui-icon">&#xe735;</i>
												<cite>会员管理</cite>
												<p>
													<span>点击进入会员信息管理</span>
												</p>
											</a>
										</li>
										<li class="layui-col-xs3">
											<a href="<?php echo url('admin/order/order_list'); ?>">
												<i class="layui-icon">&#xe642;</i>
												<cite>订单管理</cite>
												<p>
													<span>点击进入订单管理</span>
												</p>
											</a>
										</li>
										<li class="layui-col-xs3">
											<a href="<?php echo url('admin/admin/admin_list'); ?>">
												<i class="layui-icon">&#xe770;</i>
												<cite>管理员管理</cite>
												<p>
													<span>点击进入管理员管理</span>
												</p>
											</a>
										</li>
									</ul>
									<ul class="layui-row layui-col-space10">
										<li class="layui-col-xs3">
											<a href="<?php echo url('admin/admin/rule'); ?>">
												<i class="layui-icon layui-icon-set"></i>
												<cite>设置</cite>
											</a>
										</li>
									</ul>
								</div>
								<div class="layui-carousel-ind">
									<ul>
										<li class="layui-this"></li>
										<li></li>
									</ul>
								</div>
								<!--<button class="layui-icon layui-carousel-arrow" lay-type="sub"></button>
									<button class="layui-icon layui-carousel-arrow" lay-type="add"></button>-->
							</div>

						</div>
					</div>
				</div>
				<div class="layui-col-md6">
					<!--WeAdmin公告-->
					<div class="layui-card">
						<div class="layui-card-header layui-elem-quote">多啦优选后台管理系统公告</div>
						<div class="layui-card-body">
							<div class="layui-carousel weadmin-notice" lay-filter="notice" lay-indicator="inside" lay-arrow="none" style="width: 100%; height: 280px;">
								<div carousel-item="">
									<div class="">
										<a href="javascript:;" target="_blank" class="layui-bg-red">1</a>
									</div>
									<div class="">
										<a href="javascript:;" target="_blank" class="layui-bg-blue">2</a>
									</div>
									<div class="">
										<a href="javascript:;" target="_blank" class="layui-bg-green">3</a>
									</div>

								</div>
								<div class="layui-carousel-ind">
									<ul>
										<li class="layui-this"></li>
										<li></li>
									</ul>
								</div>
								<!--<button class="layui-icon layui-carousel-arrow" lay-type="sub"></button>
									<button class="layui-icon layui-carousel-arrow" lay-type="add"></button>-->
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="layui-col-lg12 layui-collapse" style="border: none;">
			<div class="layui-col-lg6 layui-col-md12">


				<!--统计信息展示-->
				<fieldset class="layui-elem-field" style="padding: 5px;">

					<!--<legend>信息统计</legend>-->
					<blockquote class="layui-elem-quote font16">多啦优选后台管理系统服务器信息</blockquote>
					<div class="">
						<table class="layui-table">
							<thead>
								<tr>
									<th colspan="2" scope="col">服务器信息</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th width="30%">服务器计算机名</th>
									<td>
										<span id="lbServerName">http://127.0.0.1/</span>
									</td>
								</tr>
								<tr>
									<td>服务器IP地址</td>
									<td><?php echo $data['ip']; ?></td>
								</tr>
								<tr>
									<td>服务器域名</td>
									<td><?php echo $data['DNS']; ?></td>
								</tr>
								<tr>
									<td>服务器端口 </td>
									<td><?php echo $data['duankou']; ?></td>
								</tr>
								<tr>
									<td>本文件所在文件夹 </td>
									<td><?php echo $data['dir']; ?></td>
								</tr>
								<tr>
									<td>时间 </td>
									<!-- <td id="firstTime"><?php echo $data['time']; ?></td> -->
									<td ><?php echo date('Y-m-d H:i:s',$data['time']); ?></td>
								</tr>
								<tr>
									<td>上次更新时间 </td>
									<td ><?php echo date('Y-m-d H:i:s',$data['time']); ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</fieldset>
			</div>
			<div class="layui-col-lg6 layui-col-md12">
				<fieldset class="layui-elem-field we-changelog" style="padding: 5px;">
					<!--更新日志-->
					<blockquote class="layui-elem-quote font16">多啦优选后台管理系统更新日志</blockquote>
					<ul class="layui-timeline" style="height: 729px; overflow-y: auto;">
						<li class="layui-timeline-item">
							<i class="layui-icon layui-timeline-axis">&#xe63f;</i>
							<div class="layui-timeline-content layui-text">
								<div class="layui-timeline-title">
									<h3>多啦优选</h3>
									<span class="layui-badge-rim">2018-03-28</span>
								</div>
							</div>
						</li>
					</ul>
				</fieldset>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="/static/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
	layui.extend({
		admin: '/static/static/js/admin',
	});
	layui.use(['jquery', 'element', 'util', 'admin', 'carousel'], function () {
		var element = layui.element,
			$ = layui.jquery,
			carousel = layui.carousel,
			util = layui.util,
			admin = layui.admin;
		//建造实例
		carousel.render({
			elem: '.weadmin-shortcut',
			width: '100%' //设置容器宽度				
				,
			arrow: 'none' //始终显示箭头	
				,
			trigger: 'hover',
			autoplay: false
		});

		carousel.render({
			elem: '.weadmin-notice',
			width: '100%' //设置容器宽度				
				,
			arrow: 'none' //始终显示箭头	
				,
			trigger: 'hover',
			autoplay: true
		});

		$(function () {
			setTimeAgo(2018, 0, 1, 13, 14, 0, '#firstTime');
			setTimeAgo(2018, 2, 28, 16, 0, 0, '#lastTime');
		});

		function setTimeAgo(y, M, d, H, m, s, id) {
			var str = util.timeAgo(new Date(y, M || 0, d || 1, H || 0, m || 0, s || 0));
			$(id).html(str);
			console.log(str);
		};
	});
</script>

</html>