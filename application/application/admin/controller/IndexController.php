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
      return $this->fetch('welcome');
    }
     public function login()
    {
      return $this->fetch('login');
    }
}
