<?php
 
namespace app\admin\model;
 
use think\Model;
 
class Admin extends Model
{
 
    /**
     * 声明模型对应的表名（注：默认表名就是小写类名，特殊情况需要声明重写规则）
     */
    protected $table = 'dl_admin';
    /**
     * 声明插入数据时间字段自动填充
     */
    protected $autoWriteTimestamp = true;
 
    // //创建时间字段
     protected $createTime = 'admin_create_time';
    // //更新时间字段
     protected $updateTime = 'admin_update_time';
}