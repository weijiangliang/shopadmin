<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\CheckController;
use app\admin\controller\AdminbaseController;
class IndexController extends AdminbaseController
{
    public function index()
    {
      return $this->fetch('index');
    }

 public function welcome()
    {
      // //获取ip
      $data['ip']=$_SERVER['REMOTE_ADDR']; 
      // //域名
      $data['DNS']= $_SERVER['HTTP_HOST'];
      $data['duankou']=$_SERVER["SERVER_PORT"];
      $data['time']=time();
      $data['dir']=__DIR__; 
// //获取域名或主机地址
// echo $_SERVER['HTTP_HOST']."<br />";
// //获取网页地址
// echo $_SERVER['PHP_SELF']."<br />";
// //获取网址参数
// echo $_SERVER["QUERY_STRING"]."<br />";
// //获取用户代理
// echo $_SERVER['HTTP_REFERER']."<br />";
// //获取完整的url
// echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
// echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
// //包含端口号的完整url
// echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
// //只取路径
// $url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
// echo dirname($url);
//只取路径
//echo $_SERVER["QUERY_STRING"]."<br />";
      return $this->fetch('welcome',[
        'data'=>$data
        ]);
    }
     public function login()
    {
      return $this->fetch('login');
    }
}
