<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"E:\shop\public/../application/admin\view\product\product_category_edit.html";i:1532945580;}*/ ?>
/static/<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-商品分类编辑</title>
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
    <div class="weadmin-body">
        <form class="layui-form">
            <div class="layui-form-item">
                <label for="product_cate_id" class="layui-form-label">
                    <span class="we-red">*</span>商品分类ID
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="product_cate_id" name="product_cate_id" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="1001">
                </div>
                <span class="layui-form-mid layui-word-aux">
                    请必须添加商品编号，将会成为该商品的唯一标识
                </span>
            </div>
            <div class="layui-form-item">
                <label for="product_cate_name" class="layui-form-label">
                    <span class="we-red">*</span>商品分类名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="product_cate_name" name="product_cate_name" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="短裤短袖">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="product_num" class="layui-form-label">
                    <span class="we-red">*</span>商品货号
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="product_num" name="product_num" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="001">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="product_ownCate" class="layui-form-label">
                    <span class="we-red">*</span>商品所属分类
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="product_ownCate" name="product_ownCate" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="服装">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="product_price" class="layui-form-label">
                    <span class="we-red">*</span>商品价格
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="product_price" name="product_price" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="￥1111">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="product_count" class="layui-form-label">
                    <span class="we-red">*</span>商品库存
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="product_count" name="product_count" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="999">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="product_Supplier" class="layui-form-label">
                    <span class="we-red">*</span>商品供应商
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="product_Supplier" name="product_Supplier" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="张三">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="product_area" class="layui-form-label">
                    <span class="we-red">*</span>商品供应地
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="product_area" name="product_area" lay-verify="required|nikename" autocomplete="off" class="layui-input" value="国内">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">确认修改</button>
            </div>
        </form>
    </div>
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>

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
                        '<div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="' +
                        _len + '"><i class="layui-icon">&#xe605;</i></div>' +
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