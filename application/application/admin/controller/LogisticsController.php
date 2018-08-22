<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use app\admin\controller\AdminbaseController;
use lib\Upload;
class LogisticsController extends AdminbaseController
{
    //列表
    public function freight_template()
		{
			return $this->fetch('freight_template');

		}
    //快递列表
	public function express(){
    $express = db('shipping')->paginate(10);
		$count = db('shipping')->count();
		return $this->fetch('express',[
      'count'=>$count,
			'express'=>$express
			]);
	  }
	  //添加快递类型
	  public function express_add(){
	  	if(Request::instance()->isPost()){
	  		$shipping_name = trim(input('shipping_name'));
	  		$shipping_code = trim(input('shipping_code'));
	  		$shipping_desc = trim(input('shipping_desc'));
	  		$file =  request()->file('shipping_logo');
	  		if(!$shipping_desc||!$shipping_code||!$shipping_name){
	  		$this->error('数据不能为空');
	  		die;
	  		}
	  		$shippings = db('shipping')->where('shipping_code',$shipping_code)->find();
	  		if($shippings){
	  			$this->error('此快递已有',url('admin/Logistics/express'));
	  			die;

	  		}
	  	if($file){
         $imgurl = Upload::image('express',$file);
          if(empty($imgurl)){
            $this->error('图片上传有误');
            die;
            }
            $data['shipping_logo']=$imgurl;
         }
         $data['shipping_name'] = $shipping_name;
         $data['shipping_code'] = $shipping_code;
         $data['shipping_desc'] = $shipping_desc;
         $shipping = db('shipping')->insert($data);
         if(!$shipping){
         	$this->error('添加失败',url('admin/Logistics/express'));
         	die;
         }else{
         	$this->success('添加成功',url('admin/Logistics/express'));
         // 	$url = url('Logistics/express');
         // echo "<script>alert('添加成功');window.top.location.href='$url';</script>";
         }

	}
 return $this->fetch('express_add');
	  }
//编辑快递类型
	public function express_edit(){
		if(Request::instance()->isPost()){
	  		$shipping_name = trim(input('shipping_name'));
	  		$shipping_code = trim(input('shipping_code'));
	  		$shipping_desc = trim(input('shipping_desc'));
	  		$shipping_id = trim(input('shipping_id'));
	  		$file =  request()->file('shipping_logo');
	  		if(!$shipping_desc||!$shipping_code||!$shipping_name){
	  		$this->error('数据不能为空');
	  		die;
	  		}
	  		if($file){
            $imgurl = Upload::image('express',$file);
          if(empty($imgurl)){
            $this->error('图片上传有误');
            die;
            }
            $data['shipping_logo']=$imgurl;
         }
         $data['shipping_name'] = $shipping_name;
         $data['shipping_code'] = $shipping_code;
         $data['shipping_desc'] = $shipping_desc;
         // var_dump($shipping_id);
         // var_dump($data);
         // die;
         $shipping = db('shipping')->where('shipping_id',$shipping_id)->update($data);
         if(!$shipping){
         	$this->error('编辑失败',url('admin/Logistics/express'));
         	die;
         }else{
         	 $this->success('编辑成功');
         	// $url = url('Logistics/express');
         	// echo "<script>alert('添加成功');window.location.href='$url';window.close();</script>";
         }
	  	}
		$shipping_id = trim(input('shipping_id'));
		if(!$shipping_id){
			$this->error('编辑异常');
			die;
		}
		$shipping = db('shipping')->where('shipping_id',$shipping_id)->find();
		return $this->fetch('express_edit',[
			'shipping'=>$shipping
			]);
	}

//删除快递
public function express_del(){
	$shipping_id=trim(input('shipping_id'));
   if(!$shipping_id){
   	$callback = [
   'status' => 2,
   'msg' => '删除异常'
   	];
   	return json($callback);
   	die;
    }
    $shipping = db('shipping')->where('shipping_id',$shipping_id)->delete();
    if(!$shipping ){
	    $callback = [
	   	'status' => 2,
	   'msg' => '删除失败'
    	];
   	return json($callback);
	   	die;
    }else{
    	$shipping = db('shipping')->where('shipping_id',$shipping_id)->find();
    	$path = ROOT_PATH . 'public' . DS . 'uploads' ."/";
        $rs1 = @unlink($path . $shipping['shipping_logo']);
	    $callback = [
	   'status' => 1,
	   'msg' => '删除成功'	
    	];
   	return json($callback);
	   	die;
    }
}

// //上传图片
// public function upload($flag,$file){
//    if($file){
//         $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
//         $rootpath = ROOT_PATH . 'public' . DS . 'uploads';
//         if($info){   
//           $imgurl = date('Ymd').'/'. $info->getFilename();
//           $imagaddr =  $rootpath.'/'.$imgurl;
//           $imgurl = Upload::image($flag,$imagaddr);
//              $callback=array(
//             'statu' =>1,
//             'imgurl' => $imgurl
//             );
//             return $callback;
//         }else{
//             $msg=$file->getError();
//             $callback=array(
//             'statu' => 0,
//             'msg' => $msg
//             );
//             return $callback;
//         }
//     }
// }

//快递状态
public function ajaxexpress_stautus(){

  $shipping_id = trim(input('shipping_id'));
  $is_open = trim(input('is_open'));
  if(!$shipping_id||!$is_open){
     $callback = [
      'status' => 2,
     'msg' => '修改失败'
      ];
return json($callback);
  }
  if($is_open==1){
    $data['is_open']=2;
  }elseif($is_open==2) {
    $data['is_open']=1;
  }
$shipping = db('shipping')->where('shipping_id',$shipping_id)->update($data);
    if(!$shipping){
       $callback = [
      'status' => 2,
      'msg' => '修改失败'
       ];
       return json($callback);
    }else{
       $callback = [
      'status' => 1,
      'msg' => '修改成功'
      ];
      return json($callback);
    }

}
}