<?php
namespace app\common\model;

use think\Model;

class User extends Model
{
    protected $pk = "id";
    
    public function after_insert($that){
        echo $that.'aa';
    }
    
    public function getEnabledAttr($value){
        $enableds = [0=>"禁止",1=>"启用"];
        return $enableds[$value];
    }
}

?>