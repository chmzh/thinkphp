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
            'loc'=>['$near'=>[50,50]],//'{$near:[50,50]}',
            //'password'=>md5($password),
        ];
        $arr = Db::name("location")->where($query)->find();
        print_r($arr);
    }
    
    /*
    // 插入坐标到mongodb
    function add($dbconn, $tablename, $longitude, $latitude, $name){
        $index = array('loc'=>'2dsphere');
        $data = array(
            'loc' => array(
                'type' => 'Point',
                'coordinates' => array(doubleval($longitude), doubleval($latitude))
            ),
            'name' => $name
        );
        $coll = $dbconn->selectCollection($tablename);
        $coll->ensureIndex($index);
        $result = $coll->insert($data, array('w' => true));
        return (isset($result['ok']) && !empty($result['ok'])) ? true : false;
    }
    
    // 搜寻附近的坐标
    function query($dbconn, $tablename, $longitude, $latitude, $maxdistance, $limit=10){
        $param = array(
            'loc' => array(
                '$nearSphere' => array(
                    '$geometry' => array(
                        'type' => 'Point',
                        'coordinates' => array(doubleval($longitude), doubleval($latitude)),
                    ),
                    '$maxDistance' => $maxdistance*1000
                )
            )
        );
    
        $coll = $dbconn->selectCollection($tablename);
        $cursor = $coll->find($param);
        $cursor = $cursor->limit($limit);
    
        $result = array();
        foreach($cursor as $v){
            $result[] = $v;
        }
    
        return $result;
    }
    
    $db = conn('localhost','lbs','root','123456');
    
    // 随机插入100条坐标纪录
    for($i=0; $i<100; $i++){
        $longitude = '113.3'.mt_rand(10000, 99999);
        $latitude = '23.15'.mt_rand(1000, 9999);
        $name = 'name'.mt_rand(10000,99999);
        add($db, 'lbs', $longitude, $latitude, $name);
    }
    
    // 搜寻一公里内的点
    $longitude = 113.323568;
    $latitude = 23.146436;
    $maxdistance = 1;
    $result = query($db, 'lbs', $longitude, $latitude, $maxdistance);
    print_r($result);
    */
} 
 