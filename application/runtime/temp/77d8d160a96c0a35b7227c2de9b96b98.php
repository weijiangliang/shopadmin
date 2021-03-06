<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"E:\shop\public/../application/admin\view\finance\finance_list.html";i:1534484369;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-财务列表</title>
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
			<a href="">财务管理</a>
			<a>
				<cite>财务列表</cite>
			</a>
		</span>
        <a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i>
        </a>
    </div>
    <div class="weadmin-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 we-search">
                <!-- <div class="layui-inline">
                    <input class="layui-input" placeholder="开始时间" name="start" id="start">
                </div>
                <div class="layui-inline">
                    <input class="layui-input" placeholder="结束时间" name="end" id="end">
                </div> -->
                <!-- <div class="layui-input-inline">
                    <select name="contrller">
						<option>技术部</option>
						<option>人力资源部</option>
						<option>客服部</option>
					</select>
                </div> -->
                <div class="layui-input-inline">
                    <select name="contrller">
						<option>费用类别</option>
						<option>**类</option>
						<option>**类</option>
					</select>
                </div>
                <div class="layui-inline">
                    <input class="layui-input" placeholder="日期" name="end" id="end">
                </div>
                <!-- <div class="layui-inline">
                    <input type="text" name="order_id" placeholder="请输入订单编号" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn" lay-submit="" lay-filter="sreach">
					<i class="layui-icon">&#xe615;</i>
				</button> -->
            </form>
        </div>
        <div class="weadmin-block">
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn" onclick="WeAdminShow('添加财务信息','./finance_list_add.html',600,400)"><i class="layui-icon"></i>添加</button>
            <span class="fr" style="line-height:40px">共有数据：88 条</span>
        </div>
        <table class="layui-table">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </th>
                    <th>提交人</th>
                    <th>费用类别</th>
                    <th>金额（元）</th>
                    <th>总计（元）</th>
                    <th>状态</th>
                    <th>审核人</th>
                    <th>审核时间</th>
                    <th>备注</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'>
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </td>
                    <td>老王</td>
                    <td>出差类</td>
                    <td>7854（元）</td>
                    <td>7854（元）</td>
                    <td>已通过</td>
                    <td>老张</td>
                    <td>2017/05/14</td>
                    <td>******</td>
                    <td class="td-manage">
                        <a title="查看" onclick="WeAdminShow('查看财务详细信息','./finance_list_see.html',600,400)" href="javascript:;">
                            <i class="layui-icon">&#xe63c;</i>
                        </a>
                        <a onclick="WeAdminShow('添加财务信息','./finance_list_add.html',600,400)" title="添加财务信息" href="javascript:;">
                            <i class="layui-icon">&#xe654;</i>
                        </a>
                        <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                            <i class="layui-icon">&#xe640;</i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="page">
            <div>
                <a class="prev" href="">&lt;&lt;</a>
                <a class="num" href="">1</a>
                <span class="current">2</span>
                <a class="num" href="">3</a>
                <a class="num" href="">...</a>
                <a class="next" href="">&gt;&gt;</a>
            </div>
        </div>

    </div>
    <script>
        layui.extend({
            admin: '{/}/static/static/js/admin'
        });
        layui.use(['laydate', 'jquery', 'admin'], function() {
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
                layer.confirm('确认要停用吗？', function(index) {
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
                layer.confirm('确认要删除吗？', function(index) {
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
                layer.confirm('确认要删除吗？' + data, function(index) {
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