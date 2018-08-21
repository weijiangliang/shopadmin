<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:57:"E:\shop\public/../application/admin\view\index\index.html";i:1534828478;}*/ ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>多啦优选后台管理</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="shortcut icon" href="/static/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="/static/static/css/font.css">
	<link rel="stylesheet" href="/static/static/css/weadmin.css">
	<script type="text/javascript" src="/static/lib/layui/layui.js" charset="utf-8"></script> 
    
</head>

<body>
	<!-- 顶部开始 -->
	<div class="container">
		<div class="logo">
			<a href="./index.html">多啦优选后台管理系统</a>
		</div>
		<div class="left_open">
			<i title="展开左侧栏" class="iconfont">&#xe699;</i>
		</div>
		<ul class="layui-nav left fast-add" lay-filter="">
			<li class="layui-nav-item">
				<a href="javascript:;">更多</a>
				<dl class="layui-nav-child">
					<!-- 二级菜单 -->
					<dd>
						<a onclick="('资讯','http://www.baidu.com')">
							<i class="iconfont">&#xe6a2;</i>资讯</a>
					</dd>
					<dd>
						<a onclick="WeAdminShow('用户','./pages/admin/role.html')">
							<i class="iconfont">&#xe6b8;</i>用户</a>
					</dd>
				</dl>
			</li>
		</ul>
		<ul class="layui-nav right" lay-filter="">
			<li class="layui-nav-item">
				<a href="javascript:;">
					<img src="http://t.cn/RCzsdCq" class="layui-nav-img"><?php echo \think\Request::instance()->session('username'); ?></a>
				<dl class="layui-nav-child">
					<!-- 二级菜单 -->
					<!-- <dd>
						<a onclick="WeAdminShow('个人中心','./pages/person/person.html',400,600)">基本资料</a>
					</dd> -->
					<dd>
						<a onclick="WeAdminShow('切换帐号','login.html',500,600)">切换帐号</a>
					</dd>
					<dd>
						<a class="loginout" href="<?php echo url('admin/Login/outlogin'); ?>">退出</a>
					</dd>
				</dl>
			</li>
		</ul>

	</div>
	<!-- 顶部结束 -->
	<!-- 中部开始 -->
	<!-- 左侧菜单开始 -->
	<div class="left-nav">
		<div id="side-nav">
			<ul id="nav">
				<li>
					<a href="javascript:;">
						<i class="iconfont">&#xe698;</i>
						<cite>商品管理</cite>
						<i class="iconfont nav_right">&#xe697;</i>
					</a>
					<ul class="sub-menu">
						<li>
							<a _href="<?php echo url('admin/product/product_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>商品信息</cite>
							</a>
							<!-- <ul class="sub-menu">
								<li>
									<a _href="<?php echo url('admin/product/product_list'); ?>">
										<i class="iconfont">&#xe6a7;</i>
										<cite>商品列表</cite>
									</a>
								</li>
								<li>
									<a _href="<?php echo url('admin/product/product_list_add'); ?>">
										<i class="iconfont">&#xe6a7;</i>
										<cite>添加商品</cite>
									</a>
								</li>
							</ul> -->
						</li>
						<li>
							<a _href="<?php echo url('admin/product/product_category'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>商品分类</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/product/product_mode'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>商品模型</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/product/product_attribute'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>商品属性</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/product/product_guige'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>商品规格</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/product/product_brand'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>品牌列表</cite>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="iconfont">&#xe6b8;</i>
						<cite>会员管理</cite>
						<i class="iconfont nav_right">&#xe697;</i>
					</a>
					<ul class="sub-menu">
						<li>
							<a _href="<?php echo url('admin/User/member_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>会员列表</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/User/exam_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>审核列表</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/User/member_grade'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>会员等级</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/User/member_account'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>会员金额变动</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/User/member_address'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>会员收货地址</cite>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="iconfont">&#xe723;</i>
						<cite>订单管理</cite>
						<i class="iconfont nav_right">&#xe697;</i>
					</a>
					<ul class="sub-menu">
						<li>
							<a _href="<?php echo url('admin/Order/order_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>总订单交易列表</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/Order/son_order_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>子订单交易列表</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/Order/order_goods_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>订单商品</cite>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="iconfont">&#xe6b2;</i>
						<cite>物流管理</cite>
						<i class="iconfont nav_right">&#xe697;</i>
					</a>
					<ul class="sub-menu">
					<li>
							<a _href="<?php echo url('admin/Logistics/express'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>物流快递</cite>
							</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="iconfont">&#xe726;</i>
						<cite>管理员管理</cite>
						<i class="iconfont nav_right">&#xe697;</i>
					</a>
					<ul class="sub-menu">
						<li>
							<a _href="<?php echo url('admin/admin/admin_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>管理员列表</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/admin/admin_role'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>角色管理</cite>
							</a>
						</li>
						
						<li>
							<a _href="<?php echo url('admin/admin/admin_rule'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>权限管理</cite>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="iconfont">&#xe723;</i>
						<cite>特惠活动</cite>
						<i class="iconfont nav_right">&#xe697;</i>
					</a>
					<ul class="sub-menu">
						<li>
							<a _href="<?php echo url('admin/active/activity_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>活动场次</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/active/gift_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>活动商品</cite>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="iconfont">&#xe723;</i>
						<cite>优惠券</cite>
						<i class="iconfont nav_right">&#xe697;</i>
					</a>
					<ul class="sub-menu">
						<li>
							<a _href="<?php echo url('admin/Coupon/coupon_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>优惠券列表</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/coupon/coupon_user_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>用户优惠券</cite>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="iconfont">&#xe723;</i>
						<cite>广告轮播图</cite>
						<i class="iconfont nav_right">&#xe697;</i>
					</a>
					<ul class="sub-menu">
						<li>
							<a _href="<?php echo url('admin/Advimage/advimage_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>轮播图列表</cite>
							</a>
						</li>
						<!-- <li>
							<a _href="<?php echo url('admin/coupon/coupon_user_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>用户优惠券</cite>
							</a>
						</li> -->
					</ul>
				</li>

				<li>
					<a href="javascript:;">
						<i class="iconfont">&#xe723;</i>
						<cite>礼包</cite>
						<i class="iconfont nav_right">&#xe697;</i>
					</a>
					<ul class="sub-menu">
						<li>
							<a _href="<?php echo url('admin/Gift/gift_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>礼包列表</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/Gift/gift_mall_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>礼包套餐</cite>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="iconfont">&#xe6ce;</i>
						<cite>系统统计</cite>
						<i class="iconfont nav_right">&#xe697;</i>
					</a>
					<ul class="sub-menu">
						<li>
							<a _href="<?php echo url('admin/echarts/echarts1'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>拆线图</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/echarts/echarts2'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>堆叠柱状图</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/echarts/echarts3'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>地图</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/echarts/echarts4'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>饼图</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/echarts/echarts5'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>雷达图</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/echarts/echarts6'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>k线图</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/echarts/echarts7'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>热力图</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/echarts/echarts8'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>仪表图</cite>
							</a>
						</li>
						<li>
							<a _href="<?php echo url('admin/echarts/echarts9'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>地图DIY实例</cite>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
						<i class="iconfont">&#xe723;</i>
						<cite>财务管理</cite>
						<i class="iconfont nav_right">&#xe697;</i>
					</a>
					<ul class="sub-menu">
						<li>
							<a _href="<?php echo url('admin/finance/finance_list'); ?>">
								<i class="iconfont">&#xe6a7;</i>
								<cite>财务列表</cite>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- <div class="x-slide_left"></div> -->
	<!-- 左侧菜单结束 -->
	<!-- 右侧主体开始 -->
	<div class="page-content">
		<div class="layui-tab tab" lay-filter="wenav_tab" id="WeTabTip" lay-allowclose="true">
			<ul class="layui-tab-title" id="tabName">
				<li>我的桌面</li>
			</ul>
			<div class="layui-tab-content">
				<div class="layui-tab-item layui-show">
					<iframe src='<?php echo url("admin/index/welcome"); ?>' frameborder="0" scrolling="yes" class="weIframe"></iframe>
				</div>
			</div>
		</div>
	</div>
	<div class="page-content-bg"></div>
	<!-- 右侧主体结束 -->
	<!-- 中部结束 -->
	<!-- 底部开始 -->
	<div class="footer">
		<div class="copyright">Copyright ©2018</div>
	</div>
	<!-- 底部结束 -->
	<script type="text/javascript">
		layui.config({
			base: '/static/static/js/',
			version: '101100'
		}).use('admin');
		layui.use(['jquery', 'admin'], function () {
			var $ = layui.jquery;
			// $(function () {
			// 	var login = JSON.parse(localStorage.getItem("login"));
			// 	if (login) {
			// 		if (login = 0) {
			// 			window.location.href = "<?php echo url('login'); ?>";
			// 			return false;
			// 		} else {
			// 			return false;
			// 		}
			// 	} else {
			// 		window.location.href = "<?php echo url('login'); ?>";
			// 		return false;
			// 	}
			// });
		});
	</script>
</body>
<!--Tab菜单右键弹出菜单-->
<ul class="rightMenu" id="rightMenu">
	<li data-type="fresh">刷新</li>
	<li data-type="current">关闭当前</li>
	<li data-type="other">关闭其它</li>
	<li data-type="all">关闭所有</li>
</ul>

</html>