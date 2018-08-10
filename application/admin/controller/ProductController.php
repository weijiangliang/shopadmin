<?php
namespace app\admin\controller;
use app\admin\controller\CheckController;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
class ProductController extends Controller
{
    public function product_attribute()
    {
      if(Request::instance()->isPost()){
        if(empty(input('attribute'))){
          $this->error('请输入商品属性名称',url('admin/product/product_attribute'));
          die;
        }
        $attr_name = trim(input('attribute'));
        $types = db('goods_type')->select();
        $attributes = db('goods_attribute')->where('attr_name','like',"%".$attr_name."%")->paginate(10);
        $count = db('goods_attribute')->where('attr_name','like',"%".$attr_name."%")->count();
        return $this->fetch('product_attribute',[
        'attr'=>$attributes,
        'type'=>$types,
        'count'=>$count
        ]);
      }
       $types = db('goods_type')->select();
       $attributes = db('goods_attribute')->paginate(10);
       $count = db('goods_attribute')->count();
       return $this->fetch('product_attribute',[
        'attr'=>$attributes,
        'type'=>$types,
        'count'=>$count
        ]);
    }
    public function product_attribute_add()
    {
       if(Request::instance()->isPost()){
         $data['attr_name']=input('name');
         $data['indx']=input('indx');
         $data['luru']=input('luru');
         $data['attr_values']=input('attr_value');
         $data['sort']=input('sort');
         $data['type_id']=input('type_id');
         $attr = db('goods_attribute')->insert($data);
         if($attr){
          $this->success('添加成功1',url('admin/product/product_attribute'));
         }else{
           $this->error('添加失败',url('admin/product/product_attribute'));
         }
       }
       $type= db('goods_type')->select();
      return $this->fetch('product_attribute_add',[
        'type'=>$type
        ]);
    }
//删除属性
public function product_attribute_del(){
       $attr_id = trim(input('id'));
      if(!$attr_id){
        $this->error('编辑异常',url('admin/product/product_attribute'));
      }  
      $attr = db('goods_attribute')->where('attr_id',$attr_id)->delete();
      if($attr){
        $this->success('删除成功',url('admin/product/product_attribute'));

      }else{
        $this->error('删除失败',url('admin/product/product_attribute'));
      }

}


public function product_brand()
    {
      if(Request::instance()->isPost()){
        if(empty(input('product_brand_name'))){
          $this->error('请输入品牌名称',url('admin/product/product_brand'));
          die;
        }
        $brand_name = trim(input('product_brand_name'));
        $brands = db('brand')->where('brand_name','like',"%".$brand_name."%")->paginate(10);
        $count = db('brand')->where('brand_name','like',"%".$brand_name."%")->count();

        return $this->fetch('product_brand',[
        'brand'=>$brands,
        'count'=>$count

        ]);


      }
      $brands = db('brand')->paginate(10);
      $count = db('brand')->count();
      return $this->fetch('product_brand',[
        'brand'=>$brands,
        'count'=>$count

        ]);
    }

 public function product_brand_add()
    {
      if(Request::instance()->isPost()){
        $file =  request()->file('brand_logo');
        $data['brand_name']=trim(input('brand_name'));
        $data['url']=input('url');
        $data['parent_cate_id']=trim(input('parent_cate_id'));
        $data['cate_id']=trim(input('cate_id'));
        $data['is_hot']=trim(input('is_hot'));
        $data['desc']=trim(input('desc'));
        $data['sort']=trim(input('sort'));
        if($file){
          $dataimg = $this->upload($file);
            if($dataimg['statu']==0){
              $this->error($dataimg['msg']);
              die;
            }else{
              $data['brand_logo']=$dataimg['imgurl'];
            }
        }
     $brand = db('brand')->insert($data);
     if($brand){
      $this->success('添加成功',url('admin/product/product_brand'));
     }else{
      $this->error('添加成功');
     }

      }
       $cate = db('goods_category')->select();
      return $this->fetch('product_brand_add',[
        'cate'=>$cate
        ]);
    }



