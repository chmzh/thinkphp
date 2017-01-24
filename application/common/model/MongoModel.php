<?php
namespace app\common\model;


use \think\Db;
use think\Model;
class MongoModel extends Model
{
//     protected $connection=[
//         'type'  =>  '\think\mongo\Connection',
//         // 服务器地址
//         'hostname'       => '127.0.0.1',
//         // 数据库名
//         'database'       => 'demo',
//     ];
    
    public function find(){
        $query=[
            'name'=>'chmzh',
        ];
        $arr = Db::name("user")->where($query)->find();
        print_r($arr);
    }
    
    public function loc(){
        $query=[
            'loc'=>'{$near:[50,50]}',
            //'password'=>md5($password),
        ];
        $arr = Db::name("location")->where($query)->find();
        print_r($arr);
    }
} 
 