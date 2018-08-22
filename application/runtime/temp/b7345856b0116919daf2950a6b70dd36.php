<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\shop\public/../application/admin\view\gift\gift_list.html";i:1534928343;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX-后台管理系统-优惠券列表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/static/css/font.css">
    <link rel="stylesheet" href="/static/static/css/weadmin.css">
    
</head>
<body>
    <div class="weadmin-nav">
        <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">礼包</a>
        <a>
          <cite>礼包列表</cite></a>
      </span>
        <a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">&#x1002;</i></a>
    </div>
    <div class="weadmin-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 we-search" action="<?php echo url('admin/Gift/gift_list'); ?>" method="post">
                礼包搜索：
                <div class="layui-inline">
                    <input type="text" name="name" placeholder="请输入礼包名称" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <div class="weadmin-block">
            <button class="layui-btn" onclick="WeAdminShow('添加礼包信息','gift_list_add.html',600,400)"><i class="layui-icon"></i>添加</button>
            <span class="fr" style="line-height:40px">共有数据:<?php echo $count; ?>条</span>
        </div>
        <table class="layui-table" id="memberList">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                    </th>
                    <th>ID</th>
                    <th>礼包名称</th>
                    <th>礼包图</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            
            <?php if(is_array($gift) || $gift instanceof \think\Collection || $gift instanceof \think\Paginator): if( count($gift)==0 ) : echo "" ;else: foreach($gift as $key=>$v): ?>
                <tr data-id="1">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1"><i class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td><?php echo $v['id']; ?></td>
                    <td><?php echo $v['name']; ?></td>
                    <td><img src="http://pduj4yku1.bkt.clouddn.com/<?php echo $v['thumb']; ?>"> </td>
                     <td><?php echo date('Y-m-d H:i:s',$v['add_time']); ?></td>
                    <td class="td-manage">
                        <a title="编辑" onclick="WeAdminEdit('编辑礼包信息','gift_list_edit.html?id=<?php echo $v['id']; ?>', 1, 800, 800)" href="javascript:;">
                            <i class="layui-icon">&#xe642;</i>编辑
                        </a>
                 
                        <a title="删除" onclick="gift_del('<?php echo $v['id']; ?>')" href="javascript:;">
                            <i class="layui-icon">&#xe640;</i>删除
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        
        </div>
    </div>
    <?php echo $gift->render(); ?>
    <!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/static/js/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
    function gift_del(id){
        var returnVal = window.confirm("确定删除吗");
        if(!returnVal) {
           // alert('谢谢信任');
        }else{
            $.post('ajax_gift_del',{id:id},function(data){
                if(data.status==1){
                    alert(data.msg);
                    window.location.reload();
                }else{
                    alert(data.msg);
                }
            });
            }


    }
    </script>
</body>

</html>