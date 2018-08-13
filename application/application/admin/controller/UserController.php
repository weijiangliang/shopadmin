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
	if(Request::instance()->isPost()){
      $user_id = trim(input('user_id'));
      $users=db('user')->where('user_id',$user_id)->where('auth_status',2)->paginate();
      $count = db('user')->where('user_id',$user_id)->where('auth_status',2)->count();
      return $this->fetch('member_list',[
  	     'count' =>$count,
  	     'user'=>$users
  	]);
	}
	$users = db('user')->where('auth_status',2)->paginate(10);
	$count = db('user')->where('auth_status',2)->count();

  return $this->fetch('member_list',[
  	     'count' =>$count,
  	     'user'=>$users
  	]);

}

//删除会员
public function member_del(){
	$id = trim(input('id'));
	if(!$id){
       $this->error('删除异常',url('admin/User/member_list'));
	}
	$user = db('user')->where('id',$id)->delete();
	if(!$user){
		 $this->error('删除失败',url('admin/User/member_list'));
         die;
	}
	else{
		$this->success('删除成功',url('admin/User/member_list'));
         die;
	}

}

//编辑会员信息
public function member_edit(){
	if(Request::instance()->isPost()){
		$id = trim(input('id'));
		$data['nickname'] = trim(input('nickname'));
		$data['sex'] = trim(input('sex'));
		$data['user_role'] = trim(input('user_role'));
		$data['pay_password'] = trim(input('pay_password'));
		$data['birthday'] = trim(input('birthday'));
		if(!$data['nickname'] || !$data['user_role']|| !$data['sex'] || !$data['pay_password']|| !$data['birthday'] ||!$id){
			$this->error('数据异常');
			die;
		}
   $user = db('user')->where('id',$id)->update($data);
        if($user===0){
        	$this->error('编辑失败');
        	die;
         }else{
          $this->success('修改成功');
        	die;
         }

	}
	$id = trim(input('id'));
	$user = db('user')->where('id',$id)->find();
	$level = db('user_level')->select();
	return $this->fetch('member_edit',[
		'user'=>$user,
		'level'=>$level
		]);

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

// //编辑收获地址
// public function member_address_edit(){

// }

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

//审核列表
public function exam_list(){
	if(Request::instance()->isPost()){
	$user_id = trim(input('user_id'));
	$auth = db('user_authentication')->where('user_id',$user_id)->paginate();
	$count = db('user_authentication')->where('user_id',$user_id)->count();
	return $this->fetch('exam_list',[
		'auth'=>$auth,
		'count'=>$count
		]);
	}
	$auth = db('user_authentication')->paginate(10);
	$count = db('user_authentication')->count();
	return $this->fetch('exam_list',[
		'auth'=>$auth,
		'count'=>$count
		]);


}

//确定审核
public function exam_list_add(){
	$id = trim(input('id'));
	if(!$id){
$this->error('审核异常');
die;
	}
	$auth = db('user_authentication')->where('id',$id)->find();
	return $this->fetch('exam_list_add',[
		'auth'=>$auth
		]);


}

//修改认证信息
public function exam_list_edit(){
	return $this->fetch('exam_list_edit');


}

    //审核通过
	public function pass_exam(){
			$id = trim(input('id'));
			$user_id = trim(input('user_id'));
			if(!$id||!$user_id){
				$this->error('审核异常');
				die;
			}
			$data['auth_status']=2;
			$auth = db('user_authentication')->where('id',$id)->update($data);
			if($auth===false){
				$this->error('审核失败',url('admin/User/exam_list'));
			}else{
				$user_data['auth_status']=2;
				$user = db('user')->where('user_id',$user_id)->update($user_data);
				if($user===false){
			      $this->error('认证异常');
			      die;
				}
				$this->success('审核成功',url('admin/User/exam_list'));
			}
	}

 //审核未通过
 public function nopass_exam(){
 	if(Request::instance()->isPost()){
	   $id = trim(input('id','','intval'));
	   $user_id = trim(input('user_id'));
	   $cause = trim(input('cause'));
	   if($cause==''){
         $this->error('请输入数据');
         die;
	   }
	   if(!$id||!$user_id){
	   	$this->error('认证异常');
	   	die;
	   }
	   $data['auth_status'] = 3;
      $auth = db('user_authentication')->where('id',$id)->update($data);
      if($auth===false){
      	$this->error('认证异常1');
      }else{
      	$user_data['auth_status']=1;
        $user = db('user')->where('user_id',$user_id)->update($user_data);
      	if(!$user){
         $this->error('认证异常2');
      	}else{
      		$this->success('审核成功');
      	}
      }

 	}

 	$id = trim(input('id'));
	$user_id = trim(input('user_id'));
	// var_dump($user_id);
 //      	die;
	return $this->fetch('nopass_exam',[
        'id'=>$id,
        'user_id'=>$user_id
		]);
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
		$type = input('type');
		if(empty($user_id)||empty($desc)||empty($type)){
			$this->error('填写数据不能为空');
			die;
		}
		if($num<0){
			$this->error('金额数据错误');
			die;
		}
		$user = db('user')->where('user_id',$user_id)->find();
		if(!$user){
			$this->error('用户id错误');
			die;
		}
       if($type==1){
        $data['banlance']=$user['banlance'] + $num;
        $users = db('user')->where('user_id',$user_id)->update($data);
        $msg = '充值成功';
       }else{
         $data['banlance']=$user['banlance'] - $num;
        $users = db('user')->where('user_id',$user_id)->update($data);
        $msg = '扣除成功';
       }
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
        		$this->success($msg);

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
