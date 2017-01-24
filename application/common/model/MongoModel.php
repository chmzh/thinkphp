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
    
    /**
     * 计算两点地理坐标之间的距离
     * @param Decimal $longitude1 起点经度
     * @param Decimal $latitude1 起点纬度
     * @param Decimal $longitude2 终点经度
     * @param Decimal $latitude2 终点纬度
     * @param Int   $unit    单位 1:米 2:公里
     * @param Int   $decimal  精度 保留小数位数
     * @return Decimal
     */
    /*
    function getDistance($longitude1, $latitude1, $longitude2, $latitude2, $unit=2, $decimal=2){
    
        $EARTH_RADIUS = 6370.996; // 地球半径系数
        $PI = 3.1415926;
    
        $radLat1 = $latitude1 * $PI / 180.0;
        $radLat2 = $latitude2 * $PI / 180.0;
    
        $radLng1 = $longitude1 * $PI / 180.0;
        $radLng2 = $longitude2 * $PI /180.0;
    
        $a = $radLat1 - $radLat2;
        $b = $radLng1 - $radLng2;
    
        $distance = 2 * asin(sqrt(pow(sin($a/2),2) + cos($radLat1) * cos($radLat2) * pow(sin($b/2),2)));
        $distance = $distance * $EARTH_RADIUS * 1000;
    
        if($unit==2){
            $distance = $distance / 1000;
        }
    
        return round($distance, $decimal);
    
    }
    
    // 起点坐标
    $longitude1 = 113.330405;
    $latitude1 = 23.147255;
    
    // 终点坐标
    $longitude2 = 113.314271;
    $latitude2 = 23.1323;
    
    $distance = getDistance($longitude1, $latitude1, $longitude2, $latitude2, 1);
    echo $distance.'m'; // 2342.38m
    
    $distance = getDistance($longitude1, $latitude1, $longitude2, $latitude2, 2);
    echo $distance.'km'; // 2.34km
    */
} 
 