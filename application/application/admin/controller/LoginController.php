<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class LoginController extends Controller
{
    public function login()
    {
      if(Request::instance()->isPost()){
        $username = trim(input('admin_name'));
        $password = trim(input('admin_password'));
        // var_dump($password);
        // var_dump($username );
        // die;
        $admin = db('admin')->where('admin_name',$username)->find();
         if(!$admin || $admin['admin_password']!=$password){
           return $this->error('账号或者密码错误',url('admin/login/login'));
         }
         session::set('username',$username);
         return $this->success('登陆成功',url('admin/index/index'));
      }
      return $this->fetch('login');
      

  }


//退出登陆
public function outlogin(){
Session::delete('username');
$this->redirect('admin/Login/login');
}

//切换账号
public function changelogin(){
  return $this->fetch('login');

}










}
