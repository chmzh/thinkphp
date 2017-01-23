<?php
namespace app\index\controller;
use think\Request;
use think\controller\Rest;
class Test extends Rest{
    public function index(){
        $data = ['name'=>Request::instance()->get("name")];
        return json($data);
    }
}