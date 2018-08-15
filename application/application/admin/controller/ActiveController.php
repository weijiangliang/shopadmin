<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use app\admin\controller\AdminbaseController;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class ActiveController extends AdminbaseController
{
   
  public function activity_list(){
  	return $this->fetch('activity_list');
  }
  
  public function gift_list(){
  	return $this->fetch('gift_list');
  }

}
