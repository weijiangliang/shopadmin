<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\shop\public/../application/admin\view\product\product_attribute.html";i:1534492431;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX-后台管理系统-商品属性</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/static/css/font.css">
    <link rel="stylesheet" href="/static/static/css/weadmin.css">
    <link rel="stylesheet" href="/static/static/css/bootstrap.min.css">
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
            <a href="">商品管理</a>
            <a>
                <cite>商品属性</cite>
            </a>
        </span>
        <a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">&#x1002;</i>
        </a>
    </div>
    <!-- <div id="testText">
        zheli是文字
    </div> -->
    <div class="weadmin-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 we-search" action="<?php echo url('admin/product/product_attribute'); ?>" method="post">
                商品属性搜索：
                <div class="layui-inline">
                    <input type="text" name="attribute" placeholder="请输入商品属性名称" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn" lay-submit="" lay-filter="sreach">
                    <i class="layui-icon">&#xe615;</i>
                </button>
            </form>
        </div>
        <div class="weadmin-block">
            <a class="layui-btn" onclick="WeAdminShow('商品添加信息','product_attribute_add.html',800,600)" >
                <i class="layui-icon"></i>添加</a>
            <span class="fr" style="line-height:40px">共有数据：<?php echo $count; ?>条</span>
        </div>
        <table class="layui-table" id="memberList">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </th>
                    <th>商品属性ID</th>
                    <th>商品属性名称</th>
                    <th>商品所属模型</th>
                    <th>属性值的输入方式</th>
                    <th>录入方式</th>
<!--                     <th>可选列表</th> -->
                    <th>排序</th>
                    <th>检索</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($attr) || $attr instanceof \think\Collection || $attr instanceof \think\Paginator): if( count($attr)==0 ) : echo "" ;else: foreach($attr as $key=>$v): ?>
                <tr data-id="1">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </td>
                    <td><?php echo $v['attr_id']; ?></td>
                    <td><?php echo $v['attr_name']; ?></td>
                     <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): if( count($type)==0 ) : echo "" ;else: foreach($type as $key=>$vol): if($vol['id']==$v['type_id']): ?>
                    <td><?php echo $vol['name']; ?></td>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    <td><?php echo $v['attr_values']; ?></td>
                    <td><?php echo $v['luru']; ?></td>
                    <td><?php echo $v['indx']; ?></td>
                    <td><?php echo $v['sort']; ?></td>
                    <td class="td-manage">
                        <a title="编辑" onclick="WeAdminShow('商品属性编辑','product_attribute_edit.html?id=<?php echo $v['attr_id']; ?>',800,600)" >
                            <i class="layui-icon">&#xe642;</i>编辑
                        </a>
                        <a title="删除"  href="<?php echo url('admin/product/product_attribute_del'); ?>?id=<?php echo $v['attr_id']; ?>">
                            <i class="layui-icon">&#xe640;</i>删除
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="page">
           <?php echo $attr->render(); ?>
        </div>
       <!--  31.21603750     ["ktghgl"]=> string(1) "3"-->
    </div>
    <!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>