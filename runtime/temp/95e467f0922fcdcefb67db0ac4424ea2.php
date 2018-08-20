<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\shop\public/../application/admin\view\coupon\coupon_user_list.html";i:1534750211;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>多啦优选-后台管理系统-活动列表</title>
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
        <a href="">优惠券活动</a>
        <a>
          <cite>用户优惠券列表</cite></a>
      </span>
        <a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">&#x1002;</i></a>
    </div>
    <div class="weadmin-body">
        <div class="layui-row">
            <form class="layui-form layui-col-md12 we-search" action="<?php echo url('admin/Coupon/coupon_user_list'); ?>" method="post">
                优惠券搜索：
                <div class="layui-inline">
                    <input type="text" name="coupon_id" placeholder="请输入优惠券ID" autocomplete="off" class="layui-input">
                </div>
                <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </form>
        </div>
        <div class="weadmin-block">
            <!-- <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button> -->
            <button class="layui-btn" onclick="WeAdminShow('添加活动商品信息','./coupon_user_add.html',600,600)"><i class="layui-icon"></i>添加</button>
            <span class="fr" style="line-height:40px">共有数据：<?php echo $count; ?>条</span>
        </div>
        <table class="layui-table" id="memberList">
            <thead>
                <tr>
                    <th>
                        <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                    </th>
                    <td>ID</td>
                    <td>优惠券ID</td>
                    <td>用户ID</td>
                    <td>使用时间</td>
                    <td>发放时间</td>
                    <td>优惠券兑换码</td> 
                    <td>状态</td> 
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($couponlist) || $couponlist instanceof \think\Collection || $couponlist instanceof \think\Paginator): if( count($couponlist)==0 ) : echo "" ;else: foreach($couponlist as $key=>$v): ?>
             <tr data-id="1">
          <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="1"><i class="layui-icon">&#xe605;</i></div>
          </td>
          <td><?php echo $v['id']; ?></td>
          <td><?php echo $v['coupon_id']; ?></td>
          <td><?php echo $v['user_id']; ?></td>
          <td><?php echo date('Y-m-d H:i:s',$v['use_time']); ?></td>
          <td><?php echo date('Y-m-d H:i:s',$v['send_time']); ?></td>
          <td><?php echo $v['code']; ?></td>
          <td><?php echo coupon_user_status($v['status']); ?></td>
          <td class="td-manage">
             <!--  <a onclick="member_stop(this,'10001')" href="javascript:;" title="启用">
                  <i class="layui-icon">&#xe601;</i>
              </a> -->
              <a title="编辑" onclick="WeAdminEdit('编辑活动信息','coupon_user_edit.html?id=<?php echo $v['id']; ?>', 1, 600, 600)" href="javascript:;">
                  <i class="layui-icon">&#xe642;</i>编辑
              </a>
            <!--  <a onclick="WeAdminShow('添加活动信息','./gift_list_add.html',600,600)" title="添加会员信息" href="javascript:;">
                  <i class="layui-icon">&#xe654;</i>
              </a> -->
              <a title="删除" onclick="ajax_couponuser_del('<?php echo $v['id']; ?>')" href="javascript:;">
                  <i class="layui-icon">&#xe640;</i>删除
              </a>
          </td> 
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="page">
        </div>
        <!--<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>-->
        <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
        <script src="/static/static/js/jquery.js" type="text/javascript" charset="utf-8"></script>
         <script type="text/javascript">
    function ajax_couponuser_del(id){
        var returnVal = window.confirm("确定删除吗");
        if(!returnVal) {
           // alert('谢谢信任');
        }else{
            $.post('ajax_couponuser_del',{id:id},function(data){
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