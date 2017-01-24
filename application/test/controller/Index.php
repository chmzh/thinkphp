<?php
namespace app\test\controller;

use think\Request;

class Index
{
    ////http://thinkphp.cmz.com/index.php/test/Index/index
    public function index()
    {
        $arr = \think\Db::query("select * from ocenter_action");
        
        print_r($arr);
    }
    
   
}
