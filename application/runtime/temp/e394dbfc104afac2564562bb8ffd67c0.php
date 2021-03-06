<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\shop\public/../application/admin\view\logistics\freight_template.html";i:1534139872;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXXXX后台管理系统---运费模板</title>
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
            <a href="">物流管理</a>
            <a>
                <cite>运费模板</cite>
            </a>
        </span>
        <a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
            title="刷新">
            <i class="layui-icon" style="line-height:30px">&#x1002;</i>
        </a>
    </div>
    <!-- <div id="testText">
        zheli是文字
    </div> -->
    <div class="weadmin-body">
        <div class="weadmin-block">
            <!-- <button class="layui-btn layui-btn-danger">
                <i class="layui-icon"></i>新增运费模板</button> -->
            <!-- <button class="layui-btn">
                <i class="layui-icon"></i>添加</button> -->
            <button class="layui-btn" onclick="WeAdminShow('新增运费模板','./freight_template_add.html',600,400)">
                <i class="layui-icon"></i>新增运费模板</button>
            <span class="fr" style="line-height:40px">共有数据：88 条</span>
        </div>
        <table class="layui-table" id="memberList">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </th>
                    <th>运送方式</th>
                    <th>运送地点</th>
                    <th>配送方式</th>
                    <th>首件(个)</th>
                    <th>运费(元)</th>
                    <th>续件(个)</th>
                    <th>运费(元)</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="1">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </td>
                    <td>快递</td>
                    <td>全国</td>
                    <td>自提</td>
                    <td>1</td>
                    <td>20.00</td>
                    <td>1</td>
                    <td>10.00</td>
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-xs">已启用</span>
                    </td>
                    <td class="td-manage">
                        <a onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                            <i class="layui-icon">&#xe601;</i>
                        </a>
                        <a title="修改运费模板" onclick="WeAdminEdit('修改运费模板','./freight_template_edit.html', 1, 800, 400)" href="javascript:;">
                            <i class="layui-icon">&#xe642;</i>
                        </a>
                        <a title="添加运费模板" onclick="WeAdminEdit('添加运费模板','./freight_template_add.html', 1,800,400)" href="javascript:;">
                            <i class="layui-icon">&#xe654;</i>
                        </a>
                        <a title="删除运费模板" onclick="member_del(this,'要删除的id')" href="javascript:;">
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
    <!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>