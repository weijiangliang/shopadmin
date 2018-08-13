<?php 
namespace app\admin\controller;
use app\admin\controller\LoginCheck;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class CheckController extends Controller
{
 public function _initialize()
    {
      $this::login();
    }
    public function login(){
    	 if(empty(session('username')))
        {
            $url = url('login/login');
            echo "<script>alert('请登录..');window.top.location.href='$url';</script>";
            exit;
        }
    }
}