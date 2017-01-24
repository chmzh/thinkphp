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
        $arr = Db::name("user")->find();
        print_r($arr);
    }
    
    public function loc(){
        $arr = Db::name("location")->find("{'loc':'\{\$near\:[50,50]\}'}");
        print_r($arr);
    }
} 
 