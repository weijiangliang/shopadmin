<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"E:\shop\public/../application/admin\view\order\order_view.html";i:1534484499;}*/ ?>
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
    <script src="/static/static/js/eleDel.js" type="text/javascript" charset="utf-8"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
	      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
	      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
</head>

<body>
    <div class="weadmin-body">
        <form class="layui-form">
        <label for="order_gmsplb" class="layui-form-label">用户信息：
                    <!-- <a class="layui-btn layui-btn-sm layui-btn-primary" onclick="addTable();">
                        <i class="layui-icon">&#xe608;</i> 添加</a> -->
                </label>
                 <hr />
            <div class="layui-form-item">
                <label for="order_username" class="layui-form-label">
                    <span class="we-red">*</span>用户名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_username" name="order_username" required="" lay-verify="required" autocomplete="off" class="layui-input"
                        value="<?php echo $user['user_id']; ?>" disabled="disabled">
                </div>
            </div>
             <div class="layui-form-item">
                <label for="order_username" class="layui-form-label">
                    <span class="we-red">*</span>用户昵称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_username" name="order_username" required="" lay-verify="required" autocomplete="off" class="layui-input"
                        value="<?php echo $user['nickname']; ?>" disabled="disabled">
                </div>
            </div>
             <div class="layui-form-item">
                <label for="order_username" class="layui-form-label">
                    <span class="we-red" style="height:45px;line-height:45px; display: inline-block;">*</span>实名认证状态
                </label>
                <div class="layui-input-inline">
                    <span   required="" lay-verify="required" autocomplete="off" class="layui-input"
                        value="" disabled="disabled"><?php echo auth_status($user['auth_status']); ?></span>
                </div>
            </div>
             <div class="layui-form-item">
                <label for="order_username" class="layui-form-label">
                    <span class="we-red">*</span>用户手机
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_username" name="order_username" required="" lay-verify="required" autocomplete="off" class="layui-input"
                        value="<?php echo $user['phone']; ?>" disabled="disabled">
                </div>
            </div>
            <br />
           
                 <hr />
                  <label for="order_gmsplb" class="layui-form-label">订单信息：
                    <!-- <a class="layui-btn layui-btn-sm layui-btn-primary" onclick="addTable();">
                        <i class="layui-icon">&#xe608;</i> 添加</a> -->
                </label>
             <div class="layui-form-item">
                <label for="order_address" class="layui-form-label">
                    <span class="we-red">*</span>收货地址
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_address" name="order_address" required="" lay-verify="required" autocomplete="off" class="layui-input"
                        value="<?php echo $order['address_mes']; ?>" disabled="disabled">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="order_id" class="layui-form-label">
                    <span class="we-red">*</span>订单编号
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_id" name="order_id" required="" lay-verify="required" autocomplete="off" class="layui-input"
                        value="<?php echo $order_info['parent_sn']; ?>" disabled="disabled">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="order_shr" class="layui-form-label">
                    <span class="we-red">*</span>收货人
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_shr" name="order_shr" required="" lay-verify="required" autocomplete="off" class="layui-input"
                        value="<?php echo $order['address_name']; ?>" disabled="disabled">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="order_phone" class="layui-form-label">
                    <span class="we-red">*</span>收货人手机
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_phone" name="order_phone" required="" lay-verify="phone" autocomplete="off" class="layui-input" value="<?php echo $order['address_phone']; ?>" disabled="disabled">
                </div>
            </div>
           
            <!-- <div class="layui-form-item">
                <label for="order_wl" class="layui-form-label">
                    <span class="we-red">*</span>配送物流
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_wl" name="order_wl" required="" lay-verify="required" autocomplete="off" class="layui-input"  value="申通物流" disabled="disabled">
                </div>
            </div> -->
            <div class="layui-form-item">
                <label for="order_pay" class="layui-form-label">
                    <span class="we-red">*</span>支付方式
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="order_pay" name="order_pay" required="" lay-verify="required" autocomplete="off" class="layui-input"   value="<?php echo $order['pay_name']; ?>" disabled="disabled">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="order_fptt" class="layui-form-label">
                    <span class="we-red">*</span>发票抬头</label>
                <div class="layui-input-inline">
                    <input type="text" id="order_fptt" name="order_fptt" required="" lay-verify="email" autocomplete="off" class="layui-input" value="<?php echo $order['invoice_title']; ?>" disabled="disabled">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="we-red">*</span>
                </div>
            </div>
             <div class="layui-form-item">
                <label for="order_fptt" class="layui-form-label">
                    <span class="we-red">*</span>纳税人识别号</label>
                <div class="layui-input-inline">
                    <input type="text" id="order_fptt" name="order_fptt" required="" lay-verify="email" autocomplete="off" class="layui-input" value="<?php echo $order['taxpayer']; ?>" disabled="disabled">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="we-red">*</span>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
               
                 <hr />
                  <label for="order_gmsplb" class="layui-form-label">购买商品列表
                </label>
                <div class="layui-input-block">
                    <table class="layui-table" id="myTable">
                        <thead>
                            <tr>
                                <th>商品id</th>
                                <th>商品名称</th>
                                <th>购买价</th>
                                <th>数量</th>
                                
                                <th>操作</th>
                            </tr>

                        </thead>
                        <tbody>
                        <?php if(is_array($order_goods) || $order_goods instanceof \think\Collection || $order_goods instanceof \think\Paginator): if( count($order_goods)==0 ) : echo "" ;else: foreach($order_goods as $key=>$v): ?>
                            <tr>
                                <td><?php echo $v['good_id']; ?></td>
                                <td><?php echo $v['good_name']; ?></td>
                                <td><?php echo $v['final_price']; ?></td>
                                <td><?php echo $v['good_num']; ?></td>
                                
                                <td>
                                    <a style="cursor: pointer; color: blue;" onclick="removeTr(<?php echo $v['id']; ?>)">删除</a>
                                </td>
                            </tr>
                          <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
           <!--  <div class="layui-form-item layui-form-text">
                <label for="order_desc" class="layui-form-label">购买商品描述</label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入内容" id="order_desc" name="order_desc" class="layui-textarea" disabled="disabled"></textarea>
                </div>
            </div> -->
            
        </form>
        <hr />
           <form class="layui-form" action="<?php echo url('admin/order/shipping'); ?>" method="post"  <?php if($order_info['shipping_status']!=1): ?> style="display:none;" <?php endif; ?>>
            <input type="hidden" name="order_info_id" value="<?php echo $order_info['order_info_id']; ?>">
            <div class="layui-form-item">
                    <label for="order_username" class="layui-form-label">
                  <span class="we-red">*</span>物流名称
              </label>
                    <div class="layui-input-inline">
                    <select  type="text" id="order_username" name="shipping_id" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    <?php if(is_array($shipping) || $shipping instanceof \think\Collection || $shipping instanceof \think\Paginator): if( count($shipping)==0 ) : echo "" ;else: foreach($shipping as $key=>$v): ?>
                    <option value="<?php echo $v['shipping_id']; ?>"><?php echo $v['shipping_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="order_username" class="layui-form-label">
                  <span class="we-red">*</span>输入物流单号
              </label>
                    <div class="layui-input-inline">
                        <input type="text" id="order_username" name="shipping_num" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                 <div class="layui-form-item">
        <?php if($order_info['shipping_status']==1): ?>
                <input type="submit" class="layui-btn" lay-filter="add" lay-submit="" value="<?php echo shipping_status($order_info['shipping_status']); ?>" />
                <?php else: ?>
               
            </div>  
        </form> 
 <button class="layui-btn" lay-filter="add" ><?php echo shipping_status($order_info['shipping_status']); ?></button>
                <?php endif; ?>
       
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

            //监听提交
            form.on('submit(add)', function (data) {
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("增加成功", {
                    icon: 6
                }, function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                });
                return false;
            });

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
            function removeTr(trNum) {
                $("#tr" + trNum).remove();
            }

        });
        function removeTr(id){
            var con;
             con = confirm("确定要删除吗?");
       if(con){
        $.post("<?php echo url('admin/Order/ajaxorder_delgoods'); ?>",{id:id},function(data){
            if(data.state==2){
                alert(data.msg);
            }
            if(data.state==1){
                alert(data.msg);
            }
             });
            }
            }
            // }
        // }

        }
    </script>
</body>

</html>