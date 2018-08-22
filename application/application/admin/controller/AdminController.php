<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use app\admin\model\Admin;
use app\admin\model\Role;
use app\admin\model\Auth;
use app\admin\controller\AdminbaseController;

class AdminController extends AdminbaseController
{

//管理员列表
public function admin_list()
{
	if(Request::instance()->isPost()){
		$admin_name= trim(input('admin_name'));
		 $admin = Admin::where('admin_name','like',"%".$admin_name."%")->paginate(10);
	     $count = Admin::where('admin_name','like',"%".$admin_name."%")->count();
	     return $this->fetch('admin_list',[
	  	'admin'=>$admin,
	  	'count'=>$count
	  	]);
		}
	        
	   $admin = Admin::paginate(10);
	   $count = Admin::count();
	   return $this->fetch('admin_list',[
	  	'admin'=>$admin,
	  	'count'=>$count
	  	]);

}
//管理员添加
public function admin_list_add(){
	if(Request::instance()->isPost()){
		$post = input('param.');
		$data['admin_name'] = trim(input('admin_name'));
		$data['admin_password'] = trim(input('admin_password'));
		$data['admin_nickname'] = trim(input('admin_nickname'));
		$data['admin_sex'] = trim(input('admin_sex'));
		$data['admin_email'] = trim(input('admin_email'));

		if(!$data['admin_name']||!$data['admin_password']||!$data['admin_nickname']||!$data['admin_sex']||!$data['admin_email']){
			$this->error('请填写数据');
			die;
		}
		$admin_add = Admin::where('admin_name',$data['admin_name'])->find();
		if($admin_add){
			$this->error('用户名已存在');
			die;
		}
		$data['admin_password'] = admin_pwd($data['admin_password']);
		$admins= Admin::create($data);
		if(!$admins){
			$this->error('添加失败');
			die;
		}else{
			$this->success('添加成功');
		}
   
	}
	return $this->fetch('admin_list_add');
}
//管理员删除
 public function admin_list_del(){
 	$admin_id = input('admin_id');
 	if(!$admin_id){
 		$callback =[
 		'status'=>2,
 		'msg'=>'删除异常'
 		];
 		return json($callback);
 	}
 	$admin = Admin::where('admin_id',$admin_id)->delete();
 	if(!$admin){
 		$callback =[
 		'status'=>2,
 		'msg'=>'删除失败'
 		];
 		return json($callback);

 	}else{
 		$callback =[
 		'status'=>1,
 		'msg'=>'删除成功'
 		];
 		return json($callback);
 	}


 }
 //编辑管理员信息
 public function admin_list_edit(){
 	if(Request::instance()->isPost()){
 		$admin_id = trim(input('admin_id'));
 		$data['admin_name'] = trim(input('admin_name'));
 		$data['admin_password'] = trim(input('admin_password'));
 		$data['admin_nickname'] = trim(input('admin_nickname'));
 		$data['admin_sex'] = trim(input('admin_sex'));
 		$data['admin_email'] = trim(input('admin_email'));
 		if(!$admin_id){
 			$this->error('编辑异常');
 			die;
 		}
 		if(!$data['admin_name']||!$data['admin_password']||!$data['admin_nickname']||!$data['admin_sex']||!$data['admin_email']||!$admin_id){
 			$this->error('数据不能为空');
 			die;
 		}
        $admin = Admin::where('admin_id',$admin_id)->update($data);
        if(!$admin){
        	$this->error('编辑失败');
        	die;
        }else{
        	$this->success('编辑成功');
        	die;
        }
 	}
 	$admin_id = trim(input('admin_id'));
 	  if(!$admin_id){
		$this->error('编辑异常');
		die;
	  }
	 $admin =  Admin::where('admin_id',$admin_id)->find();
	 if(!$admin){
	 	$this->error('编辑异常');
	 	die;
	 }
 	return $this->fetch('admin_list_edit',[
 		'admin'=>$admin
 		]);
 }


//给用户分配角色
public function admin_editrole(){
	if(Request::instance()->isPost()){
		$admin_id = input('admin_id');
	    if(!$admin_id){
		$this->error('编辑异常');
		die;
	  }
		$roles = input('param.');
		$array = [];
		foreach ($roles as  $v) {
			$array=$v;
		}
		$role =  implode(',',$array);
		$data['admin_role_id']=$role;
       $role = Admin::where('admin_id',$admin_id)->update($data);
       if(!$role){
      	 $this->error('编辑角色失败');
      	 die;
       }else{
      	 $this->success('编辑成功');
       }

	}
    $admin_id = input('id');
    if(!$admin_id){
    	$this->error('分配异常');
    	die;
    }
    $admin = Admin::where('admin_id',$admin_id)->find();
     $role_id = explode(',',$admin['admin_role_id']);

 	$roles = Role::select();
	return $this->fetch('admin_editrole',[
		'role_id'=>$role_id,
		'role'=>$roles,
		'admin_id'=>$admin_id
		]);
}



//管理员角色
public function admin_role()
{
   if(Request::instance()->isPost()){
   	$role_name = trim(input('role_name'));
   	$role = Role::where('role_name','like',"%".$role_name."%")->paginate(10);
    $count = Role::where('role_name','like',"%".$role_name."%")->count();
    return $this->fetch('admin_role',[
  	'role'=>$role,
  	'count'=>$count
  	]);

   }
  $role = Role::paginate(10);
  $count = Role::count();
  return $this->fetch('admin_role',[
  	'role'=>$role,
  	'count'=>$count
  	]);

}
//添加角色
public function admin_role_add(){
     if(Request::instance()->isPost()){
       $data['role_name'] = trim(input('role_name'));
       $data['role_desc'] = trim(input('role_desc'));
       if(!$data['role_name']||!$data['role_desc']){
       	$this->error('数据不能为空');
       	die;
       }
       $role = Role::create($data);
       if(!$role){
       	$this->error('添加失败');
       	die;
       }else{
       	$this->success('添加成功');
       }
     }
	 return $this->fetch('admin_role_add');
}


//编辑角色
public function admin_role_edit(){
     if(Request::instance()->isPost()){
     	$role_id = trim(input('role_id'));
       $data['role_name'] = trim(input('role_name'));
       $data['role_desc'] = trim(input('role_desc'));
        if(!$role_id){
		$this->error('编辑异常');
		die;
	  }
       if(!$data['role_name']||!$data['role_desc']){
       	$this->error('数据不能为空');
       	die;
       }
       $role = Role::where('role_id',$role_id)->update($data);
       if(!$role){
       	$this->error('编辑失败');
       	die;
       }else{
       	$this->success('编辑成功');
       }
     }
     $role_id = trim(input('role_id'));
      if(!$role_id){
		$this->error('编辑异常');
		die;
	  }
	  $role = Role::where('role_id',$role_id)->find();
      if(!$role){
		$this->error('编辑异常');
		die;
	  }
	 return $this->fetch('admin_role_edit',[
	 	'role'=>$role
	 	]);
}

//角色删除
public function admin_role_del(){
	$role_id = input('role_id');
 	if(!$role_id){
 		$callback =[
 		'status'=>2,
 		'msg'=>'删除异常'
 		];
 		return json($callback);
 	}
 	$role = Role::where('role_id',$role_id)->delete();
 	if(!$role){
 		$callback =[
 		'status'=>2,
 		'msg'=>'删除失败'
 		];
 		return json($callback);

 	}else{
 		$callback =[
 		'status'=>1,
 		'msg'=>'删除成功'
 		];
 		return json($callback);
 	}

}
	//角色分类
public function admin_cate()
	{

	  return $this->fetch('admin_cate');

	}
	//管理员权限
public function admin_rule()
	{
	if(Request::instance()->isPost()){
		 $menu_name = trim(input('menu_name'));

         $auth = Auth::where('menu_name','like',"%".$menu_name."%")->order('menu_id asc')->paginate(10);
	     $count = Auth::where('menu_name',"%".$menu_name."%")->count();
	     return $this->fetch('admin_rule',[
	  	'count'=>$count,
	  	'auth'=>$auth
	  	]);
		}
	   $auth = Auth::order('menu_id asc')->paginate(10);
	   $count = Auth::count();
	  return $this->fetch('admin_rule',[
	  	'count'=>$count,
	  	'auth'=>$auth
	  	]);

	}



//编辑权限规则
public function admin_rule_edit(){
	$menu_id = trim(input('menu_id'));
	if(!$menu_id){
	  $this->error('编辑异常');
	  die;
	}
	 $planPath = APP_PATH . 'admin/Controller';
            $planList = array();
            $dirRes = opendir($planPath); // 打开控制器目录
            while ($dir = readdir($dirRes)) {
                if (!in_array($dir, array('.', '..', '.svn'))) {
                    $planList[] = basename($dir, 'Controller.php');
                }
            }

    $auth = Auth::where('menu_id',$menu_id)->find();
    if(!$auth){
       $this->error('编辑失败');
       die;
    }
	return $this->fetch('admin_rule_edit',[
		'auth'=>$auth,
		'planList'=>$planList
		]);
}

//权限分配
public function admin_rule_allot(){
	if(Request::instance()->isPost()){
		$role_id = trim(input('role_id'));
		$post = input('param.');
		if(!$post||!$role_id){
			$this->error('权限分配异常');
			die;
		}
		$str = '';
		$str = implode(',',$post['role_permissions']);
     $data['role_permissions']=$str;
    $auth = Role::where('role_id',$role_id)->update($data);
    if(!$auth){
    	$this->error('添加权限失败');
    	die;
    }else{
    	$this->success('权限添加成功');
    }

	}
	$role_id =  trim(input('role_id'));
	$auth = Auth::select();
	return $this->fetch('admin_rule_allot',[
		'role_id'=>$role_id,
		'auth'=>$auth
		]);
}

//添加权限规则
public function admin_rule_add(){
	if(Request::instance()->isPost()){
		$post = input('param.');
		$data['menu_name'] = trim(input('menu_name'));
		$data['menu_controller'] = trim(input('menu_controller'));
		$data['menu_function'] = trim(input('menu_function'));
		$data['menu_description'] = trim(input('menu_description'));
		$data['menu_module'] = trim(input('menu_module'));
       if(!$data['menu_name']||!$data['menu_controller']||!$data['menu_function']||!$data['menu_description']||!$data['menu_module']){
	       	$this->error('数据不能为空');
	       	die;
        }
		$search['menu_module']=$data['menu_module'];
		$search['menu_controller']=$data['menu_controller'];
		$search['menu_function']=$data['menu_function'];
		//判断是否已存在
		$auths = Auth::where($search)->find();
		if($auths ){
    	$this->error('权限规格已存在');
    	die;
        }
            $auth = Auth::create($data);
       if(!$auth){
            $this->error('添加失败');
       	    die;

         }else{
			$this->success('添加成功');
			  die;
            }
	}
	 $planPath = APP_PATH . 'admin/Controller';
            $planList = array();
            $dirRes = opendir($planPath); // 打开控制器目录
            while ($dir = readdir($dirRes)) {
                if (!in_array($dir, array('.', '..', '.svn'))) {
                    $planList[] = basename($dir, 'Controller.php');
                }
            }

	return $this->fetch('admin_rule_add',[
		'planList'=>$planList
		]);
}

//异步通过控制器获取对应方法
 public function ajax_get_action() {
        $control = input('controller');
        $advContrl = get_class_methods("app\\admin\\controller\\" . $control . 'Controller');     
        $baseContrl = $control != 'Adminbase' ? get_class_methods('app\admin\Controller\AdminbaseController') : array();

        $diffArray = array_diff($advContrl, $baseContrl);
        $html = '';
        foreach ($diffArray as $val) {
            $html .= "<option value='" . $val . "'>" . $val . "</option>";
        }
        if(empty($html)){
        	$callback=[
			'status'=>2,
			'msg'=>'方法查询异常'
			];
			return json($callback);
        }else{
        	$callback=[
			'status'=>1,
			'msg'=>'方法查询成功',
			'str'=>$html
			];
			return json($callback);
        }
	
    }
 //删除权限 
 public function ajax_menu_del(){
 	$menu_id = trim(input('menu_id'));
     $auth= Auth::where('menu_id',$menu_id)->delete();
    if(!$auth){
    	$callback = [
    	'status '=>2,
    	'msg'=>'删除失败'
    	];
     return json($callback);
    }else{
        $callback = [
    	'status '=>1,
    	'msg'=>'删除成功'
    	];
     return json($callback);
    }

 }

}
