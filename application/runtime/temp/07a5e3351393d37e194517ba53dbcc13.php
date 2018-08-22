<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"E:\shop\public/../application/admin\view\product\product_brand.html";i:1534470845;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXXXX后台管理系统-品牌列表</title>
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
                <cite>品牌列表</cite>
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
            <form class="layui-form layui-col-md12 we-search" action="<?php echo url('admin/product/product_brand'); ?>" method="post">
                商品品牌搜索：
                <div class="layui-inline">
                    <input type="text" name="product_brand_name" placeholder="请输入商品品牌名称" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn" lay-submit="" lay-filter="sreach">
                    <i class="layui-icon">&#xe615;</i>
                </button>
            </form>
        </div>
        <div class="weadmin-block">
            <a class="layui-btn" 
            onclick="WeAdminShow('品牌添加信息','product_brand_add.html',1000,700)"
            >
                <i class="layui-icon"></i>添加</a>
            <span class="fr" style="line-height:40px">共有数据:<?php echo $count; ?>条</span>
        </div>
        <table class="layui-table" id="memberList">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </th>
                    <th>商品品牌ID</th>
                    <th>商品品牌名称</th>
                    <th>商品品牌logo</th>
                    <th>商品品牌类名</th>
                    <th>是否推荐</th>

                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($brand) || $brand instanceof \think\Collection || $brand instanceof \think\Paginator): if( count($brand)==0 ) : echo "" ;else: foreach($brand as $key=>$v): ?>
                <tr data-id="1">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </td>
                    <td><?php echo $v['id']; ?></td>
                    <td><?php echo $v['brand_name']; ?></td>
                    <td><img src="/uploads/<?php echo $v['brand_logo']; ?>" alt="logo"></td>
                    <td><?php echo $v['cate_name']; ?></td>
                    <?php if($v['is_hot']==1): ?>
                    <td>是</td>
                    <?php else: ?>
                    <td>否</td>
                    <?php endif; ?>

                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-xs">已启用</span>
                    </td>
                    <td class="td-manage">
                      
                        <a title="编辑" 
                        onclick="WeAdminShow('商品添加信息','product_brand_edit.html?id=<?php echo $v['id']; ?>',1000,600)"
                        >
                            <i class="layui-icon">&#xe642;</i>编辑
                        </a>
                       
                        <a title="删除"  href="<?php echo url('admin/product/product_brand_del'); ?>?id=<?php echo $v['id']; ?>">
                            <i class="layui-icon">&#xe640;</i>删除
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
      
    </div>
    <?php echo $brand->render(); ?>
    <!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>