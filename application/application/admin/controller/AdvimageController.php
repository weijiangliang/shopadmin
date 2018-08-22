<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use app\admin\controller\AdminbaseController;
use app\admin\model\Adv;
use app\admin\model\User;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use lib\Upload;
Vendor('sdk.autoload'); 
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Faker\Factory;
class AdvimageController extends AdminbaseController
{
//轮播图列表
 public function advimage_list(){
 	if(Request::instance()->isPost()){
    $ad_name = trim(input('ad_name'));
    $advimage = Adv::where('ad_name','like',"%".$ad_name."%")->paginate(10);
    $count = Adv::where('ad_name','like',"%".$ad_name."%")->count();
    return $this->fetch('advimage_list',[
 		'image'=>$advimage,
 		'count'=>$count
 		]);
 	}
      $advimage = Adv::paginate(10);
      $count = Adv::count();
 	return $this->fetch('advimage_list',[
 		'image'=>$advimage,
 		'count'=>$count
 		]);
 }

//添加轮播图
public function advimage_list_add(){
	if(Request::instance()->isPost()){
		    $file =  request()->file('ad_img');
         $data['ad_name'] = trim(input('ad_name'));
         $data['media_type'] = trim(input('media_type'));
         $data['ad_link'] = trim(input('ad_link'));
         $data['sort'] = trim(input('sort'));
         $data['show_status'] = trim(input('show_status'));
         $data['creat_time'] = time();
          if($file){
          $imgurl = Upload::image('gift',$file);
          if(empty($imgurl)){
            $this->error('图片上传有误');
            die;
          }
         $data['ad_img']=$imgurl;
      }
    $adviamge = Adv::create($data);
    if(!$adviamge){
    	$this->error('添加失败');
    	die;
    }else{
    	$this->success('添加成功');
    	die;
    }

	}
	return $this->fetch('advimage_list_add');
}


//删除轮播图
public function ajax_advimage_del(){
	$id = trim(input('id'));
	$advimage = Adv::where('id',$id)->delete();
	if(!$advimage ){
		$callback =[
		'status'=>2,
		'msg'=>"删除失败"
		];
		return json($callback);
	}else{
		$callback =[
		'status'=>1,
		'msg'=>"删除成功"
		];
		return json($callback);
	}
}

//编辑轮播图
public function advimage_list_edit(){
	if(Request::instance()->isPost()){
		 $file =  request()->file('ad_img');
		     $id = trim(input('id'));
         $data['ad_name'] = trim(input('ad_name'));
         $data['media_type'] = trim(input('media_type'));
         $data['ad_link'] = trim(input('ad_link'));
         $data['sort'] = trim(input('sort'));
         $data['show_status'] = trim(input('show_status'));
          if($file){
          $imgurl = Upload::image('gift',$file);
          if(empty($imgurl)){
            $this->error('图片上传有误');
            die;
          }
         $data['ad_img']=$imgurl;
            }

	    $adviamge = Adv::where('id',$id)->update($data);
      
	    if(!$adviamge){
	    	$this->error('编辑失败');
	    	die;
	    }else{
	    	$this->success('编辑成功');
	    	die;
	    }
	}
	$id = trim(input('id'));
	$adv = Adv::where('id',$id)->find();
	return $this->fetch('advimage_list_edit',[
		'adv'=>$adv
		]);
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
//           $callback=array(
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







}