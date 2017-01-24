<?php
namespace app\index\controller;
use think\Request;
use think\controller\Rest;
class Test extends Rest{
    
    //http://thinkphp.cmz.com/index.php/index/Test/index
    public function index(){
        $data = ['name'=>Request::instance()->get("name")];
        return json($data);
    }
}