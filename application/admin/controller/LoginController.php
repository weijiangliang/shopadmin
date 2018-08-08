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
        // $username = trim(input('name'));
        // $password = trim(input('password'));
        // $admin = db('admin_user')->where('name',$username)->find();
        //  if(!$admin || $admin['password']!=$password){
        //    return $this->error('账号或者密码错误',url('admin/login/login'));
        //  }
        //  session::set('username',$username);
         return $this->success('登陆成功',url('admin/index/index'));
      }
    return $this->fetch('login');
      

  }















}
