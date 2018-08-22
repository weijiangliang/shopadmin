<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"E:\shop\public/../application/admin\view\order\order_goods_edit.html";i:1533883715;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-查看订单详细信息</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/static/css/font.css">
    <link rel="stylesheet" href="/static/static/css/weadmin.css">
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
	      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
	      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
</head>

<body>
    <div class="weadmin-body">
        <form class="layui-form" action="<?php echo url('admin/Order/order_goods_edit'); ?>" method="post">
        <input type="hidden" name="good_num_ago" value="<?php echo $order_goods['good_num']; ?>" >
        <input type="hidden" name="final_price_ago" value="<?php echo $order_goods['final_price']; ?>">

        
        <input type="hidden" name="order_goods_id" value="<?php echo $order_goods['id']; ?>">
            <div class="layui-form-item">
                <label for="order_username" class="layui-form-label">
                    <span class="we-red">*</span>订单商品id
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_username" name="order_username" required="" lay-verify="required" autocomplete="off" class="layui-input"
                        value="<?php echo $order_goods['id']; ?>" disabled="disabled">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="order_id" class="layui-form-label">
                    <span class="we-red">*</span>商品名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_id" name="good_name" required="" lay-verify="required" autocomplete="off" class="layui-input"
                        value="<?php echo $order_goods['good_name']; ?>" disabled="disabled">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="order_shr" class="layui-form-label">
                    <span class="we-red">*</span>商品规格
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_shr" name="spec_key_name" required="" lay-verify="required" autocomplete="off" class="layui-input"
                        value="<?php echo $order_goods['spec_key_name']; ?>" disabled="disabled">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="order_phone" class="layui-form-label">
                    <span class="we-red">*</span>购买数量
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_phone" name="good_num" required="" lay-verify="phone" autocomplete="off" class="layui-input" value="<?php echo $order_goods['good_num']; ?>" >
                </div>
            </div>
            <div class="layui-form-item">
                <label for="order_address" class="layui-form-label">
                    <span class="we-red">*</span>购买价格
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_address" name="final_price" required="" lay-verify="required" autocomplete="off" class="layui-input"
                        value="<?php echo $order_goods['final_price']; ?>" >
                </div>
            </div>     
            <div class="layui-form-item">
                <button class="layui-btn" lay-filter="add" lay-submit="">确认修改</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="/static/static/js/jquery.js"></script>
    <script>

        layui.extend({
            admin: 'static/static/js/admin'
        });
        layui.use(['form', 'admin', 'jquery', 'table', 'layer'], function () {
            var form = layui.form,
                admin = layui.admin,
                $ = layui.jquery,
                table = layui.table,
                layer = layui.layer;

            // //自定义验证规则
            // form.verify({
            //     nikename: function (value) {
            //         if (value.length < 5) {
            //             return '昵称至少得5个字符啊';
            //         }
            //     },
            //     pass: [/(.+){6,12}$/, '密码必须6到12位'],
            //     repass: function (value) {
            //         if ($('#L_pass').val() != $('#L_repass').val()) {
            //             return '两次密码不一致';
            //         }
            //     }
            // });

         
            var num = 3;

            window.addTable = function () {
                var tableHtml = "";
                tableHtml += '<tr id="tr' + num + '">' +
                    '<td>' + num + '</td>' +
                    '<td><div class="layui-input-inline"><input type="text" name="canshu1" class="layui-input"></div></td>' +
                    '<td><div class="layui-input-inline"><input type="text" name="canshu2" class="layui-input"></div></td>' +
                    '<td><div class="layui-input-inline"><input type="text" name="canshu3" class="layui-input"></div></td>' +
                    '<td><div class="layui-input-inline"><input type="text" name="canshu4" class="layui-input"></div></td>' +
                    '<td><a style="cursor: pointer; color: blue;" onclick="removeTr(' + num + ')">删除</a>' +
                    '</td>' +
                    '</tr>';
                //				tableHtml +='<tr>'+
                //								'<td>2</td>'+
                //								'<td>haier海尔 BC-93TMPF 93升单门冰箱</td>'+
                //								'<td>0.01</td>'+
                //								'<td>984</td>'+
                //								'<td>9.84</td>'+
                //								'<td><a style="cursor: pointer; color: blue;" onclick="removeTr(2)">删除</a></td>'+
                //							'</tr>';

                var elements = $("#myTable").children().length; //表示id为“mtTable”的标签下的子标签的个数

                $("#myTable").children().eq(elements - 1).after(tableHtml); //在表头之后添加空白行
                num++;
            }
            //删除行
        //     function removeTr(trNum) {
        //         $("#tr" + trNum).remove();
        //     }

        // });

    </script>
</body>

</html>