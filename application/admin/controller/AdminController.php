<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class AdminController extends Controller
{

//管理员列表
public function admin_list()
{

  return $this->fetch('admin_list');

}
//管理员角色
public function admin_role()
{
  return $this->fetch('admin_role');

}
//角色分类
public function admin_cate()
{

  return $this->fetch('admin_cate');

}
//管理员权限
public function admin_rule()
{

  return $this->fetch('admin_rule');

}


}
