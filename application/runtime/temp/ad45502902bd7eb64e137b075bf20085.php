<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"E:\shop\public/../application/admin\view\admin\admin_list_edit.html";i:1534471883;}*/ ?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-管理员列表添加</title>
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
        <form class="layui-form" action="<?php echo url('admin/admin/admin_list_edit'); ?>" method="post">
        <input type="hidden" name="admin_id" value="<?php echo $admin['admin_id']; ?>">
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="we-red">*</span>登录名
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="admin_name" required="" lay-verify="required"
                  autocomplete="off" class="layui-input" value="<?php echo $admin['admin_name']; ?>">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="we-red">*</span>将会成为您唯一的登陆名
              </div>
          </div>
          <div class="layui-form-item">
              <label for="user_phone" class="layui-form-label">
                  <span class="we-red">*</span>密码
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="user_phone" name="admin_password" required="" lay-verify="phone"
                  autocomplete="off" class="layui-input" value="<?php echo $admin['admin_password']; ?>">
              </div>
          </div>
           <div class="layui-form-item">
              <label for="user_phone" class="layui-form-label">
                  <span class="we-red">*</span>昵称
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="user_phone" name="admin_nickname" required="" lay-verify="phone"
                  autocomplete="off" class="layui-input" value="<?php echo $admin['admin_nickname']; ?>">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="user_phone" class="layui-form-label">
                  <span class="we-red">*</span>性别
              </label>
              <div class="layui-input-inline">
                  <input type="radio" id="user_phone" name="admin_sex"  value="1" <?php if($admin['admin_sex']==1): ?> checked="1" <?php endif; ?> style="display: inline-block;">男
                  <input type="radio" id="user_phone" name="admin_sex"  value="2" <?php if($admin['admin_sex']==2): ?> checked="1" <?php endif; ?> style="display: inline-block;">女
              </div>
          </div>
          <div class="layui-form-item">
              <label for="user_email" class="layui-form-label">
                  <span class="we-red">*</span>邮箱
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="user_email" name="admin_email" required="" lay-verify="email"
                  autocomplete="off" class="layui-input" value="<?php echo $admin['admin_email']; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label"></label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">确定</button>
          </div>
      </form>
    </div>
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <!-- <script type="text/javascript">
        layui.extend({
          admin: '/static/static/js/admin'
        });
        layui.use(['form','layer','admin'], function(){
          var form = layui.form,
            admin = layui.admin,
            layer = layui.layer;
          //自定义验证规则
          form.verify({
            nikename: function(value){
              if(value.length < 5){
                return '昵称至少得5个字符啊';
              }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,repass: function(value){
                if($('#L_pass').val()!=$('#L_repass').val()){
                    return '两次密码不一致';
                }
            }
          });

          //监听提交
          form.on('submit(add)', function(data){
            console.log(data);
            //发异步，把数据提交给php
            layer.alert("增加成功", {icon: 6},function () {
                // 获得frame索引
                var index = parent.layer.getFrameIndex(window.name);
                //关闭当前frame
                parent.layer.close(index);
            });
            return false;
          });
        });
    </script> -->
  </body>

</html>