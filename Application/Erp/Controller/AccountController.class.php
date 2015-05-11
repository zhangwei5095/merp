<?php
namespace Erp\Controller;
use Think\Controller;
class AccountController extends BaseController {
    
    public  $current = 'Account';
    
    
    public function index(){
        $AccountM = M("Account");
        $condition['t_account.state'] = array('neq',3);//状态0停用 1可用 3删除
        //分页查询
        $count = $AccountM->where($condition)->count();
        $page = new \Think\Page($count, 10);
        $show = $page->show();
        $orderby['admin_id']='desc';
        $Account = $AccountM->where($condition)->order($orderby)->limit( $page->firstRow.','.$page->listRows )->select();
        $this->assign('page',$show );
        $this->assign('currentname', $this->current );
        $this->assign('Account',$Account);
        $this->display();
    }
    
    /* 进入添加页面 */
    public function add(){
        $this->assign('currentname', $this->current );
        $this->display();
    }
    /* 进入修改页面 */
    public function edit(){
        $AccountM = M("Account");
        $Account_id = I("admin_id");
        if($Account_id!=null){
            $condition['admin_id'] = $Account_id;
            $Account = $AccountM->where($condition)->find();
        }
        $this->assign('currentname', $this->current );
        $this->assign('Account', $Account );
        $this->display();
    }
    /* 进入修改页面 */
    public function editpwd(){
        $AccountM = M("Account");
        $Account_id = I("admin_id");
        if($Account_id!=null){
            $condition['admin_id'] = $Account_id;
            $Account = $AccountM->where($condition)->find();
        }
        $this->assign('currentname', $this->current );
        $this->assign('Account', $Account );
        $this->display();
    }
    
    /* 保存  */
    public function save(){
        $AccountM = D("Account");
        //是否屏蔽管理员修改功能;1 不屏蔽  0 屏蔽
        if(C("ADMIN")==0){
            $this->error('管理员管理暂时关闭',U('Account/index'));
            exit;
        }
        if(IS_POST){
            if($AccountM->create($_POST)){
                $AccountM->admin_pwd= md5(I('admin_pwd'));
                //更新操作
                if($_POST['admin_id']!=null){
                    $result = $AccountM->save(); // 写入数据到数据库
                //新增    
                }else{
                    $AccountM->createtime = time();
                    $result = $AccountM->add(); // 写入数据到数据库
                }
                if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值        
                    $insertId = $result;
                    $this->success('保存成功',U('Account/index'));
                }else{
                    $this->error('保存失败',U('Account/index'));
                }
            }else{
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($AccountM->getError(),U('Account/add'));
            }
        }
    }
    /* 保存  */
    public function savepwd(){
        $AccountM = M("Account");
        //是否屏蔽管理员修改功能;1 不屏蔽  0 屏蔽
        if(C("ADMIN")==0){
            $this->error('管理员管理暂时关闭',U('Account/index'));
            exit;
        }
        $id = I('admin_id');
        if($id!=null){
            $condition['admin_id'] = $id;
            $Account = $AccountM->where($condition)->find();
            
            if($Account['admin_pwd']!=md5(I('admin_pwd_old'))){
                $this->error('密码错误！',U('Account/editpwd', array('admin_id' => $id)));
                exit;
            }
            if(I('admin_pwd_re')!=I('admin_pwd_old')){
                $this->error('两次密码不一致！',U('Account/editpwd', array('admin_id' => $id)));
                exit;
            }
            if($Account['admin_pwd']==md5(I('admin_pwd'))){
                $this->success('密码修改成功！',U('Home/index'));
                exit;
            }
            $AccountM->admin_pwd = md5(I('admin_pwd'));
            $result = $AccountM->where('admin_id='.$id)->save();
            if($result){// 如果主键是自动增长型 成功后返回值就是最新插入的值
                $insertId = $result;
                $this->success('密码修改成功',U('Home/index'));
            }else{
                $this->error('密码修改失败',U('Home/index'));
            }
        }
    }
    /* 删除  */
    public function delete(){
        $AccountM = M("Account");
        //是否屏蔽管理员修改功能;1 不屏蔽  0 屏蔽
        if(C("ADMIN")==0){
            $this->error('管理员管理暂时关闭',U('Account/index'));
            exit;
        }
        $id = I('admin_id');
        if($id!=null){
            $AccountM->state = 3;//状态0停用 1可用 3删除
            $result = $AccountM->where('admin_id='.$id)->save();
            if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                $insertId = $result;
                $this->redirect('Account/index');
            }else{
                $this->error('保存失败',U('Account/index'));
            }
        }
    }
    /* 更改状态 */
    public function status(){
        $AccountM = M("Account");
        //是否屏蔽管理员修改功能;1 不屏蔽  0 屏蔽
        if(C("ADMIN")==0){
            $this->error('管理员管理暂时关闭',U('Account/index'));
            exit;
        }
        $id = I('admin_id');
        $status = I('status');
        if($id!=null){
            $AccountM->state = $status;//状态0停用 1可用 3删除
            $result = $AccountM->where('admin_id='.$id)->save();
            if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                $insertId = $result;
                $this->redirect('Account/index');
            }else{
                $this->error('保存失败',U('Account/index'));
            }
        }
    }
}