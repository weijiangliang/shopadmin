<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use app\admin\controller\AdminbaseController;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class FinanceController extends AdminbaseController
{
	public function finance_list(){
		return $this->fetch('finance_list');
	}



}