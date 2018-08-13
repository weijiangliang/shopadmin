<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"E:\shop\public/../application/admin\view\logistics\express.html";i:1534151197;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>多啦优选后台管理系统---物流快递</title>
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
        <span class="快递模块</cite>
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
            <button class="layui-btn" onclick="WeAdminShow('新增快递类型','<?php echo url("admin/Logistics/express_add"); ?>',800,600)">
                <i class="layui-icon"></i>新增快递类型</button>
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
                    <th>物流公司ID</th>
                    <th>物流公司名称</th>
                    <th>物流公司编码</th>
                    <th>描述</th>
                    <th>logo</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($express) || $express instanceof \think\Collection || $express instanceof \think\Paginator): if( count($express)==0 ) : echo "" ;else: foreach($express as $key=>$v): ?>
                <tr data-id="1">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </td>
                    <td><?php echo $v['shipping_id']; ?></td>
                    <td><?php echo $v['shipping_name']; ?></td>
                    <td><?php echo $v['shipping_code']; ?></td>
                    <td><?php echo $v['shipping_desc']; ?></td>
                    <td><img src="/uploads/<?php echo $v['shipping_logo']; ?>"> </td>
                    <td class="td-status">
                    <?php if($v['is_open']==1): ?>
                        <span class="layui-btn layui-btn-normal layui-btn-xs" onclick="is_open(<?php echo $v['shipping_id']; ?>)">关闭</span>
                        <?php else: ?>
                        <span class="layui-btn layui-btn-normal layui-btn-xs" onclick="is_open(<?php echo $v['shipping_id']; ?>)">启用
                        </span>
                        <?php endif; ?>
                    
                    </td>
                    <td class="td-manage">
                       
                        <a title="修改运费模板" onclick="WeAdminEdit('修改运费模板','<?php echo url("admin/Logistics/express_edit"); ?>?shipping_id=<?php echo $v['shipping_id']; ?>',800, 600)" href="javascript:;">
                            <i class="layui-icon">&#xe642;</i>修改
                        </a>
                       
                        <a title="删除运费模板" onclick="express_del('<?php echo $v['shipping_id']; ?>')" href="javascript:;">
                            <i class="layui-icon">&#xe640;</i>删除
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <?php echo $express->render(); ?>
    <!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/static/js/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
 function express_del(shipping_id){
    var shipping = shipping_id;
    $.post("<?php echo url('admin/Logistics/express_del'); ?>",{shipping_id:shipping_id},function(data){
        if(data.status==2){
        }else{
            alert(data.msg);
            window.location.reload();
        }

    });
 }

function is_open(){

}

    </script>
</body>

</html>