<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"E:\shop\public/../application/admin\view\admin\admin_editrole.html";i:1534227889;}*/ ?>
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-管理员列表编辑</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/static/css/font.css">
<!-- 		<link rel="stylesheet" href="/static/static/css/weadmin.css"> -->
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="weadmin-body">
        <form class="layui-form" action="<?php echo url('admin/admin/admin_editrole'); ?>" method="post">
        <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
        <label for="username" class="layui-form-label">
                  <span class="we-red"></span>请选择角色
              </label>
              <hr />
              
              <?php if(is_array($role) || $role instanceof \think\Collection || $role instanceof \think\Paginator): if( count($role)==0 ) : echo "" ;else: foreach($role as $key=>$v): ?>
                
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="we-red">*</span><?php echo $v['role_name']; ?>
              </label>
              <div class="layui-input-inline">
                  <input type="checkbox" id="username" name="username[]"  lay-verify="required"
                  autocomplete="off" value="<?php echo $v['role_id']; ?>" class="layui-input" <?php if(is_array($role_id) || $role_id instanceof \think\Collection || $role_id instanceof \think\Paginator): if( count($role_id)==0 ) : echo "" ;else: foreach($role_id as $key=>$vol): if($v['role_id']==$vol): ?> checked="1" <?php endif; endforeach; endif; else: echo "" ;endif; ?> />
                  
              </div>
              </div>
                
         <?php endforeach; endif; else: echo "" ;endif; ?>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <input  type="submit"  lay-filter="add" lay-submit="" value="确定" />
                  

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
        
        //   //自定义验证规则
        //   form.verify({
        //     nikename: function(value){
        //       if(value.length < 5){
        //         return '昵称至少得5个字符啊';
        //       }
        //     }
        //     ,pass: [/(.+){6,12}$/, '密码必须6到12位']
        //     ,repass: function(value){
        //         if($('#L_pass').val()!=$('#L_repass').val()){
        //             return '两次密码不一致';
        //         }
        //     }
        //   });

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