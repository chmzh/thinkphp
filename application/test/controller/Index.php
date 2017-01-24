<?php
namespace app\test\controller;

use app\common\model\MongoModel;

class Index
{
    ////http://thinkphp.cmz.com/index.php/test/Index/index
    public function index()
    {
        $arr = \think\Db::query("select * from ocenter_action");
        
        print_r($arr);
    }
    
    //http://thinkphp.cmz.com/index.php/test/index/mongo
    public function mongo(){
        //Admin::login("chmzh", "1");
        $model = new MongoModel;
        $model->find();
    
    
        //$address = new Address;
        //$address->find();
    }
    //http://thinkphp.cmz.com/index.php/test/index/loc
    public function loc(){
        $model = new MongoModel;
        $model->loc();
    }
}
