<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use app\admin\controller\AdminbaseController;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use app\admin\model\Activity;
use app\admin\model\Activitygoods;
class ActiveController extends AdminbaseController
{
   
  public function activity_list(){
  	if(Request::instance()->isPost()){
  		$title = trim(input('title'));
  		// var_dump($title);
  		// die;
  		$active = Activity::where('title','like',"%".$title."%")->paginate(10);
		$count = Activity::where('title','like',"%".$title."%")->count();
		return $this->fetch('activity_list',[
  		'count'=>$count,
  		'active'=>$active
  		]);
  	}
  $active = Activity::paginate(10);
  $count = Activity::count();
  	return $this->fetch('activity_list',[
  		'count'=>$count,
  		'active'=>$active
  		]);
  }

//活动添加
public function activity_list_add(){
	if(Request::instance()->isPost()){
		// var_dump(input('param.'));
		// die;
		$file =  request()->file('thumb');
		$data['title'] = trim(input('title'));
		$data['start_time'] = strtotime(trim(input('start_time')));
		$data['end_time'] = strtotime(trim(input('end_time')));
		$data['add_time']=time();
		if(!$data['title']||!$data['start_time']||!$data['end_time']){
			$this ->error('请输入数据');
			die;
		}
		//获取操作人
		//$admin_name = session::get('username');
		//$data['admin_id']=db('admin')->where('admin_name',$admin_name)->field('admin_id')->find();
        if($file){
        $dataimg = $this->upload($file);
            if($dataimg['statu']==0){
              $this->error($dataimg['msg']);
              die;
            }else{
              $data['thumb']=$dataimg['imgurl'];
            }
        }
	    $active = Activity::create($data);
	    if(!$active){
	    	$this->error('添加失败');
	    	die;
	    }else{
	    	$this->success('添加成功');
	    }

		}
	return $this->fetch('activity_list_add');
}

//活动编辑
public function activity_list_edit(){
	if(Request::instance()->isPost()){
		$id = trim(input('id'));
		$file =  request()->file('thumb');
		$data['title'] = trim(input('title'));
		$data['start_time'] = strtotime(trim(input('start_time')));
		$data['end_time'] = strtotime(trim(input('end_time')));
		$data['add_time']=time();
		if(!$data['title']||!$data['start_time']||!$data['end_time']){
			$this ->error('请输入数据');
			die;
		}
		//获取操作人
		//$admin_name = session::get('username');
		//$data['admin_id']=db('admin')->where('admin_name',$admin_name)->field('admin_id')->find();
        if($file){
        $dataimg = $this->upload($file);
            if($dataimg['statu']==0){
              $this->error($dataimg['msg']);
              die;
            }else{
              $data['thumb']=$dataimg['imgurl'];
            }
        }
	    $active = Activity::where('id',$id)->update($data);
	    if(!$active){
	    	$this->error('编辑失败');
	    	die;
	    }else{
	    	$this->success('编辑成功');
	    }
	}
    $id = trim(input('id'));
    $active = Activity::where('id',$id)->find();
    if(!$active){
    	$this->error('编辑失败');
    	die;
    }
	return $this->fetch('activity_list_edit',[
		'active'=>$active
		]);
}

//删除活动
public function ajax_active_del(){
  $id = trim(input('id'));
  $active = Activity::where('id',$id)->delete();
  if(!$active){
  	$callback=[
  	'status'=>2,
  	'msg'=>'删除失败'
  	];
return json($callback);
  }else{
  	$callback=[
  	'status'=>1,
  	'msg'=>'删除成功'
  	];
return json($callback);
  }

}

public function gift_list(){
  	if(Request::instance()->isPost()){
  		
  		$good_name = trim(input('good_name'));
  		$goods = Activitygoods::where('good_name','like',"%".$good_name."%")->paginate(10);
	  	$count = Activitygoods::where('good_name','like',"%".$good_name."%")->count();
	  	// var_dump(Activitygoods::getlastsql());
	  	// die;
	  	return $this->fetch('gift_list',[
  		'count'=>$count,
  		'goods'=>$goods
  		]);
  	}
  	$goods = Activitygoods::paginate(10);
  	$count = Activitygoods::count();
  	return $this->fetch('gift_list',[
  		'count'=>$count,
  		'goods'=>$goods
  		]);
  }

//添加活动商品
public function gift_list_add(){
	if(Request::instance()->isPost()){
		$activity_id = trim(input('activity_id'));
		$good_id = trim(input('good_id'));
		$activity_price = trim(input('activity_price'));
		$vip_activity_price = trim(input('vip_activity_price'));
		if(!$activity_id||!$good_id||!$activity_price||!$vip_activity_price){
            $this->error('请填写数据');
            die;
		}
		$goods = db('goods')->where('good_id',$good_id)->find();
		if(!$goods){
			$this->error('商品获取异常，请选择其他商品');
            die;
		}
		$data['good_sn']=$goods['good_sn'];
		$data['good_name']=$goods['good_name'];
		$data['good_id']=$good_id;
		$data['activity_id']=$activity_id;
		$data['activity_price']=$activity_price;
		$data['vip_activity_price']=$vip_activity_price;
		$data['add_time']=time();
		$activegood = Activitygoods::create($data);
		if(!$activegood){
			$this->error('添加活动商品失败，请重新添加');
			die;
		}else{
			$this->success('添加成功');
		}

	}
	$active = Activity::select();
	$goods = db('goods')->select();
	return $this->fetch('gift_list_add',[
		'active'=>$active,
		'goods'=>$goods
		]);
}


//删除活动商品
public function ajax_activegood_del(){
	$id = trim(input('id'));
  $active = Activitygoods::where('id',$id)->delete();
  if(!$active){
  	$callback=[
  	'status'=>2,
  	'msg'=>'删除失败'
  	];
return json($callback);
  }else{
  	$callback=[
  	'status'=>1,
  	'msg'=>'删除成功'
  	];
return json($callback);
  }
}
//编辑活动商品
public function gift_list_edit(){
	if(Request::instance()->isPost()){
		$id = trim(input('id'));
		$activity_id = trim(input('activity_id'));
		$good_id = trim(input('good_id'));
		$activity_price = trim(input('activity_price'));
		$vip_activity_price = trim(input('vip_activity_price'));
		if(!$activity_id||!$good_id||!$activity_price||!$vip_activity_price){
            $this->error('请填写数据');
            die;
		}
		$goods = db('goods')->where('good_id',$good_id)->find();
		if(!$goods){
			$this->error('商品获取异常，请选择其他商品');
            die;
		}
		$data['good_sn']=$goods['good_sn'];
		$data['good_name']=$goods['good_name'];
		$data['good_id']=$good_id;
		$data['activity_id']=$activity_id;
		$data['activity_price']=$activity_price;
		$data['vip_activity_price']=$vip_activity_price;
		$activegood = Activitygoods::where('id',$id)->update($data);
		if(!$activegood){
			$this->error('活动商品编辑失败');
			die;
		}else{
			$this->success('编辑成功');
		}

	}
	$id= trim(input('id'));
	$activegoods = Activitygoods::where('id',$id)->find();
	$goods = db('goods')->select();
	$active = Activity::select();
	return $this->fetch('gift_list_edit',[
		'activegoods'=>$activegoods,
		'goods'=>$goods,
		'active'=>$active
		]);

}

//活动商品添加
 public function ajax_serachgoods(){
   $good_name = trim(input('goods_name'));
   $goods = db('goods')->where('good_name','like',"%".$good_name."%")->select();
   if(!$goods){
   	$callback=[
   	'status'=>2,
   	'msg'=>'没有找到此商品'
   	];
   	return json($callback);
   }else{
   	$str = '';
   	foreach ( $goods  as  $v) {
   		$str.= "<option  value=\"".$v['good_id']."\">".$v['good_name']."</option>";
   	}
   	$callback=[
   	'status'=>1,
   	'msg'=>'成功',
   	'str'=>$str
   	];
   	return json($callback);
   }

 }




//上传图片
public function upload($file){
   if($file){
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
             $imgurl =  $info->getSaveName();
             $callback=array(
            'statu' =>1,
            'imgurl' => $imgurl
            );
            return $callback;
        }else{
            $msg=$file->getError();
            $callback=array(
            'statu' => 0,
            'msg' => $msg
            );
            return $callback;
        }
    }
}
}
