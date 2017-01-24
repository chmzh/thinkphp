<?php
namespace app\index\controller;

use think\Request;
use \think\Db;
use app\common\model\User;
use think\cache\driver\Redis;
use app\common\model\Admin;
use app\common\model\Address;
use app\common\model\MongoModel;
class Index
{
    //http://thinkphp.cmz.com/index.php/index/index/hello
    public function help()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
        //return view("index");
    }
    //http://thinkphp.cmz.com/index.php/index/index/mongo
    public function mongo(){
        //Admin::login("chmzh", "1");
        $model = new MongoModel;
        $model->find();
        
        
        //$address = new Address;
        //$address->find();
    }
    
    public function loc(){
        $model = new MongoModel;
        $model->loc();
    }
    
    public function redis(){
        $redis = new Redis();
        
        $datas=['name'=>'chmzh'];
        $redis->set('username',$datas);
        
        print_r($redis->get('username'));
    }
    
    public function index()
    {
        //$arr = Db::query("select * from user");
        //$a = Db::table("user")->where('id',1)->find();
        $a = User::get(1);
        //print_r($a);
        echo $a->enabled;
        //return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
        //return view("index");
    }
    
    public function hello()
    {
        print_r(get_declared_classes());
        print_r(get_declared_interfaces());
        return json();
        //return Request::instance()->get("id").Request::instance()->get("name");
    }
    
    public function user(){
        $user = new User;
        
        //$user->event("after_insert", 'after_insert');
        
        $user->uname='hello3';
        try {
            echo $user->save();
        } catch (\Exception $e) {
            //exception($e);
        }finally {
            echo "aa";
        }
        //$data = $user->where(function($query){$query->field(["uname"])->where(['id'=>['>',1]]);})->find();
        //print_r($data);
    }
}
