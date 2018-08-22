<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use app\admin\controller\AdminbaseController;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class EchartsController extends AdminbaseController
{
	public function echarts1(){
		return $this->fetch('echarts1');
	}


	public function echarts2(){
		return $this->fetch('echarts2');
	}

	public function echarts3(){
		return $this->fetch('echarts3');
	}

	public function echarts4(){
		return $this->fetch('echarts4');
	}

	public function echarts5(){
		return $this->fetch('echarts5');
	}

	public function echarts6(){
		return $this->fetch('echarts6');
	}

	public function echarts7(){
		return $this->fetch('echarts7');
	}

	public function echarts8(){
		return $this->fetch('echarts8');
	}
}