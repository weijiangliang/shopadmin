<?php
namespace app\admin\controller;
use app\admin\model\Admin;
use app\admin\model\Role;
use app\admin\model\Auth;
use think\Controller;
use think\Session;
use think\Cookie;

/**权限
*
* 
**/

class AdminbaseController extends Controller
{
   //控制器初始化
   public function _initialize()
   {
     // //ip黑名单过滤
     // if(!$this->checkBlackIp($this->request->ip())) {
     // 	//清空session
     // 	if(Session::has('admin')) {
     // 		Session::delete('admin');
     // 	}
     // 	return $this->error('账户异常，已被冻结！','/admin/index');
     // }
     

     // //检查是否登录
     // if(!Session::has('username')) {
     // 	$this->redirect('admin/Login/login');
     // }
     
     //针对方法判断是否有访问权限
     $where['menu_module'] = $this->request->module(); //获取当前模块名称
     $where['menu_controller'] = $this->request->controller(); //获取当前的控制器
     $where['menu_function'] = $this->request->action(); //获取当前方法
     $where['menu_type'] = 1;
     $menu = Auth::where($where)->find(); //根据当前的model/controller/action查询所属的admin_menu（系统菜单表) 
    
     //$menus = AdminRole::where('role_id',Session::get('admin_role_id'))->value('role_permissions');//所在角色的权限
     //运用时
          //$admin  =  Admin::where('admin_name',Session::get('username'))->find();
     //测试时
     $admin  =  Admin::where('admin_name','admin')->find();


     $menus = $admin['admin_role_id'];

     //将得到的菜单id集合转换为数组
    $menus = explode(',',$menus);
    // var_dump($menus);
    // die;
    $str = '';
    foreach ($menus as  $v) {
        $role = Role::where('role_id',$v)->find();
        $roles = $role['role_permissions'];
        $str .=$roles.","; 
        
    }
    $str = substr($str, 0,-1);
    $roles = explode(',',$str);
    $roles = array_unique($roles);
    if($where['menu_controller']!='Index' &&!in_array(4,$menus)) {
     	//没有请求的menu权限
     	if(!in_array($menu['menu_id'],$roles)||empty($menu['menu_id'])) {
           // echo "<script type=\"text/javascript\"> window.opener=null;window.open('','_self');window.close();</script>";
     		return $this->error('权限不足',url('admin/Index/welcome'));
     	}
      }
   }
    /**判断ip是否在黑名单中
     * @param $ip ip
     * @return bool
     */
    public function checkBlackIp($ip)
    {
        $black_ips = AdminConfig::where('con_id', 1)->value('con_black_ip');
        if (!empty($black_ips)) {
            //转化为数组
            $black_ips = explode(',', $black_ips);
            if (in_array($ip, $black_ips)) {
                return false;
            }
        }
        return true;
    }
    //获取当前控制器下所有方法所属的权限
    public function roleid(){
        //针对方法判断是否有访问权限
        $where['menu_module'] = $this->request->module(); //获取当前模块名称
        $where['menu_controller'] = $this->request->controller(); //获取当前的控制器
        $where['menu_function'] = $this->request->action(); //获取当前方法
        $where['menu_type'] = 1;
        $menu = db('admin_menu')->field('menu_id')->where($where)->find(); //根据当前的model/controller/action查询所属的admin_menu（系统菜单表) 
        $menus = db('admin_menu')->field('menu_id,menu_description,menu_module,menu_controller,menu_function')->where('menu_pid',$menu['menu_id'])->where('menu_operation',1)->select(); //查询出当前菜单下所有的操作
        // 定义一个新的数组
        $menuz = array ();
        // 遍历当前数组的所有元素
        foreach ( $menus as $item ) {    
                $menuz[$item['menu_id']] = $item;
        } 
        return $menuz;
    }
    //获取当前用户能访问的当前控制器的操作
    public function roles(){
        $role = Cookie::get('role');
        //用户当前的权限 array(1,2,3)
        $role = explode(',',$role); 
        //当前控制器下的所有操作 array(1,2)
        $roleid = $this->roleid();
        $roles = array();
        if(is_array($roleid)) {
          foreach ( $roleid as $item ) {
            if(in_array($item['menu_id'],$role)) {
              $roles[$item['menu_function']] = $item;
              $roles[$item['menu_function']]['url'] = "/".$item['menu_controller']. "/" .$item['menu_function'];
            }
          }
        } else {
          return false;
        }
        return $roles;
    }
}