 public function product_brand_edit()
    {
      if(Request::instance()->isPost()){
        $brand_id = trim(input('brand_id'));
        $file =  request()->file('brand_logo');
        $data['brand_name']=trim(input('brand_name'));
        $data['url']=input('url');
        $data['parent_cate_id']=trim(input('parent_cate_id'));
        $data['cate_id']=trim(input('cate_id'));
        $data['is_hot']=trim(input('is_hot'));
        $data['desc']=trim(input('desc'));
        $data['sort']=trim(input('sort'));
        if($file){
          $dataimg = $this->upload($file);
            if($dataimg['statu']==0){
              $this->error($dataimg['msg']);
              die;
            }else{
              $data['brand_logo']=$dataimg['imgurl'];
            }
        }
       $brandup = db('brand')->where('id',$brand_id)->update($data);
       if($brandup){
        $this->success('修改成功',url('admin/product/product_brand'));

       }else{
         $this->error('修改失败',url('admin/product/product_brand'));
       }

      }
      $brand_id = trim(input('id'));
      if(!$brand_id){
        $this->error('删除异常',url('admin/product/product_brand'));
      }

      $brand = db('brand')->where('id',$brand_id)->find();
      $cate = db('goods_category')->select();
      return $this->fetch('product_brand_edit',[
        'brand'=>$brand,
        'cate'=>$cate

      ]);
    }
public function product_brand_del()
    {
      $brand_id = trim(input('id'));
      if(!$brand_id){
        $this->error('删除异常',url('admin/product/product_brand'));

      }
      $brand = db('brand')->where('id',$brand_id)->delete();
      if($brand){
        $this->success('删除成功',url('admin/product/product_brand'));
      }else{
        $this->error('删除失败',url('admin/product/product_brand'));
      }
      


    }
     public function product_category()
    {
      if(Request::instance()->isPost()){
        if(empty(input('product_cate_name'))){
          $this->error('请输入商品属性名称',url('admin/product/product_category'));
          die;
        }
        $product_cate_name = trim(input('product_cate_name'));
       $categorys = db('goods_category')->where('name','like',"%".$product_cate_name."%")->paginate(10);
       $count = db('goods_category')->where('name','like',"%".$product_cate_name."%")->count();
         return $this->fetch('product_category',[
        'cate'=>$categorys
        ]);
       }
      $categorys = db('goods_category')->paginate(10);
      $count = db('goods_category')->count();
      return $this->fetch('product_category',[
        'cate'=>$categorys,
        'count'=>$count
        ]);
    }
 public function product_category_add()
    { 
      if(Request::instance()->isPost()){
        // var_dump(input('param.'));
        // die;
       $file =  request()->file('thumb');
       $data['mobile_name']=trim(input('mobile_name'));
       $data['name']=trim(input('name'));
       $data['parent_id']=trim(input('parent_id'));
       $data['cat_group']=trim(input('cate_group'));
       $data['sort_order']=trim(input('sort'));
       $data['is_show']=trim(input('is_show'));
       $data['is_hot']=trim(input('is_hot'));
       $data['tag']=trim(input('tag'));
       if(!$file||!$data['mobile_name']||!$data['parent_id']||!$data['sort_order']){
     $this->error('所有数据不能为空');
       }
       if($file){
          $dataimg = $this->upload($file);
            if($dataimg['statu']==0){
              $this->error($dataimg['msg']);
              die;
            }else{
              $data['thumb']=$dataimg['imgurl'];
            }
        }
         $cate_id = db('goods_category')->insertGetId($data);
         $parent = db('goods_category')->where('id',$data['parent_id'])->find();
         $path = $parent['parent_id_path'];
         $dataup['level'] = count(explode('-',$path));
         $dataup['parent_id_path'] = $parent['parent_id_path']."-".$cate_id;
         $cate_up = db('goods_category')->where('id',$cate_id)->update($dataup);
         if($cate_id && $cate_up){
          $this->success('添加成功',url('admin/product/product_category'));
         }else{
          $this->error('添加失败',url('admin/product/product_category'));
         }
       }
      $cates = db('goods_category')->where('level',"<",4)->select();
      $specs = db('spec')->order('sort  desc')->select();
      return $this->fetch('product_category_add',[
        'spec'=>$specs,
        'cate'=>$cates

        ]);
    }

 public function product_category_edit()
    {
      return $this->fetch('product_category_edit');
    } 


