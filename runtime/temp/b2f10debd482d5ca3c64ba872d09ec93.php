<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"E:\shop\public/../application/admin\view\gift\gift_mall_edit.html";i:1534841675;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="/static/lib/layui/css/layui.css" />
    <script src="/static/static/js/jquery.js" charset="utf-8"></script>
</head>

<body>
    <div class="weadmin-body">
        <form class="layui-form" action="<?php echo url('admin/Gift/gift_mall_add'); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $mall['id']; ?>">
        <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>套餐名称
				</label>
                <div class="layui-input-inline">
                 
               <input type="text" name="mall_name" placeholder="请输入套餐名称" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="vip_id" class="layui-form-label">
					<span class="we-red">*</span>礼包
				</label>
                <div class="layui-input-inline">
                   <select name='gift_id' style="display: none"  width: 260px;height: 35px;">
                   <?php if(is_array($gift) || $gift instanceof \think\Collection || $gift instanceof \think\Paginator): if( count($gift)==0 ) : echo "" ;else: foreach($gift as $key=>$v): ?>
                   <option  value="<?php echo $v['id']; ?>" <?php if($v['id']==$mall['gift_id']): ?> selected="1" <?php endif; ?>><?php echo $v['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                   </select>
                </div>
            </div>
           <div class="layui-form-item">
            <label class="layui-form-label">品牌分类</label>
            <div class="layui-unselect layui-form-select downpanel cs">
                <div class="layui-select-title">
                    <input type="text" placeholder="请选择商品" value="" readonly="" class="layui-input layui-unselect"><i class="layui-edge"></i>
                </div>
                <dl class="layui-anim layui-anim-upbit" style="">
                  <?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): if( count($goods)==0 ) : echo "" ;else: foreach($goods as $key=>$vol): ?>   
                    <dd><input type="checkbox" name="brand[]" title="<?php echo $vol['good_name']; ?>" value="<?php echo $vol['good_id']; ?>" lay-skin="primary" style="display:none"  <?php if(is_array($good_ids) || $good_ids instanceof \think\Collection || $good_ids instanceof \think\Paginator): if( count($good_ids)==0 ) : echo "" ;else: foreach($good_ids as $key=>$val): if($vol['good_id']==$val): ?> checked="1" <?php endif; endforeach; endif; else: echo "" ;endif; ?>></dd> 
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
            </div>
           </div>
            <div class="layui-form-item">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="" style="margin-left: 136px">确定</button>
            </div>
        </form>
    </div>
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
	layui.use(['layer','jquery','form','element','util'], function(){
        var layer = layui.layer,form = layui.form,element = layui.element,util = layui.util,$=layui.jquery;
 
        $(function(){
            $(".downpanel").on("click",".layui-select-title",function(e){
                var $select=$(this).parents(".layui-form-select");
 
                $(".layui-form-select").not($select).removeClass("layui-form-selected");
                $select.addClass("layui-form-selected");
                e.stopPropagation();
            }).on("click",".layui-form-checkbox",function(e){
                e.stopPropagation();
            });
        });
   });
</script> 
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
      <style type="text/css">
    .textarea{
		margin: 0px;
		height: 100px;
		width: 270px;
    }
    .layui-unselect{
    	width: 250px;
    }
    .layui-form-select .layui-edge {

    top: 71%;

}
.layui-form-select .layui-input {
    display: inline-block;
    padding-right: 29px;
    cursor: pointer;
    margin-left: 11px;
    }

</style>
</body>

</html>