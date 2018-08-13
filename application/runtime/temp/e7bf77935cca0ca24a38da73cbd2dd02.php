<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"E:\shop\public/../application/admin\view\product\product_category.html";i:1533549108;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX-后台管理系统-商品分类</title>
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
                <cite>商品分类</cite>
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
        <div class="layui-row">
             <form class="layui-form layui-col-md12 we-search" action="<?php echo url('admin/product/product_category'); ?>" method="post">
                商品分类搜索：
                <div class="layui-inline">
                    <input type="text" name="product_cate_name" placeholder="请输入商品分类名称" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn" lay-submit="" lay-filter="sreach">
                    <i class="layui-icon">&#xe615;</i>
                </button>
            </form>
        </div>
        <div class="weadmin-block">
            <a class="layui-btn" href="<?php echo url('admin/product/product_category_add'); ?>">
                <i class="layui-icon"></i>添加</a>
            <span class="fr" style="line-height:40px">共有数据：<?php echo $count; ?> 条</span>
        </div>
        <table class="layui-table" id="memberList">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </th>
                    <th>分类ID</th>
                    <th>分类名称</th>
                    <th>手机显示名称</th>
                    <th>是否推荐</th>
                    <th>是否显示</th>
                    <th>分组</th>
                    <th>排序</th>

                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): if( count($cate)==0 ) : echo "" ;else: foreach($cate as $key=>$v): ?>
                <tr data-id="1">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </td>
                    <td><?php echo $v['id']; ?></td>
                    <td><?php echo $v['name']; ?></td>
                    <td><?php echo $v['mobile_name']; ?></td>
                    <td><?php echo $v['is_hot']; ?></td>
                    <td><?php echo $v['is_show']; ?></td>
                    <td><?php echo $v['cat_group']; ?></td>
                    <td><?php echo $v['sort_order']; ?></td>
                    <td class="td-manage">
                        
                        <a title="编辑"  href="<?php echo url('admin/product/product_category_edit'); ?>?id=<?php echo $v['id']; ?>">
                            <i class="layui-icon">&#xe642;</i>编辑
                        </a>
                        <a title="删除" onclick="member_del(this,'要删除的id')" href="<?php echo url('admin/product/product_category_del'); ?>?id=<?php echo $v['id']; ?>">
                            <i class="layui-icon">&#xe640;</i>删除
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        </div>
    </div>
    <?php echo $cate->render(); ?>
    <!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>