    public function product_guige()
    {
      if(Request::instance()->isPost())
      {
         if(empty(input('product_guige_name'))){
          $this->error('请输入商品规格名称',url('admin/product/product_guige'));
          die;
        }
        $guige_name = trim(input('product_guige_name'));
        $specs = db('spec')->where('name','like',"%".$guige_name."%")->paginate(10);
        $count = db('spec')->where('name','like',"%".$guige_name."%")->count();
        $spec_item  = db('spec_item')->select();
        $types = db('goods_type')->select();
      return $this->fetch('product_guige',[
        'spec'=>$specs,
        'count'=>$count,
        'spec_item'=>$spec_item,
        'type'=>$types
        ]);

      }
      $specs = db('spec')->paginate(10);
      $count = db('spec')->count();
      $spec_item  = db('spec_item')->select();
      $types = db('goods_type')->select();
      return $this->fetch('product_guige',[
        'spec'=>$specs,
        'count'=>$count,
        'spec_item'=>$spec_item,
        'type'=>$types
        ]);
    }

//添加商品联动分类表
public function ajax_productcate(){
     $str = '';
     $parent_id =trim(input('parent_id'));

     if(!$parent_id){
        $statu = 2;
        $msg = '获取分类异常';
        $str = '';
         $callback=[
       'statu'=>$statu,
       'msg'=>$msg,
       'str'=>$str
       ];
return json($callback);
        die;
      }
       $categorys = db('goods_category')->where('parent_id',$parent_id)->select();
       if(!$categorys||count($categorys)<=0){
        $statu = 2;
        $msg = '获取分类异常';
        $str = '';
         $callback=[
       'statu'=>$statu,
       'msg'=>$msg,
       'str'=>$str
       ];
return json($callback);
        die;
       }else{
        $statu = 1;
        $msg="获取成功";
        foreach ($categorys as  $v) {
          $str .=" <option value='".$v['id']."'>".$v['name']."</option>";
         }
       
       $callback=[
       'statu'=>$statu,
       'msg'=>$msg,
       'str'=>$str
       ];
return json($callback);
}
}
//获取第三季分类
public function ajax_productcatethree(){

}


//增加规格
 public function product_guige_add()
    {

      if(Request::instance()->isPost()){
       $statu = 1;
       $data['type_id']=input('type_id');
       $data['name'] = input('spec_name');
       $data['sort'] = input('sort');
       $item =trim(input('spec_item'));
       $items = explode(',', $item);
       $spec = db('spec')->insertGetId($data);
       foreach ($items as  $value) {
        $spec_item =array();
          $spec_item['spec_id']=$spec;
          $spec_item['item']=$value;
          $spec_item = db('spec_item')->insert($spec_item);
          if(!$spec_item){
            $statu = 0;
            }
          }
          if($spec && $statu==1){
            $this->success('操作成功');
          }else{
            $this->error('操作成功');
          }


      }else{
    $specs = db('goods_type')->select();
    return $this->fetch('product_guige_add',[
    'type'=>$specs

    ]);
      }
    }


//分类一部获取
public function ajax_category(){
  if(Request::instance()->isPost()){
    $parent_id = input('parent_id');
    if(!$parent_id){
    return false;
    }
    $cate = db('goods_category')->where('parent_id',$parent_id)->select();
    if(!$cate){
      return false;
    }
    // foreach ($cate  as $k => $v) {
    //    $data[$v['id']]=$v['name'];
    // }
    return json($cate);
  }


}

