<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\shop\public/../application/admin\view\coupon\coupon_user_edit.html";i:1534765064;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>多啦优选后台管理系统-礼包列表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/static/css/font.css">
    <link rel="stylesheet" href="/static/static/css/weadmin.css">
    <script src="/static/static/js/jquery.js" charset="utf-8"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
	      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
	      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
</head>

<body>
    <div class="weadmin-body">
        <form class="layui-form" action="<?php echo url('admin/Coupon/coupon_user_edit'); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $couponlist['id']; ?>">
            <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>优惠券
				</label>
                <div class="layui-input-inline">
                   <select name='coupon_id' style="display: inline-block;  width: 260px;height: 35px;">
                   <?php if(is_array($coupon) || $coupon instanceof \think\Collection || $coupon instanceof \think\Paginator): if( count($coupon)==0 ) : echo "" ;else: foreach($coupon as $key=>$v): ?>
                   <option  value="<?php echo $v['id']; ?>" <?php if($couponlist['coupon_id']==$v['id']): ?> selected="selected" <?php endif; ?>><?php echo $v['coupon_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                   </select>
                </div>
                <!-- <div class="layui-form-mid layui-word-aux">
						请设置至少5个字符，将会成为您唯一的登录名
					</div> -->
            </div>
            <div class="layui-form-item">
                <label for="vip_name" class="layui-form-label">
					<span class="we-red">*</span>选择用户
				</label>
                <div class="layui-input-inline" style="width: 400px;">
                 <select name='user_id' style="display: inline-block;  width: 150px;height: 35px; size='3';" id="goods" multiple="multiple" size="5">
                   <?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): if( count($user)==0 ) : echo "" ;else: foreach($user as $key=>$vol): ?>
                   <option  value="<?php echo $vol['user_id']; ?>" <?php if($couponlist['user_id']==$vol['user_id']): ?> selected="selected" <?php endif; ?>><?php echo $vol['user_id']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                   </select>
                   <input type="text" id="seuser"  style="display: inline-block;  width: 100px;height: 31px;" placeholder="请输入用户id">
                   <span id="btn" onclick="serach()" style="position: absolute;top: 1px; width: 35px;height: 35px; background-color: #009688; text-align: center"><i class="layui-icon" style="line-height: 35px">&#xe615;</i></span>
                </div>
            </div>
           <!--  <div class="layui-form-item">
                <label for="vip_name" class="layui-form-label">
					<span class="we-red">*</span>优惠券兑换码
				</label>
                <div class="layui-input-inline">
                    <input type="text" name="activity_price" autocomplete="off" style="display: inline-block;  width: 260px;height: 35px;">
                </div>
            </div> -->
        <!--     <div class="layui-form-item">
                <label for="vip_name" class="layui-form-label">
					<span class="we-red">*</span>vip促销价
				</label>
                <div class="layui-input-inline">
                    <input type="text" id="vip_name" name="vip_activity_price"  style="display: inline-block;  width: 260px;height: 35px;">
                </div>
            </div> -->
            <div class="layui-form-item">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="" style="margin-left: 136px">确定</button>
            </div>
        </form>
    </div>
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript">
    function serach(){
    	var user_id = $("#seuser").val();
    	if(user_id==''){
    		alert('不能为空');
    	}else{
    		$.post('ajax_serachuser',{user_id:user_id},function(data){
            if(data.status==2){
            	alert(data.msg);
            }else{
            	$("#goods").html('');
            	$("#goods").append(data.str); 
            }
             
    		});
            }



    }


    </script>
<script type="text/javascript"></script>
    <!-- <script>
		layui.extend({
			admin: '{/}/static/static/js/admin'
		});
		layui.use(['form', 'jquery', 'util', 'admin', 'layer'], function () {
			var form = layui.form,
				$ = layui.jquery,
				util = layui.util,
				admin = layui.admin,
				layer = layui.layer;

			//自定义验证规则
			form.verify({
				nikename: function (value) {
					if (value.length < 5) {
						return '昵称至少得5个字符啊';
					}
				},
				pass: [/(.+){6,12}$/, '密码必须6到12位'],
				repass: function (value) {
					if ($('#L_pass').val() != $('#L_repass').val()) {
						return '两次密码不一致';
					}
				}
			});
			//失去焦点时判断值为空不验证，一旦填写必须验证
			$('input[name="email"]').blur(function () {
				//这里是失去焦点时的事件
				if ($('input[name="email"]').val()) {
					$('input[name="email"]').attr('lay-verify', 'email');
				} else {
					$('input[name="email"]').removeAttr('lay-verify');
				}
			});

			//监听提交
			form.on('submit(add)', function (data) {
				//console.log(data.field);
				var f = data.field;
				//console.log(f.username);
				//console.log(f.sex);				
				//var sex = $('input:radio[name="sex"]:checked').val();

				//发异步，把数据提交给php
				layer.alert("增加成功", {
					icon: 6
				}, function () {
					//获取提交成功的时间
					var time = new Date();
					var timeNow = util.toDateString(time);
					// 获得frame索引
					var index = parent.layer.getFrameIndex(window.name);

					var _len = parent.$('#memberList tr').length;
					alert(_len);
					parent.$('#memberList').append(
						'<tr data-id="' + _len + '">' +
						'<td>' +
						'<div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="' + _len +
						'"><i class="layui-icon">&#xe605;</i></div>' +
						'</td>' +
						'<td>' + _len + '</td>' +
						'<td>' + f.username + '</td>' +
						'<td>' + f.sex + '</td>' +
						'<td>' + f.phone + '</td>' +
						'<td>' + f.email + '</td>' +
						'<td>北京市西城区</td>' +
						'<td>' + timeNow + '</td>' +
						'<td class="td-status"><span class="layui-btn layui-btn-normal layui-btn-xs">已启用</span></td>' +
						'<td class="td-manage">' +
						'<a onclick="member_stop(this,\'10001\')" href="javascript:;" title="启用"><i class="layui-icon">&#xe601;</i></a>' +
						'<a title="编辑" onclick="WeAdminShow(\'编辑\',\'./edit.html\',600,400)" href="javascript:;"><i class="layui-icon">&#xe642;</i></a>' +
						'<a onclick="WeAdminShow(\'修改密码\',\'./password.html\',600,400)" title="修改密码" href="javascript:;"><i class="layui-icon">&#xe631;</i></a>' +
						'<a title="删除" onclick="member_del(this,\'要删除的id\')" href="javascript:;"><i class="layui-icon">&#xe640;</i></a>' +
						'</td>' +
						'</tr>'
					);
					//关闭当前frame
					parent.layer.close(index);
				});
				return false;
			});

		});
	</script> -->
</body>

</html>