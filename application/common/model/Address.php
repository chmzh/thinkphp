<?php
namespace app\common\model;


use think\Db;
use think\Model;
class Address extends MongoModel
{   
    protected $connection=[
        'type'  =>  '\think\mongo\Connection',
        // 服务器地址
        'hostname'       => '127.0.0.1',
        // 数据库名
        'database'       => 'demo',
    ];
    
    public function find(){
        //$a = $this->model->find();
        $a = Db::name("address")->find();
        print_r($a);
    }
}

?>