 public function product_guige_edit()
    {
      if(Request::instance()->isPost()){
      $statu = 1;
      $spec_id = input('spec_id');
       $data['type_id']=input('type_id');
       $data['name'] = input('spec_name');
       $data['sort'] = input('sort');
       $item =trim(input('spec_item'));
       $items = explode(',', $item);
       $spec = db('spec')->where('spec_id',$spec_id)->update($data);
       db('spec_item')->where('spec_id',$spec_id)->delete();
       foreach ($items as  $value) {
        $spec_item =array();
          $spec_item['spec_id']=$spec_id ;
          $spec_item['item']=$value;
          $spec_item = db('spec_item')->insert($spec_item);
          if(!$spec_item){
            $statu = 0;
            }
          }
          if($spec && $statu==1){
            $this->success('修改成功',url('admin/product/product_guige'));
          }else{
            $this->error('修改失败',url('admin/product/product_guige'));
          }

      }
      $spec_id = trim(input('id'));
      if(!$spec_id){
        $this->error('编辑异常');
      }
      $specs = db('spec')->where('spec_id',$spec_id)->find();
      $type = db('goods_type')->select();
      $spec_item = db('spec_item')->where('spec_id',$spec_id)->select();
      //var_dump($spec_item);
      $str = '';
      foreach ($spec_item as $value) {
        $str .= $value['item'].",";
      }
      $str = substr($str,0,-1);
      return $this->fetch('product_guige_edit',[
         'spec'=>$specs,
         'str'=>$str,
         'type'=>$type

        ]);
    }
 public function product_guige_del()
    {
       $spec_id = trim(input('id'));

       if(!$spec_id){
        $this->error('非法删除，删除失败');
        die;
       }
       $spec = db('spec')->where('spec_id',$spec_id)->delete();
       if($spec){
          db('spec_item')->where('spec_id',$spec_id)->delete();
           $this->success('删除成功');
       }else{
           $this->error('删除失败');
       }

    }
public function product_list()
    { 
      if(Request::instance()->isPost())
      {
         if(empty(input('product_name'))){
          $this->error('请输入商品名称',url('admin/product/product_guige'));
          die;
        }
        $product_name = trim(input('product_name'));
        $goods =  db('goods')->where('good_name','like',"%".$product_name."%")->paginate(10);
        $count = db('goods')->where('good_name','like',"%".$product_name."%")->count();
       return $this->fetch('product_list',[
        'good'=>$goods,
        'count'=>$count       
        ]);
      }
     
     $goods =  db('goods')->paginate(10);
     $count = db('goods')->count();
      return $this->fetch('product_list',[
        'good'=>$goods,
        'count'=>$count       
        ]);
    }

