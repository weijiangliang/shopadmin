<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class UserController extends Controller
{
//会员列表
public function member_list()
{
	$users = db('user')->paginate(10);
	$count = db('user')->count();

  return $this->fetch('member_list',[
  	     'count' =>$count,
  	     'user'=>$users
  	]);

}
//添加会员
public function member_add()
{
	if(Request::instance()->isPost()){
		$data = input('param.');
		var_dump($data);
		die;

	}

  return $this->fetch('member_add');

}
//会员等级
public function member_grade()
{
	$levels = db('user_level')->paginate(10);
	$count = db('user_level')->count();

  return $this->fetch('member_grade',[
  	'count'=>$count,
  	'level'=>$levels
  	]);

}
//会员等级修改member_editlevel
public function member_editlevel(){
  if(Request::instance()->isPost()){
		$level_id =trim(input('level_id'));
		$level_name =trim(input('level_name'));
		$describe =trim(input('describe'));
	 if(empty($level_id)||empty($level_name)||empty($describe)){
		$this->error('修改异常');
		}
       $data['level_name']=$level_name;
       $data['describe']=$describe;
	$level = db('user_level')->where('level_id',$level_id)->update($data);
	if($level){
		$this->success('编辑成功',url('admin/User/member_list'));
		die;

	}else{
		$this->error('编辑失败',url('admin/User/member_list'));
			die;
	  }
	}
	$level_id =trim(input('id'));
	 if(!$level_id){
		$this->error('修改异常');
		}
		$level = db('user_level')->where('level_id',$level_id)->find();
	return $this->fetch('member_grade_edit',[
		'level'=>$level
		]);
	
}

//会员收货地址
public function member_address(){
	$user_addr = db('user_address')->paginate(10);
	$count = db('user_address')->count();
	return $this->fetch('member_address',[
		'address'=>$user_addr,
		'count'=>$count
		]);

}

//增加收货地址
public function member_address_add(){
		if(Request::instance()->isPost()){
		 $data['user_id'] =trim(input('user_id'));
		 $data['name'] =trim(input('name'));
		 $data['id_card'] =trim(input('id_card'));
		 $data['phone'] =trim(input('phone'));
		 $data['address'] =trim(input('address'));
	  if(!$data['user_id']||empty($data['name'] )||empty($data['id_card'])||empty($data['phone'])||empty($data['address'])){
	  	$this->error('数据不能为空',url('admin/User/member_address'));
	  	die;
	  }
	  $user = db('user')->where('user_id',$data['user_id'])->find();
	  if(!$user){
	  	$this->error('用户id异常',url('admin/User/member_address'));
	  	die;
	  }
	  $address = db('user_address')->insert($data);
	  if($address){
	  	$this->success('地址添加成功',url('admin/User/member_address'));
	  	die;
	  }else{
	  	$this->error('地址添加失败',url('admin/User/member_address'));
	  	die;
	   }

	}
	return $this->fetch('member_address_add');

}

//地址编辑
public function member_address_edit(){
	if(Request::instance()->isPost()){
		 $addr_id =trim(input('id'));
		 $data['name'] =trim(input('name'));
		 $data['id_card'] =trim(input('id_card'));
		 $data['phone'] =trim(input('phone'));
		 $data['address'] =trim(input('address'));
	  if(!$addr_id||empty($data['name'] )||empty($data['id_card'])||empty($data['phone'])||empty($data['address'])){
	  	$this->error('数据不能为空');
	  	die;
	  }
    $addrs = db('user_address')->where('id',$addr_id)->update($data);
    if(!$addrs){
    	$this->error('编辑失败',url('admin/User/member_address'));
    	die;
    }else{
        $this->success('编辑成功',url('admin/User/member_address'));
    	die;
    }


	}
	$addr_id = trim(input('id'));
	if(!$addr_id){
		$this->error('编辑异常',url('admin/User/member_address'));
	}
	$addr = db('user_address')->where('id',$addr_id)->find();
	if(!$addr){
		$this->error('编辑异常',url('admin/User/member_address'));
		die;
	}
	return $this->fetch('member_address_edit',[
		'address'=>$addr
		]);
}

//地址删除
public function member_address_del(){
	$addr_id = trim(input('id'));

	if(!$addr_id){
		$this->error('删除异常',url('admin/User/member_address'));
		die;
	}
	$addr = db('user_address')->where('id',$addr_id)->delete();
	if(!$addr){
      $this->error('删除异常',url('admin/User/member_address'));
      die;
	}else{
      $this->success('删除成功',url('admin/User/member_address'));
      die;
	}
 
}



//会员等级添加
public function member_grade_add(){
	if(Request::instance()->isPost()){
		$level_name = trim(input('level_name'));
		$describe =trim(input('describe')); 
		if(empty($level_name)||empty($describe)){
			$this->error('数据不能为空');
		}
		$data['level_name']=$level_name;
		$data['describe']=$describe;
		$level = db('user_level')->insert($data);
		if($level){
			$this->success('等级添加成功');
		}else{
			$this->success('等级添加失败');
		}
	}
	return $this->fetch('member_grade_add');

  }
//会员账户
public function member_account()
{
	if(Request::instance()->isPost()){
		$user_id = input('user_id');
		$num = input('num');
		$desc = input('desc');
		if(empty($user_id)||empty($num)||empty($desc)){
			$this->error('填写数据不能为空');
			die;
		}
		$user = db('user')->where('user_id',$user_id)->find();
		if(!$user){
			$this->error('用户id错误');
			die;
		}
        $data['banlance']=$user['banlance'] + $num;
        $users = db('user')->where('user_id',$user_id)->update($data);
        if(!$users){
        	$status = 2;
        }else{
        	$status = 1;
        	$money_change['status']=$status;
        	$money_change['desc']=$desc;
        	$money_change['user_id']=$user_id;
        	$money_change['admin_name']=111;
        	$money_change['add_time']=date('Y-m-d H:i:s',time());
        	$money_change['money_num']=$num;
        	$money_change['desc']=$desc;
        	$log = db('moneychange_log')->insert($money_change);
        	if($log){
        		$this->success('变动成功');

        	}else{
        		$this->error('变动失败');
        	}
        }



	}

  return $this->fetch('member_account');

}
//修改用户状态
public function user_status()
{
	$user_sattus = trim(input('user_status'));
	$id = trim(input('id'));
	if(empty($user_sattus)||empty($id)){
		$this->error('状态修改异常');
	}
	if($user_sattus==1){
		$status['user_status']=2;
		$user = db('user')->where('id',$id)->update($status);
		if($user){
			$this->success('修改成功');
			die;
		}else{
			$this->error('修改失败');
			die;
		}

	}
	if($user_sattus==2){
		$status['user_status']=1;
		$user = db('user')->where('id',$id)->update($status);
		if($user){
			$this->success('修改成功');
			die;
		}else{
			$this->error('修改失败');
			die;
		}

	}

}



}
