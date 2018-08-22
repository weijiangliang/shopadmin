<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"E:\shop\public/../application/admin\view\product\image.html";i:1533223822;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>图片上传</title>
    <meta charset="utf-8">
    <style type="text/css">
    * {padding: 0px; margin: 0px;}
    .preview { width: 150px; border-radius: 10px; overflow: hidden; float: left;}
    .preview .preview-box { position: relative; }
    .preview .preview-del {position: absolute;top: 0px; width: 100%; font-size: 13px; line-height: 20px; text-align: center; background: rgb(244,244,244);color:#ccc; cursor: pointer;z-index: 2;}
    /*.preview .preview-del:hover {color: blue;}*/
    .preview-del span {width: 48%; display: inline-block;}
    .preview-del span:hover {color:blue;}
    .preview label  {padding:0px !important;margin: 0px !important; }
    .preview input[type='file'] { display: none; }
    .preview label{width: 100%;height: 150px;line-height: 150px;text-align: center;background: #fff; color: #ccc; background-size:150px 150px;border-radius: 5px;display: inline-block;cursor: pointer;}
    .preview { border: 2px dashed #ccc; }
    .preview-add { border: none !important; cursor: pointer; }

	/*已上传图片*/ 
	#pics { padding-left: 20px; }
	#uploads { padding-left: 30px; }
	#pics .img {position: relative; float: left; margin-left: 5px}
	#pics .img span {width:100%; height: 30px; line-height: 30px; text-align: center; background: #000; position: absolute;  z-index: 2; color: #fff;  bottom: 0px; cursor: pointer;}
	#pics .img span:hover { color: red; }
	#pics .img a {color:#fff; text-decoration: none;}
	#pics .img a:hover {color: red;}
    </style>	
	</head>
<body>

    <div id="pics">
        <?php if(is_array($image) || $image instanceof \think\Collection || $image instanceof \think\Paginator): if( count($image)==0 ) : echo "" ;else: foreach($image as $key=>$v): ?>
        <div class="img">
            <img src="/uploads/<?php echo $v['image_url']; ?>" width="240" height="140" />
            <span>
            	<a href="<?php echo url('product/product_list_delimage', array('id'=> $v['id'])); ?>">删除</a>
            </span>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  	<div style="clear:both;"></div>
    <br /><br />
    <form action="<?php echo url('product/product_list_addimage'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="goods_id" value="<?php echo $goods_id; ?>">
	<div id="uploads">
	    <div class="preview" >
	    	<div class="preview-box">
		    	<div class="preview-del">
		    		<span class="del">删除</span>
		    		<span class="remove">移除</span>
		    	</div>
		        <input id="file1" type="file" name="img[]" accept="image/*"/>
		        <label for="file1">上传文件</label>
	    	</div>
	    </div>
	</div>
    <div class="preview preview-add" >
	    <img src="/static/upload2/add-button.jpg" width="150" height="150" />
    </div>
    <div style="clear:both;margin-left: 30px;padding-top: 20px;">
        <input type="submit" value="上传图片" style="cursor: pointer;">
    </div>
    </form>

	<script src="/static/upload2/jquery.js"></script>
	<script type="text/javascript">
	var num = 1;
	//添加预览图片
	$('.preview-add').click(function(){
		num += 1;
		var html = '<div class="preview" >';
			html += '<div class="preview-box">';
				html += '<div class="preview-del">';
		    		html += '<span class="del">删除</span>';
		    		html += '<span class="remove">移除</span>';
		    	html += '</div>';
				html += '<input id="file'+num+'" type="file" name="img[]" accept="image/*"/>';
				html += '<label for="file'+num+'">上传文件</label>';
			html += '</div>';
		html += '</div>';
		$('#uploads').append(html);
	});
	//预览图片
	$("input[type=file]").live("change", function(e) {
		//获取图片资源
		var file = e.target.files[0]; 
		//只选择图片文件
		if (!file.type.match('image.*')) return false;
  		//通过HTML5接口（FileReader）读取图片
		var reader = new FileReader();
		//读取文件
		reader.readAsDataURL(file); 
  		//文件读取成功完成时触发
		var thisObj = this;
		reader.onload = function(arg) {
			//显示图片
            $(thisObj).next().html('');
			$(thisObj).next().css('background-image', 'url('+arg.target.result +')' );
		}
	});
    //删除预览图片
    $(".preview .preview-del .del").live("click", function() {
        $(this).parent().next().next().html('上传文件');
        $(this).parent().next().next().css('background-image', '' );
    });

    $(".preview .preview-del .remove").live("click", function(){
    	//方法1
    	//$(this).parent().parent().parent().remove();
    	//方法2
    	$(this).parents('.preview').remove();
    });
	</script>
</body>
</html>