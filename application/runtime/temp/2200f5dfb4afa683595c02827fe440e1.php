<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"E:\shop\public/../application/admin\view\product\product_list.html";i:1534406190;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXXXX后台管理系统---商品列表</title>
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
                <cite>商品列表</cite>
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
              <form class="layui-form layui-col-md12 we-search" action="<?php echo url('admin/product/product_list'); ?>" method="post">
                商品搜索：
                <div class="layui-inline">
                    <input type="text" name="product_name" placeholder="请输入商品名称" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn" lay-submit="" lay-filter="sreach">
                    <i class="layui-icon">&#xe615;</i>
                </button>
            </form>
        </div>
        <div class="weadmin-block">
             <a class="layui-btn"  onclick="WeAdminShow('商品添加信息','product_list_add.html',1000,600)">
                <i class="layui-icon"></i>添加</a>
        </div>
        <table class="layui-table" id="memberList">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </th>
                    <th>商品相册</th>
                    <th>商品模型</th>
                    <th>商品ID</th>
                    <th>商品名称</th>
                    <th>商品货号</th>
                    <th>分类</th>
                    <th>商品价格</th>
                    <th>t推荐</th>
                    <th>新品</th>
                    <th>热卖</th>
                    <th>上/下架</th>

                    <th>库存</th>
                    <th>排序</th>
                    
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>

            <?php if(is_array($good) || $good instanceof \think\Collection || $good instanceof \think\Paginator): if( count($good)==0 ) : echo "" ;else: foreach($good as $key=>$v): ?>
                <tr data-id="1">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </td>
                    <td><a onclick="WeAdminShow('商品编辑','product_list_addimage.html?id=<?php echo $v['good_id']; ?>',1000,660)">添加相册</a>  </td>
                    <td><a onclick="WeAdminShow('商品编辑','product_list_type.html?id=<?php echo $v['good_id']; ?>',1000,660)">编辑模型</a>  </td>
                    <td><?php echo $v['good_id']; ?></td>
                    <td><?php echo $v['good_name']; ?></td>
                    <td><?php echo $v['good_sn']; ?></td>
                    <td><?php echo $v['cate_id']; ?></td>
                    <td><?php echo $v['shop_price']; ?></td>
                    <?php if($v['is_recommend']==1): ?>
                    <td>是</td>
                    <?php else: ?>
                    <td>否</td>
                    <?php endif; if($v['is_new']==1): ?>
                    <td>是</td>
                    <?php else: ?>
                    <td>否</td>
                    <?php endif; if($v['is_hot']==1): ?>
                    <td>是</td>
                    <?php else: ?>
                    <td>否</td>
                    <?php endif; if($v['is_on_sale']==1): ?>
                    <td>是</td>
                    <?php else: ?>
                    <td>否</td>
                    <?php endif; ?>
                    <td><?php echo $v['store_num']; ?></td>
                    
                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-xs"><?php echo $v['sort']; ?></span>
                    </td>
                    
                    <td class="td-manage">
                        <a title="编辑商品数据"  onclick="WeAdminShow('商品编辑','product_list_edit.html?id=<?php echo $v['good_id']; ?>',1000,660)">
                            <i class="layui-icon">&#xe642;</i>编辑
                        </a>
                        <a title="删除选中的商品"  href="<?php echo url('admin/product/product_list_del'); ?>?id=<?php echo $v['good_id']; ?>">
                            <i class="layui-icon">&#xe640;</i>删除
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    <!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
    <?php echo $good->render(); ?>
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>