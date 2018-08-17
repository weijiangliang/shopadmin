<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"E:\shop\public/../application/admin\view\admin\admin_rule_edit.html";i:1534472643;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-权限规则添加</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/static/css/font.css">
    <link rel="stylesheet" href="/static/static/css/weadmin.css">
    <script type="text/javascript" src="/static/static/js/jquery.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="weadmin-body">
        <form class="layui-form" action="<?php echo url('admin/admin/admin_rule_add'); ?>" method="post">
            <div class="layui-form-item">
                <label for="user_qxgzNAME" class="layui-form-label">
                    <span class="we-red">*</span>权限名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="user_qxgzNAME" name="menu_name" value="<?php echo $auth['menu_name']; ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="user_qxmc" class="layui-form-label">
                    <span class="we-red">*</span>模块
                </label>
                <div class="layui-input-inline">
          <input type="text" id="user_qxmc" readonly name="menu_module"  autocomplete="off" class="layui-input" value="<?php echo $auth['menu_module']; ?>" >
                </div>
            </div>
             <div class="layui-form-item">
                <label for="user_qxmc" class="layui-form-label">
                    <span class="we-red">*</span>控制器
                </label>
                <div class="layui-input-inline">
                <select id="cont" name="menu_controller" style="display: inline-block;  width: 260px;height: 35px;">
                <?php if(is_array($planList) || $planList instanceof \think\Collection || $planList instanceof \think\Paginator): if( count($planList)==0 ) : echo "" ;else: foreach($planList as $key=>$v): if($v != 'Adminbase' AND $v != 'Check'): ?>

                <option value="<?php echo $v; ?>" <?php if($v==$auth['menu_controller']): ?> selected <?php endif; ?>><?php echo $v; ?></option>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
                </div>
            </div>
             <div class="layui-form-item">
                <label for="user_ownQXfL" class="layui-form-label">
                    <span class="we-red">*</span>方法
                </label>
                <div class="layui-input-inline">
                    <select id="action" name="menu_function" style="display: inline-block;  width: 260px;height: 35px;">
                    <option value="<?php echo $auth['menu_function']; ?>" selected="selected"><?php echo $auth['menu_function']; ?></option>
                </select>
                </div>
            </div>
            
            <div class="layui-form-item layui-form-text">
                    <label for="user_desc" class="layui-form-label">
                        描述
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" id="user_desc" name="menu_description" class="layui-textarea">
                        <?php echo $auth['menu_description']; ?>
                        </textarea>
                    </div>
                </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label"></label>
                <button class="layui-btn" lay-filter="add" lay-submit="">确定</button>
            </div>
        </form>
    </div>
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript">
            $(function(){
                //change事件触发
                           $("#cont").change(function(){
                              $("#action").html("");
                             var cont = $('#cont option:selected').val();
                                     $.post('ajax_get_action',{controller:cont},function(data){
                                        console.log(data);
                                         if(data.status==1){
                                            var option = $(data.str);
                                               $("#action").append(option); 
                                                }else{
                                                    alert(data.msg);
                                                }
                                     });
                              });
                             //第一次进入默认访问第一个
                             var cont = $('#cont option:selected').val();
                                     $.post('ajax_get_action',{controller:cont},function(data){
                                        console.log(data);
                                         if(data.status==1){
                                            var option = $(data.str);
                                               $("#action").append(option); 
                                                }else{
                                                    alert(data.msg);
                                                }
                                     });
           });
            </script>
    <script type="text/javascript">

        // layui.extend({
        //     admin: '/static/static/js/admin'
        // });
        // layui.use(['form', 'layer', 'admin'], function () {
        //     var form = layui.form,
        //         admin = layui.admin,
        //         layer = layui.layer;
        //     //自定义验证规则
        //     form.verify({
        //         nikename: function (value) {
        //             if (value.length < 5) {
        //                 return '昵称至少得5个字符啊';
        //             }
        //         },
        //         pass: [/(.+){6,12}$/, '密码必须6到12位'],
        //         repass: function (value) {
        //             if ($('#L_pass').val() != $('#L_repass').val()) {
        //                 return '两次密码不一致';
        //             }
        //         }
        //     });

        //     //监听提交
        //     form.on('submit(add)', function (data) {
        //         console.log(data);
        //         //发异步，把数据提交给php
        //         layer.alert("增加成功", {
        //             icon: 6
        //         }, function () {
        //             // 获得frame索引
        //             var index = parent.layer.getFrameIndex(window.name);
        //             //关闭当前frame
        //             parent.layer.close(index);
        //         });
        //         return false;
        //     });
        // });
    </script>
</body>

</html>