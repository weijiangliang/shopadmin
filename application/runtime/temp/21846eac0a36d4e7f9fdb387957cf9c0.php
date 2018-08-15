<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"E:\shop\public/../application/admin\view\active\gift_list.html";i:1534327702;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX-后台管理系统-礼包列表</title>
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
        <a href="">特惠活动</a>
        <a>
          <cite>礼包列表</cite></a>
      </span>
        <a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">&#x1002;</i></a>
    </div>
    <!-- <div id="testText">
			zheli是文字
		</div> -->
    <div class="weadmin-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 we-search">
                礼包搜索：
                <div class="layui-inline">
                    <input type="text" name="vip_name" placeholder="请输入礼包名称" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <div class="weadmin-block">
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn" onclick="WeAdminShow('添加礼包信息','./gift_list_add.html',600,400)"><i class="layui-icon"></i>添加</button>
            <span class="fr" style="line-height:40px">共有数据：88 条</span>
        </div>
        <table class="layui-table" id="memberList">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                    </th>
                    <th>ID</th>
                    <th>礼包名称</th>
                    <th>出售时间</th>
                    <th>结束售卖时间</th>
                    <th>礼包包含产品</th>
                    <th>礼包可享权益</th>
                    <th>购买量</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="1">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1"><i class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td>1</td>
                    <td>298专享礼包</td>
                    <td>2017/02/06</td>
                    <td>至今</td>
                    <td>***********</td>
                    <td>298会员价</td>
                    <td>2299</td>
                    <td class="td-manage">
                        <a onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                            <i class="layui-icon">&#xe601;</i>
                        </a>
                        <a title="编辑" onclick="WeAdminEdit('编辑活动信息','./gift_list_edit.html', 1, 600, 400)" href="javascript:;">
                            <i class="layui-icon">&#xe642;</i>
                        </a>
                        <a onclick="WeAdminShow('添加活动信息','./gift_list_add.html',600,400)" title="添加会员信息" href="javascript:;">
                            <i class="layui-icon">&#xe654;</i>
                        </a>
                        <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                            <i class="layui-icon">&#xe640;</i>
                        </a>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1"><i class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td>2</td>
                    <td>598专享礼包</td>
                    <td>2017/02/06</td>
                    <td>2018/02/06</td>
                    <td>***********</td>
                    <td>598会员价</td>
                    <td>2299</td>
                    <td class="td-manage">
                        <a onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                            <i class="layui-icon">&#xe601;</i>
                        </a>
                        <a title="编辑" onclick="WeAdminEdit('编辑活动信息','./gift_list_edit.html', 1, 600, 400)" href="javascript:;">
                            <i class="layui-icon">&#xe642;</i>
                        </a>
                        <a onclick="WeAdminShow('添加活动信息','./gift_list_add.html',600,400)" title="添加会员信息" href="javascript:;">
                            <i class="layui-icon">&#xe654;</i>
                        </a>
                        <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                            <i class="layui-icon">&#xe640;</i>
                        </a>
                    </td>
                </tr>
                <tr data-id="3">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1"><i class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td>3</td>
                    <td>998专享礼包</td>
                    <td>2017/02/06</td>
                    <td>2018/02/06</td>
                    <td>***********</td>
                    <td>998会员价</td>
                    <td>1299</td>
                    <td class="td-manage">
                        <a onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                            <i class="layui-icon">&#xe601;</i>
                        </a>
                        <a title="编辑" onclick="WeAdminEdit('编辑活动信息','./gift_list_edit.html', 1, 600, 400)" href="javascript:;">
                            <i class="layui-icon">&#xe642;</i>
                        </a>
                        <a onclick="WeAdminShow('添加活动信息','./gift_list_add.html',600,400)" title="添加会员信息" href="javascript:;">
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
        </div>
        <!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
        <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>