<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"E:\shop\public/../application/admin\view\user\member_grade.html";i:1533713666;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX-后台管理系统-会员等级</title>
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
    <style>
        .error {
            font-size: 18px !important;
            font-weight: 800;
            color: #f40
        }
        
        .right {
            font-size: 18px !important;
            font-weight: 800;
            color: green
        }
        
        .my_vip_list {
            font-weight: 800 !important;
        }
    </style>
</head>

<body>
    <div class="weadmin-nav">
        <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">会员管理</a>
        <a>
          <cite>会员等级</cite></a>
      </span>
        <a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">&#x1002;</i></a>
    </div>
    <!-- <div id="testText">
			zheli是文字
		</div> -->
    <div class="weadmin-body">
        <div class="weadmin-block">
            <a class="layui-btn" href="<?php echo url('admin/User/member_grade_add'); ?>"><i class="layui-icon"></i>添加会员等级</a>
            <span class="fr" style="line-height:40px">共有数据:<?php echo $count; ?>条</span>
        </div>
        <table class="layui-table">
            <thead>
                <tr>
                    <th class="my_vip_list">等级ID</th>
                    <th>等级名称</th>
                    <th>等级描述</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($level) || $level instanceof \think\Collection || $level instanceof \think\Paginator): if( count($level)==0 ) : echo "" ;else: foreach($level as $key=>$v): ?>
                <tr>
                    <td class="my_vip_list"><?php echo $v['level_id']; ?></td>
                    <td><?php echo $v['level_name']; ?></td>
                    <td><?php echo $v['describe']; ?></td>
                    <td>
                        <a title="编辑"  href="<?php echo url('admin/User/member_editlevel'); ?>?id=<?php echo $v['level_id']; ?>">
                            <i class="layui-icon">&#xe642;</i>编辑
                        </a>
                        <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
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