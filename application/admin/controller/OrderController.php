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
//会员账户
public function member_account()
{

  return $this->fetch('member_account');

}



}
