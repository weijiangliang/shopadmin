<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"E:\shop\public/../application/admin\view\user\member_account.html";i:1533708380;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-会员账户明细</title>
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
    <style>
        /* .my_can_use {
            width: 40px
        }
        .my_choice{} */
        
        .my_right {
            text-align: right;
            height: 33px;
            padding: 0 6px;
        }
    </style>
</head>

<body>
    <div class="weadmin-body">
        <div class="layui-form-item">
            <button class="layui-btn layui-btn-warm" lay-filter="add" lay-submit="" style="margin-left: 136px">会员账户变动明细</button>
        </div>
        <form class="layui-form" action="<?php echo url('admin/User/member_account'); ?>" method="post">
            <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>会员id
				</label>
                <div class="layui-input-inline">
                    <input type="text" id="vip_id" name="user_id" lay-verify="required|nikename" autocomplete="off" class="layui-input" placeholder="请输入要充值的会员id">
                </div>
            </div>
             <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
                    <span class="we-red">*</span>充值金额
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="vip_id" name="num" lay-verify="required|nikename" autocomplete="off" class="layui-input" placeholder="请输入充值金额">
                </div>
            </div>
            <th class="my_vip_list"></th>
            <div class="layui-form-item">
                <label for="vip_name" class="layui-form-label">
					<span class="we-red">*</span>充值原因
				</label>
                <div class="layui-input-inline">
                    <textarea rows="10" cols="36" name="desc"></textarea>
                </div>
            </div>


                <button class="layui-btn my_sure" lay-filter="add" lay-submit="" style="margin-left: 136px">确定</button>
                <button class="layui-btn layui-btn-danger" lay-filter="add" lay-submit="" style="margin-left: 16px">重置</button>
            </div>
        </form>
    </div>
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script>
        var select = 'dd[lay-value=' + data.schoolId + ']';
        $('#edit_exam_school').siblings("div.layui-form-select").find('dl').find(select).click();
    </script>

    <!-- <script>
		layui.extend({
			admin: '{/}../../static/js/admin'
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