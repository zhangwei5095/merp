<?php
namespace Erp\Controller;
use Think\Controller;
class LoginController extends BaseController {
    
    public function login(){
        if(!IS_POST){
            $this->assign('head_title',"登录");
            $this->display();
        }else{
//             I = base_Utils::shtmlspecialchars(I);
//             //session_start();
//             if(!SCaptcha::check(I['captcha'])){
//                 $modelAdmin = new m_admin();
//                 $loginInfo = $modelAdmin->checkLogin(I['username'],I['pwd'],(int)I['timeout']);
//                 if($loginInfo){
//                     $this->redirect($this->createUrl('/'));
//                 }else{
//                     $this->ShowMsg("用户名或者密码错误！");
//                 }
//             }else{
//                 $this->ShowMsg("验证码错误！");
//             }
        }
        
    }
    /**
     * 登录
     */
    public function checklogin(){
        $AccountM = M("Account");
        $pwd=I('pwd','trim');
       // echo '<script language="javascript">alert("'.md5($pwd).'");</script>';
        $where['admin_name'] = I( 'username','trim' );
        $where['admin_pwd'] = md5($pwd);
        $res=$AccountM->where($where)->find();
        if($res){
            session('admin_id',$res['admin_id']);
            session('admin_name',$res['admin_name']);
            session('admin_realname',$res['admin_realname']);
            session('admin',$res);
            session('admin_gid',$res['gid']);
            
            $AccountM->lastlogintime= time();
            $result = $AccountM->save(); // 写入数据到数据库
            $this->redirect('Home/index', array('refresh' => 1));
        }else{
            $this->error('帐号密码错误');
        }
    }
    /**
     * 退出登录
     */
    public function logout(){
        session(null);
        session('[destroy]');
        $this->redirect('login');
        //$this->success('退出登录成功', 'index');
    }
}