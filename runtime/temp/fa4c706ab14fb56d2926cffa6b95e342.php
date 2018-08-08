<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"E:\shop\public/../application/admin\view\product\product_guige.html";i:1533543440;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX-后台管理系统-商品规格</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/static/css/font.css">
    <link rel="stylesheet" href="/static/static/css/weadmin.css">
    <link rel="stylesheet" href="/static/static/css/bootstrap.min.css">
    <script src="/static/static/js/admin.js" type="text/javascript" ></script>


</head>

<body>
    <div class="weadmin-nav">
        <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">商品管理</a>
            <a>
                <cite>商品规格</cite>
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
             <form class="layui-form layui-col-md12 we-search" action="<?php echo url('admin/product/product_guige'); ?>" method="post">
                商品规格搜索：
                <div class="layui-inline">
                    <input type="text" name="product_guige_name" placeholder="请输入商品规格名称" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn" lay-submit="" lay-filter="sreach">
                    <i class="layui-icon">&#xe615;</i>
                </button>
            </form>
        </div>
        <div class="weadmin-block">
            <a class="layui-btn" 
                href="<?php echo url('admin/product/product_guige_add'); ?>">添加</a>
            <span class="fr" style="line-height:40px">共有数据；<?php echo $count; ?>条</span>
        </div>
        <table class="layui-table" id="memberList">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </th>
                    <th>商品规格ID</th>
                    <th>商品规格名称</th>
                    <th>商品所属模块</th>
                    <th>商品规格项</th>          
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($spec) || $spec instanceof \think\Collection || $spec instanceof \think\Paginator): if( count($spec)==0 ) : echo "" ;else: foreach($spec as $key=>$v): ?>
                <tr data-id="1">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1">
                            <i class="layui-icon">&#xe605;</i>
                        </div>
                    </td>
                    <td><?php echo $v['spec_id']; ?></td>
                    <td><?php echo $v['name']; ?></td>
                    <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): if( count($type)==0 ) : echo "" ;else: foreach($type as $key=>$vol): if($vol['id']==$v['type_id']): ?>
                    <td><?php echo $vol['name']; ?></td>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    <td><?php echo fn2($v['spec_id']); ?></td>

                    <td class="td-status">
                        <span class="layui-btn layui-btn-normal layui-btn-xs">已启用</span>
                    </td>
                    <td class="td-manage">
                        
                        <a title="编辑" href="<?php echo url('admin/product/product_guige_edit'); ?>?id=<?php echo $v['spec_id']; ?>">
                            <i class="layui-icon">&#xe642;</i>
                            编辑
                        </a>
                        
                        <a title="删除" href="<?php echo url('admin/product/product_guige_del'); ?>?id=<?php echo $v['spec_id']; ?>">
                            <i class="layui-icon">&#xe640;</i>删除
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
<?php echo $spec->render(); ?>
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>