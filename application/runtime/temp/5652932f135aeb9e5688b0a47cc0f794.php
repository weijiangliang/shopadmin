<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"E:\shop\public/../application/admin\view\user\member_address.html";i:1534413014;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX-后台管理系统-会员收货地址</title>
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
          <cite>会员收货地址</cite></a>
      </span>
        <a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">&#x1002;</i></a>
    </div>
    <!-- <div id="testText">
			zheli是文字
		</div> -->
    <div class="weadmin-body">
        <div class="weadmin-block">
            <a class="layui-btn" 
            onclick="WeAdminShow('会员列表编辑','member_address_add.html',1000,600)"
           ></i>添加会员地址</a>
            <span class="fr" style="line-height:40px">共有数据：<?php echo $count; ?>条</span>
        </div>
        <table class="layui-table">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                    </th>
                    <th>会员ID</th>
                    <th>收件人姓名</th>
                    <th>身份证号</th>
                    <th>收件人电话</th>
                    <th>地址</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($address) || $address instanceof \think\Collection || $address instanceof \think\Paginator): if( count($address)==0 ) : echo "" ;else: foreach($address as $key=>$v): ?>
                <tr data-id="1">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1"><i class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td><?php echo $v['id']; ?></td>
                    <td><?php echo $v['name']; ?></td>
                    <td><?php echo $v['id_card']; ?></td>
                    <td><?php echo $v['phone']; ?></td>
                    <td><?php echo $v['address']; ?></td>
                    <td class="td-manage">
                      
                        <a title="编辑"  
                         onclick="WeAdminShow('会员列表编辑','member_address_edit.html?id=<?php echo $v['id']; ?>',1000,600)"
                        >
                            <i class="layui-icon">&#xe642;</i>编辑
                        </a>
                        <a title="删除"  href="<?php echo url('admin/User/member_address_del'); ?>?id=<?php echo $v['id']; ?>">
                            <i class="layui-icon">&#xe640;</i>删除
                        </a>
                    </td>
                </tr>

               <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <?php echo $address->render(); ?>
    <!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>