 public function product_list_add()
    { 
 if(Request::instance()->isPost()){
      $file =  request()->file('good_thumb');
      $data['good_name']=trim(input('product_name'));
      $data['good_remark']=trim(input('good_remark'));
      $data['good_sn']=trim(input('good_sn'));
      $data['cate_id']=trim(input('cate_3'));
      $data['brand_id']=trim(input('brand_id'));
      $data['shop_price']=trim(input('product_price'));
      $data['market_price']=trim(input('market_price'));
      $data['cost_price']=trim(input('cost_price'));
      $data['weight']=trim(input('weight'));
      $data['is_free_shipping']=trim(input('free'));
      $data['store_num']=trim(input('store_num'));
      $data['is_real']=trim(input('real'));
      $data['good_content']=trim(input('desc'));
      $data['add_time']=time();
       if($file){
          $dataimg = $this->upload($file);
            if($dataimg['statu']==0){
              $this->error($dataimg['msg']);
              die;
            }else{
              $data['good_thumb']=$dataimg['imgurl'];
            }
        }
      $goods = db('goods')->insert($data);
        if($goods){
          $this->success('添加成功',url('admin/product/product_list'));
        }else{
          $this->error('添加成功');
        }
      }
      $cates = db('goods_category')->where('level',1)->select();
      $brands = db('brand')->select();
      $suppfliers = db('suppliers')->select();
      return $this->fetch('product_list_add',[
        'cate'=>$cates,
        'brand'=>$brands,
        'suppfilers'=>$suppfliers
        ]);
    }

public function product_list_edit()
    {
      return $this->fetch('product_list_edit');
    } 

public function product_mode()
    {
      if(Request::instance()->isPost()){
        if(empty(input('mode_name'))){
          $this->error('请输入商品模型名称',url('admin/product/product_mode'));
          die;
        }
      $mode_name = trim(input('mode_name'));
      $type = db('goods_type')->where('name','like',"%".$mode_name."%")->paginate(10);
      $count = db('goods_type')->where('name','like',"%".$mode_name."%")->count();
      return $this->fetch('product_mode',[
        'type'=>$type,
        'count'=>$count
        ]);

}
      $type = db('goods_type')->paginate(10);
      $count = db('goods_type')->count();
      return $this->fetch('product_mode',[
        'type'=>$type,
        'count'=>$count
        ]);
    }
public function product_mode_del()
    {
      $type_id = trim(input('id'));

       if(!$type_id){
        $this->error('非法删除，删除失败');
        die;
       }
       $type = db('goods_type')->where('id',$type_id)->delete();
       if($type){
        $this->success('删除成功',url('admin/product/product_mode'));
       }else{
        $this->error('删除失败',url('admin/product/product_mode'));

       }
      
    }
//模型修改
public function product_mode_edit()
    {
     if(Request::instance()->isPost()){

       $data['name']=input('name');
       $type_id=trim(input('type_id'));
        $types = db('goods_type')->where('id',$type_id)->update($data);
        if($types){
          $this->success('修改成功',url('admin/product/product_mode'));

        }else{
          $this->error('修改失败');
        }

      }
      $type_id = trim(input('id'));
       if(!$type_id){
        $this->error('非法修改，修改失败');
        die;
       }
       $type = db('goods_type')->where('id',$type_id)->find();
      return $this->fetch('product_mode_edit',[
        'type'=>$type

      ]);
      
    }
  

// 产品设置
public function product_list_type()
{
   if(Request::instance()->isPost()){
   }
   $goods_id = trim(input('id'));
  if(!$goods_id){
    $this->error('请选择商品添加',url('admin/product/product_list'));
  }
   $goods = db('goods')->where('good_id',$goods_id)->find();
  $type_id = $goods['spec_type_id'];
  $type = db('goods_type')->select();
  $spec = db('spec')->where('type_id',1)->select();
  $attr = db('goods_attribute')->where('type_id',1)->order('attr_id  desc')->limit(5)->select();
  $spec_item=db('spec_item')->select();
  return $this->fetch('product_list_type',[
    'goodsType'=>$type,
    'type_id'=>$type_id,
    'goods_id'=>$goods_id,
    'spec'=>$spec,
    'attr'=>$attr,
    'spec_item'=>$spec_item
    ]);
}


//商品删除
public function product_list_del()
  {
    $goods_id = trim(input('id'));
    if(!$goods_id){
      $this->error('删除异常',url('admin/product/product_list'));
    }
    $goods = db('goods')->where('good_id',$goods_id)->delete();
    if(!$goods){
      $this->error('商品删除失败',url('admin/product/product_list'));
    }
    $attr = db('goods_attr')->where('good_id',$goods_id)->delete();
    $images = db('goods_images')->where('goods_id',$goods_id)->delete();
    $this->success('商品删除成功');
  }


public function uploads(){
      $goods_id = input('param.');
      $oldImg = $_FILES['file']['tmp_name'];
      $dir_path='./uploads/'.date("Ymd", time());
      if(!is_dir($dir_path)){
      mkdir($dir_path);
      }
      $newImg = $dir_path."/". mt_rand() . $_FILES['file']['name'];
      $move = move_uploaded_file($oldImg, $newImg);
      $imgpath = substr($newImg,10);
      $data['image_url'] =$imgpath;
      $data['goods_id']=$goods_id;
      if($move){
         $goods_images = db('goods_images')->insert($data);
         if($goods_images){
           return "成功";
           die;
         }else{
          return "失败";
          die;
         } 
       }else{
        return "失败";
       }

}
//添加模型
 public function product_mode_add()
    { 
      if(Request::instance()->isPost()){
        $data['name']=input('name');
        $types = db('goods_type')->insert($data);
        if($types){
          $this->success('添加成功',url('admin/product/product_mode'));

        }else{
          $this->error('添加成功');
        }

      }else{
              return $this->fetch('product_mode_add');
      }

    }

//添加相册
public function product_list_addimage(){
  if(Request::instance()->isPost()){
      $goods_id = input('goods_id', 0, 'intval');
      $data['goods_id']=$goods_id;
      if (!$goods_id) $this->error('非法操作');
          //步骤2：获取上传文件信息（注：数组，数组中是对象）
        $files = request()->file('img');
        //步骤3：遍历挨个上传
        foreach ($files as $file) 
        {
          //步骤4：判断对象是否正常
          if($file)
          {
            //步骤5：设置上传文件目录
            $uploadPath = ROOT_PATH . 'public' . DS . 'uploads';
            //步骤6：将临时目录下的文件移动到指定目录下
              $info = $file->move($uploadPath);
              
              //步骤7：判断是否移动成功
              if($info) {
                //生成缩略图
                //$temp = $uploadPath . DS;
              $imgurl =  $info->getSaveName();
                if(!$imgurl){
                 $this->error('添加相册失败');
                 die;
                }
              $data['image_url']=$imgurl;
              $images = db('goods_images')->insert($data);
                if(!$images){
                 $this->error('添加相册失败');
                 die;
                }
                // $bigImg = date('Ymd', time()) . DS . 'big_' . $info->getFilename();
                // $midImg = date('Ymd', time()) . DS . 'mid_' . $info->getFilename();
                // $smaImg = date('Ymd', time()) . DS . 'sma_' . $info->getFilename();

                //       $image = \think\Image::open($file);
                //       $image->thumb(800, 800, \think\Image::THUMB_CENTER)->save($temp . $bigImg);

                //       $image = \think\Image::open($file);
                //       $image->thumb(350, 350, \think\Image::THUMB_CENTER)->save($temp . $midImg);

                //       $image = \think\Image::open($file);
                //       $image->thumb(50, 50, \think\Image::THUMB_CENTER)->save($temp . $smaImg);

                      // GoodsPics::create([
                      //   //'goods_id' => 1,
                      //   'goods_id' => $goods_id,
                      //   'pics_ori' => $info->getSaveName(),
                      //   'pics_big' => $bigImg,
                      //   'pics_mid' => $midImg,
                      //   'pics_sma' => $smaImg,
                      // ]);
              }else{
                  // 上传失败获取错误信息
                  $this->error($file->getError());
              }
          }
        }
      $this->success('上传成功',url('product/product_list'));

   }
     $goods_id = input('id', 0, 'intval');
          if (!$goods_id) $this->error('非法访问');
          #步骤3：根据商品ID获取相册图片数据（数据数组里面是对象）
          $images = db('goods_images')->where('goods_id', $goods_id)->select();
          #步骤4：加载视图
          return $this->fetch('image', [
            'image' => $images ,
            'goods_id' => $goods_id
          ]);



}
//删除相册
  public function product_list_delimage()
  {
    $id = input('id', 0, 'intval');
    $goodspic =db('goods_images')->find($id);
    if (!$goodspic) $this->error('非法操作');
    $path = ROOT_PATH . 'public' . DS . 'uploads' . DS;
    $rs1 = @unlink($path . $goodspic['image_url']);
    $rs = false;
    if ($rs1) $rs = db('goods_images')->delete($id);
    if($rs) {
      return $this->success('删除成功');
    } else {
      return $this->error('删除失败');
    }
  }   
   /**
     * 动态获取商品规格选择框 根据不同的数据返回不同的选择框
     */  
    public function ajax_product_type(){
        $type_id = trim(input('type_id'));
        $goods_id = trim(input('goods_id'));
        $attr = db('goods_attribute')->where('type_id',$type_id)->select();
        $attrstr = '';
      foreach ($attr as $key => $value) {
        if($value['luru']==1){
          $attrstr .="<tr><td>".$value['attr_name']."</td><td><input type='text' name='attr[".$value['attr_id']."]' 
          value='".$value['attr_values']."'></td></tr>";
        }
        if($value['luru']==2){
        $attrstr .="<tr><td>".$value['attr_name']."</td><td><select name = 'attr[".$value['attr_id']."]'>";
        $attrarry = explode(',',$value['attr_values']);
      foreach ($attrarry as $key => $value) {
           $attrstr .="<option value='".$value."'>".$value."</option>";
        }
           $attrstr.="</select></td></tr>";
        }
      }
      $data2[]=$attrstr;

     $spec = db('spec')->where('type_id',$type_id)->select();
     $str = '';
     $data = array();
     foreach ($spec as  $v) {
        static $i=0;
        $str .="<ul class='Father_Title'><li>".$v['name']."</li></ul><ul class='Father_Item".$i++."'>";
        $item = db('spec_item')->where('spec_id',$v['spec_id'])->select();
        foreach ($item  as  $value) {
            $str .=" <li class='li_width'><label>";
            $str .=" <input id='Checkbox7' type='checkbox' item_id ='".$value['id']."' class='chcBox_Width' name='' value='".$value['item']."'>".$value['item'];
            $str .=" <span class='li_empty'> </span></label></li>";
          } 
            $str .= "</ul><br/>";
        
      }
       $data1[]= $str;
       if(!empty($data1)){
        $data['spec']=$data1;
       }
       if(!empty($attr)){
        $data['attr']=$data2;
       }
       if(!empty($attr)||!empty($data1)){
        return json($data);
       }
   return false; 
    }    


