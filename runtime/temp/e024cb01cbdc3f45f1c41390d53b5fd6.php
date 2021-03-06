<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"E:\shop\public/../application/admin\view\coupon\coupon_list.html";i:1534813172;}*/ ?>
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
        <a href="">优惠券</a>
        <a>
          <cite>活动列表</cite></a>
      </span>
        <a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">&#x1002;</i></a>
    </div>
    <!-- <div id="testText">
			zheli是文字
		</div> -->
    <div class="weadmin-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 we-search" action="<?php echo url('admin/Coupon/coupon_list'); ?>" method="post">
                优惠券搜索：
                <div class="layui-inline">
                    <input type="text" name="coupon_name" placeholder="请输入优惠券名称" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <div class="weadmin-block">
           <!--  <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button> -->
            <button class="layui-btn" onclick="WeAdminShow('添加活动信息','coupon_list_add.html',800,800)"><i class="layui-icon"></i>添加</button>
            <span class="fr" style="line-height:40px">共有数据:<?php echo $count; ?>条</span>
        </div>
        <table class="layui-table" id="memberList">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                    </th>
                    <th>ID</th>
                    <th>名称</th>
                    <th>发放量</th>
                    <th>领取量</th>
                    <th>使用量</th>
                    <th>金额</th>
                    <th>使用条件</th> 
                    <th>使用范围</th>
                    <th>状态</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            
            <?php if(is_array($coupon) || $coupon instanceof \think\Collection || $coupon instanceof \think\Paginator): if( count($coupon)==0 ) : echo "" ;else: foreach($coupon as $key=>$v): ?>
                <tr data-id="1">
                    <td>
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1"><i class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td><?php echo $v['id']; ?></td>
                    <td><?php echo $v['coupon_name']; ?></td>
                    <td><?php echo $v['createnum']; ?></td>
                    <td><?php echo $v['send_num']; ?></td>
                    <td><?php echo $v['use_num']; ?></td>
                    <td><?php echo $v['coupon_money']; ?></td>
                    <td><?php echo $v['condition']; ?></td>
                    <td><?php echo coupon_range($v['use_range']); ?></td>
                    <?php if($v['status']==1): ?>
                    <td>有效</td>
                    <?php else: ?>
                     <td>无效</td>
                     <?php endif; ?>
                     <td><?php echo date('Y-m-d H:i:s',$v['use_start_time']); ?></td>
                     <td><?php echo date('Y-m-d H:i:s',$v['use_end_time']); ?></td>
                    <td class="td-manage">
                        <a title="编辑" onclick="WeAdminEdit('编辑活动信息','coupon_list_edit.html?id=<?php echo $v['id']; ?>', 1, 800, 800)" href="javascript:;">
                            <i class="layui-icon">&#xe642;</i>编辑
                        </a>
                        <a onclick="WeAdminShow('添加活动信息','./coupon_list_add.html',600,400)" title="添加会员信息" href="javascript:;">
                            <i class="layui-icon">&#xe654;</i>
                        </a>
                        <a title="删除" onclick="coupon_del('<?php echo $v['id']; ?>')" href="javascript:;">
                            <i class="layui-icon">&#xe640;</i>删除
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        
        </div>
    </div>
    <?php echo $coupon->render(); ?>
    <!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/static/js/jquery.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
    function coupon_del(id){
        var returnVal = window.confirm("确定删除吗");
        if(!returnVal) {
           // alert('谢谢信任');
        }else{
            $.post('ajax_coupon_del',{id:id},function(data){
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