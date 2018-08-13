<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class OrderController extends Controller
{
//会员列表
public function order_list()
{
	if(Request::instance()->isPost()){
		$order_no = trim(input('order_no'));
		if(!empty($order_no)){
			$orders = db('order')->where('order_no',$order_no)->paginate();
			$count = db('order')->where('order_no',$order_no)->count();
			return $this->fetch('order_list',[
			'count'=>$count,
			'order'=>$orders
			]);
		 }
	}
	$orders = db('order')->paginate(10);
	$count = db('order')->count();
    return $this->fetch('order_list',[
  	'count'=>$count,
  	'order'=>$orders
  	]);

}
//
public function son_order_list()
{
	if(Request::instance()->isPost()){
	$parent_id = trim(input('parent_sn'));
	if(!empty($parent_id)){
    $order_infos = db('order_info')->where('parent_sn',$parent_id)->paginate(10);
	$count = db('order_info')->where('parent_sn',$parent_id)->count();
    return $this->fetch('son_order_list',[
  	'count'=>$count,
  	'order_info'=>$order_infos
  	]);
      }

	}
	$order_infos = db('order_info')->paginate(10);
	$count = db('order_info')->count();
    return $this->fetch('son_order_list',[
  	'count'=>$count,
  	'order_info'=>$order_infos
  	]);

}
//订单商品列表
public function order_goods_list()
{
	if(Request::instance()->isPost()){
	$good_name = trim(input('good_name'));
	  if(!empty($good_name)){
		$order_goods = db('order_goods')->where('good_name','like',"%".$good_name."%")->paginate(10);
		$count = db('order_goods')->where('good_name','like',"%".$good_name."%")->count();
		return $this->fetch('order_goods_list',[
		  	'order_goods'=>$order_goods,
		  	'count'=>$count
		  	]);

	   }
   }

  $order_goods = db('order_goods')->paginate(10);
  $count = db('order_goods')->count();
  return $this->fetch('order_goods_list',[
  	'order_goods'=>$order_goods,
  	'count'=>$count
  	]);

}


//查看订单商品
public function order_view(){

		$id = trim(input('id'));
		if(!$id){
		 $this->error('订单查看异常',url('order/son_order_list'));
		 die;
		}
		$order_goods = db('order_goods')->where('order_info_id',$id)->select();
		$order_info = db('order_info')->where('order_info_id',$id)->find();
		$user_id = $order_info['user_id'];
		$user = db('user')->where('user_id',$user_id)->find();
		$order = db('order')->where('order_id',$order_info['order_id'])->find();
		$shipping = db('shipping')->select();
		if(!$order_goods){
			$this->error('没有订单商品',url('order/son_order_list'));
		 die;
		}
     return $this->fetch('order_view',[
     	'shipping'=>$shipping,
     	'order_goods'=>$order_goods,
     	'order_info'=>$order_info,
     	'user'=>$user,
     	'order'=>$order
     	]);
	}


//会员账户
public function member_account()
{

  return $this->fetch('member_account');

}
//订单物流
public function shipping(){
	if(Request::instance()->isPost()){
     $shipping_id=trim(input('shipping_id'));
     $shipping_num = trim(input('shipping_num'));
     $order_info_id = trim(input('order_info_id'));
     // array(3) { ["user_inof_id"]=> string(1) "2" ["shipping_id"]=> string(1) "1" ["shipping_num"]=> string(9) "456456456" }
    
     if(!$shipping_id||!$shipping_num ||!$order_info_id){
     	$this->error("物流发货异常");
     	die;
     } 
     // var_dump(1111);
     // die;
     $shipping = db('shipping')->where('shipping_id',$shipping_id)->find();
     if(!$shipping){
         $this->error('物流有误');
         die;
     }
     $data['shipping_name']=$shipping['shipping_name'];
     $data['shipping_code']=$shipping['shipping_code'];
     $data['shipping_number']=$shipping_num;
     $data['send_time']=time();
     $data['shipping_status'] = 2;
     $order_info = db('order_info')->where('order_info_id',$order_info_id)->update($data);
     if(!$order_info){
           $this->error('子订单表更新失败');
           die;
     }else{
     	$this->success('发货成功',url('order/son_order_list'));
     	die;
     }

	}
	// $user_inof_id = trim(input('user_info_id'));
	// $shipping = db('shipping')->select();
	// return $this->fetch('shipping',[
	// 	'user_info_id'=>$user_inof_id,
	// 	'shipping'=>$shipping
	// 	]);
}
//删除商品
public function ajaxorder_delgoods(){
	$id = trim(input('id'));
	if(!$id){
		$state = 2;;
		$msg = '删除失败';
	}
	$order_goods = db('order_goods')->where('id',$id)->delete();
	if(!$order_goods){
		$state = 2;;
		$msg = '删除失败';
	}else{
		$state = 1;;
		$msg = '删除成功';
	}
	$callback=[
	'state'=>$state,
	'msg'=>$msg
	];
	return json($callback);
	}

//订单商品编辑
public function order_goods_edit(){
 if(Request::instance()->isPost()){
   $id = trim(input('order_goods_id'));
   $data['good_num'] = trim(input('good_num'));
   $data['final_price'] = trim(input('final_price'));
   
   //$data['admin_user']=session('admin_user');
   if(!$id||!$data['good_num']||! $data['final_price']){
   	$this->error('请输入数据',url('Order/order_goods_list'));
   	die;
   }
    $order_goods= db('order_goods')->where('id',$id)->update($data);
    $data_edit['good_num_after'] = $data['good_num'];
    $data_edit['final_price_after'] =$data['final_price'];
    $data_edit['create_time']=time();
	$data_edit['order_good_id']=$id;
	$data_edit['final_price_ago'] = trim(input('final_price_ago'));
	$data_edit['good_num_ago'] = trim(input('good_num_ago'));
   if(!$order_goods){
   	     $data_edit['status']=2;
        $edit = db('order_goodedit_log')->insert($data_edit);
        $this->error('编辑失败',url('Order/order_goods_list'));
        die;
      }else{
      	 $data_edit['status']=1;
      	 $edit = db('order_goodedit_log')->insert($data_edit);
         $this->success('编辑成功',url('Order/order_goods_list'));
        die;
      }

	}
	$id = trim(input('id'));
	if(!$id){
		$this->error('订单商品编辑异常');
		die;
	}
	$order_goods = db('order_goods')->where('id',$id)->find();
	return $this->fetch('order_goods_edit',[
		'order_goods'=>$order_goods
		]);

}

}
