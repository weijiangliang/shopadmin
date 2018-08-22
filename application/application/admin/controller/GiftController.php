<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use app\admin\controller\AdminbaseController;
use app\admin\model\Gift;
use app\admin\model\User;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use lib\Upload;
class GiftController extends AdminbaseController
{
//礼品列表
 public function gift_list(){
 	if(Request::instance()->isPost()){
 		$name = trim(input('name'));
         $gift = Gift::where('name','like',"%".$name."%")->paginate(10);
      $count = Gift::where('name','like',"%".$name."%")->count();
  return $this->fetch('gift_list',[
    'gift'=>$gift,
    'count'=>$count
    ]);
 	}
      $gift = Gift::paginate(10);
      $count = Gift::count();
 	return $this->fetch('gift_list',[
 		'gift'=>$gift,
 		'count'=>$count
 		]);
 }

//添加礼包
public function gift_list_add(){
      if(Request::instance()->isPost()){
        $data['name'] = trim(input('name'));
        $file= request()->file('thumb');
        $data['add_time']=time();
         if($file){
          $imgurl = Upload::image('gift',$file);
          $data['thumb']=$imgurl;
         }
         $gift = Gift::create($data);
         if(!$gift){
          $this->error('添加失败');
          die;
         }else{
          $this->success('添加成功');
         }
       }
  return $this->fetch('gift_list_add');
}

//删除礼包
public function ajax_gift_del(){
	$id = trim(input('id'));
	$gift = Gift::where('id',$id)->delete();
	if(!$gift ){
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

//套餐列表
public function gift_mall_list(){
    if(Request::instance()->isPost()){
    $mall_name = trim(input('mall_name'));
        $giftmall = db('gift_mall')->where('mall_name','like',"%".$mall_name."%")->paginate(10);
  $count = db('gift_mall')->where('mall_name','like',"%".$mall_name."%")->count();
  return $this->fetch('gift_mall_list',[
    'giftmall'=>$giftmall,
    'count'=>$count
    ]);
  }
  $giftmall = db('gift_mall')->paginate(10);
  $count = db('gift_mall')->count();
  return $this->fetch('gift_mall_list',[
    'giftmall'=>$giftmall,
    'count'=>$count
    ]);
}


//添加套餐 
public function gift_mall_add(){
  if(Request::instance()->isPost()){
    $data['mall_name']=trim(input('mall_name'));
    $data['gift_id']=trim(input('gift_id'));
    $ids = $ids = input('post.brand/a');;
    $data['good_ids']=trim(input('good_ids'));
    $data['add_time']=time();
    $data['good_ids']=implode(',',$ids);
    if(!$data['mall_name']||!$data['gift_id']||!$data['good_ids']){
      $this->error('数据不能为空');
      die;
    }
    $mall = db('gift_mall')->insert($data);
    if(!$mall){
      $this->error('添加失败');
      die;
    }else{
      $this->success('添加成功');
      die;
    }
    }
 $gift =  Gift::select();
 $good = db('goods')->select();
 return $this->fetch('gift_mall_add',[
  'goods'=>$good,
  'gift'=>$gift
  ]);
}
//删除套餐列表
public function ajax_mall_del(){
  $id = trim(input('id'));
  $mall =db('gift_mall')->where('id',$id)->delete();
  if(!$mall ){
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
//编辑套餐 
public function gift_mall_edit(){
  if(Request::instance()->isPost()){
    $id = trim(input('id'));
    $data['mall_name']=trim(input('mall_name'));
    $data['gift_id']=trim(input('gift_id'));
    $ids = $ids = input('post.brand/a');
    $data['good_ids']=trim(input('good_ids'));
    $data['add_time']=time();
    $data['good_ids']=implode(',',$ids);
    if(!$data['mall_name']||!$data['gift_id']||!$data['good_ids']){
      $this->error('数据不能为空');
      die;
    }
    $mall = db('gift_mall')->where('id',$id)->update($data);
    if(!$mall){
      $this->error('添加失败');
      die;
    }else{
      $this->success('添加成功');
      die;
    }
    }
    $id = trim(input('id'));
    $mall = db('gift_mall')->where('id',$id)->find();
    $good_ids = explode(',',$mall['good_ids']);
   $gift =  Gift::select();
   $good = db('goods')->select();
   return $this->fetch('gift_mall_edit',[
    'good_ids'=>$good_ids,
    'mall'=>$mall,
    'goods'=>$good,
    'gift'=>$gift
    ]);
}



//编辑礼包
public function gift_list_edit(){
  if(Request::instance()->isPost()){
        $id = trim(input('id'));
        $data['name'] = trim(input('name'));
        $file= request()->file('thumb');
        $data['add_time']=time();
         if($file){
          $imgurl = Upload::image('gift',$file);
          if(empty($imgurl)){
            $this->error('图片上上传有误');
            die;
          }
          $data['thumb']=$imgurl;
         }
         $gift = Gift::where('id',$id)->update($data);
         if(!$gift){
          $this->error('编辑失败');
          die;
         }else{
          $this->success('编辑成功');
         }
       }
  $id = trim(input('id'));
  $gift = Gift::where('id',$id)->find();
  return $this->fetch('gift_list_edit',[
    'gift'=>$gift
    ]);
}


// //上传图片
// public function upload($flag,$file){
//    if($file){
//         $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
//         $temp = ROOT_PATH . 'public' . DS . 'uploads'.'\\';
//         $rootpath = ROOT_PATH . 'public' . DS . 'uploads';
//         if($info){
//            $midImg = date('Ymd', time()) . DS . $info->getFilename();
//           $image = \think\Image::open($file);
//           $a = $image->thumb(150, 150, \think\Image::THUMB_CENTER)->save($temp . $midImg); 
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







}