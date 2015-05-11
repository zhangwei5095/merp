<?php
namespace Erp\Controller;
use Think\Controller;
/* 默认入口Action */
class IndexController extends BaseController {
    public function index(){
        $this->redirect('Login/login');
    }
}