    //商品模型属性添加
  public function product_addtype(){
       $statu = 1;
       $data1 = input('param.');
       $good_id = trim(input('goods_id'));
       $data['good_id']=$good_id;
    //有属性就添加，没有就跳过
    if(!empty($data1['attr'])){
      $attr =$data1['attr'];
         foreach ($attr as $key => $value) {
        $goods_attr['good_id']=$data['good_id'];
        $goods_attr['attr_id']=$key;
        $goods_attr['attr_value']=$value;
        $goods_attrs = Db::table('dl_goods_attr')->where('good_id',$good_id)->where('attr_id',$key)->find();
        if(!empty($goods_attrs)){
         $goods_attrs = Db::table('dl_goods_attr')->where('good_id',$good_id)->where('attr_id',$key)->update(array('attr_value'=>$value));
        }else{
          $goods_attrs = Db::table('dl_goods_attr')->insert($goods_attr);
        }

        if($goods_attrs===false){
          $statu = 2;
        }
      }
    //有规格就添加，没有就跳过
    if(!empty($data1['Txt_PriceSon'])||!empty($data1['Txt_CountSon'])){
       $spec_price = $data1['Txt_PriceSon'];
       $store_count = $data1['Txt_CountSon'];
       //添加规格价格
      foreach ($spec_price as $key => $value) {
        $item_key = $key;

        $data['item_key']=$item_key;
          foreach ($value as $k => $v) {
            $item_price = $v;
            $data['price']=$item_price;
          }
       $goods_item_price = db('spec_goods_price')->insert($data);
          if(!$goods_item_price){
          $statu = 2;
        }
        $this->getkeyname($item_key);
      }
      foreach ($store_count as $key =>$value1) {
           $data['item_key']=$key ;
          foreach ($value1 as $k => $v2) {
            $count['store_count']=$v2;
             if( $data['item_key']){
         $goods_item_price = db('spec_goods_price')->where('item_key',$data['item_key'])->update($count);
           if(!$goods_item_price){
              $statu = 2;
                }
              }
            }
          }
     }
    if($statu==1){
    $this->success('添加成功');
    }else{
      $this->error('添加失败');
     }
 
     }
  }
    //添加规格价格的时候设置keyname
    public function getkeyname($itemid_str){
      $str= '';
    $spec_item_ids = explode('_',$itemid_str);
    foreach ($spec_item_ids as  $value) {
      $spec_items = db('spec_item')->where('id',$value)->find();
      $item = $spec_items['item'];
       $spec_id = $spec_items['spec_id'];
       $spec_name = db('spec')->where('spec_id',$spec_id)->find();
       $str.=$spec_name['name'].":".$item .",";
       }
       $str = substr($str,0,-1);
       if(empty($str)){
        $statu=2;
        return ;
       }else{
        $key_name['key_name']=$str;
        db('spec_goods_price')->where('item_key',$itemid_str)->update($key_name);
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



     /**
     * 动态获取商品属性输入框 根据不同的数据返回不同的输入框类型
     */
    public function ajaxGetAttrInput(){
         $goods_id = input('get.goods_id'); 
         $type_id = input('get.type_id'); 
        $attr =  db('goods_attribute')->where('type_id',$type_id)->field(['attr_id','attr_name','luru'])->select();
        $str = '';
        foreach ($attr as $k => $v) {
          if($v['luru']==2){
            $str .= "<select name='attr_id'>";
            $str .= "<option value='".$v['attr_id']."'>".$v['attr_name']."</option>";
            $str .= "</select>";
          }
          $str .= "<input type='text' name='".$v['attr_id']."' value='".$v['attr_name']."' >";
          # code...
        }
        return json($str);
    }


    /**
     * 动态获取商品属性输入框 根据不同的数据返回不同的输入框类型
     * @param int $goods_id 商品id
     * @param int $type_id 商品属性类型id
     */
    public function getAttrInput1($goods_id,$type_id)
    {
        header("Content-type: text/html; charset=utf-8");
        $GoodsAttribute = db('goods_attribute');
        $attributeList = $GoodsAttribute->where('type_id',$type_id)->select();
        foreach($attributeList as $key => $val)
        {                                                                        
            $curAttrVal = $this->getGoodsAttrVal(NULL,$goods_id, $val['attr_id']);

             //促使他 循环
            if(count($curAttrVal) == 0)
                $curAttrVal[] = array('goods_attr_id' =>'','goods_id' => '','attr_id' => '','attr_value' => '','attr_price' => '');
            foreach($curAttrVal as $k =>$v)
            {                                        
                            $str .= "<tr class='attr_{$val['attr_id']}'>";            
                            $addDelAttr = ''; // 加减符号
                            // 单选属性 或者 复选属性
                            if($val['attr_type'] == 1 || $val['attr_type'] == 2)
                            {
                                if($k == 0)                                
                                    $addDelAttr .= "<a onclick='addAttr(this)' href='javascript:void(0);'>[+]</a>&nbsp&nbsp";                                                                    
                                else                                
                                     $addDelAttr .= "<a onclick='delAttr(this)' href='javascript:void(0);'>[-]</a>&nbsp&nbsp";                               
                            }

                            $str .= "<td>$addDelAttr {$val['attr_name']}</td> <td>";            

                           // if($v['goods_attr_id'] > 0) //tp_goods_attr 表id
                           //     $str .= "<input type='hidden' name='goods_attr_id[]' value='{$v['goods_attr_id']}'/>";
                                    
                            // 手工录入
                            if($val['attr_input_type'] == 0)
                            {
                                $str .= "<input type='text' size='40' value='".($goods_id ? $v['attr_value'] : $val['attr_values'])."' name='attr_{$val['attr_id']}[]' />";
                            }
                            // 从下面的列表中选择（一行代表一个可选值）
                            if($val['attr_input_type'] == 1)
                            {
                                $str .= "<select name='attr_{$val['attr_id']}[]'><option value='0'>无</option>";
                                $tmp_option_val = explode(PHP_EOL, $val['attr_values']);
                                foreach($tmp_option_val as $k2=>$v2)
                                {
                                    // 编辑的时候 有选中值
                                    $v2 = preg_replace("/\s/","",$v2);
                                    if($v['attr_value'] == $v2)
                                        $str .= "<option selected='selected' value='{$v2}'>{$v2}</option>";
                                    else
                                        $str .= "<option value='{$v2}'>{$v2}</option>";
                                }
                                $str .= "</select>";                
                                //$str .= "属性价格<input type='text' maxlength='10' size='5' value='{$v['attr_price']}' name='attr_price_{$val['attr_id']}[]'>";
                            }
                            // 多行文本框
                            if($val['attr_input_type'] == 2)
                            {
                                $str .= "<textarea cols='40' rows='3' name='attr_{$val['attr_id']}[]'>".($goods_id ? $v['attr_value'] : $val['attr_values'])."</textarea>";
                                //$str .= "属性价格<input type='text' maxlength='10' size='5' value='{$v['attr_price']}' name='attr_price_{$val['attr_id']}[]'>";
                            }                                                        
                            $str .= "</td></tr>";
                            //$str .= "<br/>";            
            }                        
            
        }        
        return  $str;
    }
    
 /**
     * 获取 tp_goods_attr 表中指定 goods_id  指定 attr_id  或者 指定 goods_attr_id 的值 可是字符串 可是数组
     * @param int $goods_attr_id tp_goods_attr表id
     * @param int $goods_id 商品id
     * @param int $attr_id 商品属性id
     * @return array 返回数组
     */
    public function getGoodsAttrVal($goods_attr_id = 0 ,$goods_id = 0, $attr_id = 0)
    {
        $GoodsAttr = db('goods_attr');        
        if($goods_attr_id > 0)
            return $GoodsAttr->where("goods_attr_id = $goods_attr_id")->select(); 
        if($goods_id > 0 && $attr_id > 0)
            return $GoodsAttr->where("goods_id = $goods_id and attr_id = $attr_id")->select();        
    }


}
