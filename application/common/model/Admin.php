<?php
namespace app\common\model;

use think\Db;
use think\Session;

class Admin extends \think\Model
{
   

    public static function login($name, $password)
    {
        $num=1;
        $client=[
          'type'  =>  '\think\mongo\Connection',
          // 服务器地址
          'hostname'       => '127.0.0.1',
          // 数据库名
          'database'       => 'demo',
        ];
        $userCollection =Db::connect($client)->name('user');
        $query=[
          'name'=>$name,
          //'password'=>md5($password),
        ];
        $user=$userCollection->where($query)
       ->find();
        print_r($user);
       // session::set("user",$user);
       if ($user) {
            // unset($user["password"]);
            session("user",$name);
            session("lognum", NULL);
            return true;
        }else{
          if (session('lognum')==1) {
            $num=2;
          }
          if (session('lognum')==2) {
            $num=3;
          }
            // $num=$num++;
            session("lognum",$num);
            return false;
        }
    }

    // 退出登录
    public static function logout(){
        session("user", NULL);
    }
} 
 