<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use app\admin\controller\AdminbaseController;
use app\admin\model\Coupon;
use app\admin\model\Couponlist;
use app\admin\model\User;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class CouponController extends AdminbaseController
{
  
//优惠券列表
public function coupon_list(){
	if(Request::instance()->isPost()){
		$coupon_name = trim(input('coupon_name'));
		$coupon = Coupon::where('coupon_name',"like","%".$coupon_name."%")->paginate(10);
		$count = Coupon::where('coupon_name',"like","%".$coupon_name."%")->count();
		return $this->fetch('coupon_list',[
		'coupon'=>$coupon,
		'count'=>$count
		]);

	}
	$coupon = Coupon::paginate(10);
	$count = Coupon::count();
	return $this->fetch('coupon_list',[
		'coupon'=>$coupon,
		'count'=>$count
		]);
}
//添加优惠券
public function coupon_list_add(){
	if(Request::instance()->isPost()){
    $data['coupon_name']=trim(input('coupon_name'));
    $data['coupon_money']=trim(input('coupon_money'));
    $data['condition']=trim(input('condition'));
    $data['createnum']=trim(input('createnum'));
    $data['send_start_time']=strtotime(trim(input('send_start_time')));
    $data['send_end_time']=strtotime(trim(input('send_end_time')));
    $data['use_start_time']=strtotime(trim(input('use_start_time')));
    $data['use_end_time']=strtotime(trim(input('use_end_time')));
    $data['type']=2;
    $data['use_range']=2;
    $data['add_time']=time();
    $data['status']=1;
   $coupon =  Coupon::create($data);
   if(!$coupon){
   	$this->error('添加失败');
   	die;
   }else{
      $this->success('添加成功');
   	die;
   }

	}

	return $this->fetch('coupon_list_add');
}

// //修改优惠卷信息
// public function coupon_list_edit(){
// 	if(Request::instance()->isPost()){
// 	$data['coupon_name']=trim(input('coupon_name'));
//     $data['coupon_money']=trim(input('coupon_money'));
//     $data['condition']=trim(input('condition'));
//     $data['createnum']=trim(input('createnum'));
//     $data['send_start_time']=strtotime(trim(input('send_start_time')));
//     $data['send_end_time']=strtotime(trim(input('send_end_time')));
//     $data['use_start_time']=strtotime(trim(input('use_start_time')));
//     $data['use_end_time']=strtotime(trim(input('use_end_time')));
//     $coupon = Coupon::where('id',$id)->update($data);
//       if(!$coupon){
//    	$this->error('编辑失败');
//    	die;
//    }else{
//       $this->success('编辑成功');
//    	die;
//    }
// 	}
// 	return $this->fetch('coupon_edit_list');
// }

//删除优惠卷
public function ajax_coupon_del(){
	$id = trim(input('id'));
	$coupon = Coupon::where('id',$id)->delete();
	if(!$coupon ){
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

//编辑优惠券
public function coupon_list_edit(){
	if(Request::instance()->isPost()){
	$id = trim(input('id'));
	$data['coupon_name']=trim(input('coupon_name'));
    $data['coupon_money']=trim(input('coupon_money'));
    $data['condition']=trim(input('condition'));
    $data['createnum']=trim(input('createnum'));
    $data['send_start_time']=strtotime(trim(input('send_start_time')));
    $data['send_end_time']=strtotime(trim(input('send_end_time')));
    $data['use_start_time']=strtotime(trim(input('use_start_time')));
    $data['use_end_time']=strtotime(trim(input('use_end_time')));
    $coupon = Coupon::where('id',$id)->update($data);
      if(!$coupon){
   	$this->error('编辑失败');
   	die;
   }else{
      $this->success('编辑成功');
   	die;
   }
	}
	$id = trim(input('id'));
     $coupon = Coupon::where('id',$id)->find();
	return $this->fetch('coupon_list_edit',[
		'coupon'=>$coupon
		]);
}

//用户优惠券
public function coupon_user_list(){
	if(Request::instance()->isPost()){
		$coupon_id = trim(input('coupon_id'));
		if(empty($coupon_id)){
			$this->error('请输入优惠券ID');
			die;
		}
		$couponlist = Couponlist::where('coupon_id',$coupon_id)->paginate(10);
		$count = Couponlist::where('coupon_id',$coupon_id)->count();
		return $this->fetch('coupon_user_list',[
		'couponlist'=>$couponlist,
		'count'=>$count
		]);
	}
		$couponlist = Couponlist::paginate(10);
		$count = Couponlist::count();
		return $this->fetch('coupon_user_list',[
		'couponlist'=>$couponlist,
		'count'=>$count
		]);
}

//添加用户优惠券
public function coupon_user_add(){
	if(Request::instance()->isPost()){
		$coupon_id = trim(input('coupon_id'));
		$user_id = trim(input('user_id'));
		if(empty($coupon_id)||empty($user_id)){
			$this->error('添加异常');
			die;
		}
		$coupon = Coupon::where('id',$coupon_id)->find();
		if(!$coupon){
			$this->error('添加异常');
			die;
		}
     $data['user_id'] = $user_id;
     $data['coupon_id'] = $coupon_id;
     $data['send_time'] = $coupon['send_start_time'];
     $data['use_time'] = $coupon['use_start_time'];
     $data['status']=1;
	 $data['code']=$this->recode(10);
     $couponlist = Couponlist::create($data);
     if(!$couponlist){
     	$this->error('添加失败');
     	die;
     }else{
     	$this->success('添加成功');
     	die;
     }
	}
	$coupon = Coupon::select();
	$user = User::select();
	return $this->fetch('coupon_user_add',[
		'coupon'=>$coupon,
		'user'=>$user
		]);
}



//删除用户优惠券
public function ajax_couponuser_del(){
	$id = trim(input('id'));
	$coupon = Couponlist::where('id',$id)->delete();
	if(!$coupon ){
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

//修改用户优惠券
public function coupon_user_edit(){
	if(Request::instance()->isPost()){
		$id = trim(input('id'));
		$coupon_id = trim(input('coupon_id'));
		$user_id = trim(input('user_id'));
		if(empty($coupon_id)||empty($user_id)){
			$this->error('编辑异常');
			die;
		}
		$coupon = Coupon::where('id',$coupon_id)->find();
		if(!$coupon){
			$this->error('编辑异常');
			die;
		}
     $data['user_id'] = $user_id;
     $data['coupon_id'] = $coupon_id;
     $data['send_time'] = $coupon['send_start_time'];
     $data['use_time'] = $coupon['use_start_time'];
     $data['status']=1;
	// $data['code']=$this->recode(10);
     $couponlist = Couponlist::where('id',$id)->update($data);
     // var_dump(Couponlist::getlastsql());
     // die;
     if(!$couponlist){
     	$this->error('编辑失败');
     	die;
     }else{
     	$this->success('编辑成功');
     	die;
     }


	}
		$id = trim(input('id'));
		$couponlist = Couponlist::where('id',$id)->find();
		$coupon = Coupon::select();
		$user = User::select();
		return $this->fetch('coupon_user_edit',[
			'coupon'=>$coupon,
			'user'=>$user,
			'couponlist'=>$couponlist
			]);


}

//使得生成的代优惠券码不重复
public function recode($length=10){
	$code = randomkeys($length);
    $coupons = Couponlist::where('code',$code)->find();
	 if($coupons){
     $this->recode($length);
	 }else{
	 	return $code;
	 }

}

public function ajax_serachuser(){
	$user_id = trim(input('user_id'));
   $users = db('user')->where('user_id',$user_id)->find();
   if(!$users){
   	$callback=[
   	'status'=>2,
   	'msg'=>'没有找到此用户'
   	];
   	return json($callback);
   }else{
   	$str = '';
   	$str.= "<option  value=\"".$users['user_id']."\">".$users['user_id']."</option>";
   	$callback=[
   	'status'=>1,
   	'msg'=>'成功',
   	'str'=>$str
   	];
   	return json($callback);
   }
}



}
