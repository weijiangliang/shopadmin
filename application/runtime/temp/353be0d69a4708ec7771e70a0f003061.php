<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\shop\public/../application/admin\view\product\product_list_type.html";i:1533879116;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>XXXX后台管理系统-商品添加</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/static/css/font.css">
    <link rel="stylesheet" href="/static/static/css/weadmin.css">
    <link rel="stylesheet" href="/static/static/css/proAdd.css">
    <link rel="stylesheet" href="/static/static/css/bootstrap.min.css">
    

</head>
<style type="text/css">

        *{
    padding: 0px;
    margin: 0px;
}
body{
    line-height: 1.6;
    font-family: "Helvetica Neue","Hiragino Sans GB","Microsoft YaHei","\9ED1\4F53",Arial,sans-serif;
    color: #222;
    font-size: 14px;
    width:850px;
    margin:40px auto;
}
li{list-style: none;margin-right:10px;}
li label{cursor: pointer;}
.Father_Item0 li{float: left;}
.Father_Item1 li{float: left;}
.Father_Item2 li{float: left;}
.Father_Item3 li{float: left;}

/*琛ㄦ牸鏍峰紡*/
table#process {
    font-size:11px;
    color:#333333;
    border-width: 1px;
    border-color: #666666;
    border-collapse: collapse;
}
table#process th {
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #666666;
    background-color: #dedede;
}
table#process td {
    border-width: 1px;
    padding: 8px;
    border-style: solid;
    border-color: #666666;
    background-color: #ffffff;
}
 .layui-card-left {
        float: left;
        width: 60%;
        margin-top: 40px;
    }
    
    .layui-card-right {
        float: right;
        width: 39%;
        margin-top: 40px;
    }
    
    .guige {
        display: block;
        padding: 10px 0;
    }
</style>
<body>
<form action="<?php echo url('admin/product/product_addtype'); ?>" method="post">
<input type="hidden" name="goods_id" id="goods_id" value="<?php echo $goods_id; ?>">
    <div class="proAdd">
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <li><a href="<?php echo url('admin/product/product_list_type'); ?>">商品模型</a></li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item" style="display: block">
                    <div class="layui-card">
                        <div class="layui-card-header" style="color:darkcyan;">
                            操作提示
                        </div>
                        <div class="layui-card-body">
                            请添加商品模型信息
                        </div>
                    </div>
                    <div class="layui-card-left">
                        <div class="layui-row">
                            <div class="layui-col-md4 rowContent">
                                <span class="proMode">商品模型</span>
                            </div>
                            <div class="layui-col-md8">
                            <select name="goods_type" id="spec_type" class="form-control" style="width:250px;">
                                <option value="0">选择商品模型</option>
                                <?php if(is_array($goodsType) || $goodsType instanceof \think\Collection || $goodsType instanceof \think\Paginator): if( count($goodsType)==0 ) : echo "" ;else: foreach($goodsType as $k=>$vo): ?>
                                    <option value="<?php echo $vo['id']; ?>" <?php if($type_id == $vo['id']): ?>selected="selected" <?php endif; ?>><?php echo $vo['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>          
              <div id="navtab1" style="width: 100%; border: 1px solid #A3C0E8;">
               <div title="扩展信息" tabid="tabItem3">
                <div id="Div1">
                    <div position="center">
                        <div style="padding: 5px 8px;" class="div_content">
                            <div class="div_title"><span>产品规格</span></div>
                         <div class="div_contentlist">
                            </div>
                            <ul>
                            <li><div id="createTable"></div></li>
                            </ul>
                            </div> 
                        </div>
                    </div>
                </div>
            </div> 
        </div>

                </div>
            </div>
        </div>
    </div>
     <div class="btn">

    </div>
     <table id="ajax_attr">
   <tr>
   </tr> 
 </table>
     <input type="submit"  value="确认添加" />
</form>
<script src="/static/lib/layui/layui.js"></script>
<script type="text/javascript" src="/static/static/js/jquery.js"></script>
<script type="text/javascript" src="/static/static/js/sku.js"></script> 



<script type="text/javascript">
/** 以下 商品规格相关 js*/
$(document).ready(function(){
$("#spec_type").change(function(){
    $("#ajax_attr>tbody").html('');
    $(".div_contentlist").html('');
    var type_id = $('#spec_type option:selected').val(); 
    var goods_id = $("#goods_id").val();
    $.post('ajax_product_type',{type_id:type_id,goods_id:goods_id},function(data){
        if(data.attr!=''){
         $.each(data.attr, function (index,obj) {

          //可用
        // var data_arrt_option = $("<tr><td>"+obj.attr_name+"</td><td><input type='text' name='attr["+obj.attr_id+"]' value='"+ obj.attr_values+"'></td></tr>");
        //   $("#ajax_attr>tbody").append(data_arrt_option); 
   
              var data_spec_option = $(obj);
              $("#ajax_attr>tbody").append(data_spec_option);

            });
          }
          if(data.attr!=''){
       $.each(data.spec, function (index,obj) {
             //属性
            //  $.each(obj.attr, function (index,obj) {
            //     console.log(obj);
            // // var option = $("<tr><td>"+obj.attr_name+"</td><td><input type='text' name='"+obj.attr_id+"' value='"+ obj.attr_values+"'>  </td></tr>");
            // //   $("#ajax_attr>tbody").append(option); 
            // });
              //规格
              var data_spec_option = $(obj);
              $(".div_contentlist").append(data_spec_option);
       });
}
    });

});













});






</script>
</body>
</html>