<?php
/**
 * video 模型
 * User: Administrator
 * Date: 2018/8/25 0025
 * Time: 17:06
 */

namespace app\common\model;

use think\Model;

class Video extends Model
{
    //过滤字段
    static public function taskout(){
        return self::field('updat_time,deleted_time',true);
    }
}