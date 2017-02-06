<?php
namespace think;

class BaseController extends Controller
{
    protected function _initialize(){
        $this->assign("siteName","我的站点");
    }
}

?>