<?php
namespace Erp\Controller;
use Think\Controller;
class MemberController extends BaseController {
    
    public  $current = 'Member';
    
    
    public function index(){
        $MemberM = M("Member");
        $condition['t_member.state'] = array('neq',3);//状态0停用 1可用 3删除
        //分页查询
        $count = $MemberM->where($condition)->count();
        $page = new \Think\Page($count, 10);
        $show = $page->show();
        $orderby['mid']='desc';
        $Member = $MemberM->where($condition)->order($orderby)->limit( $page->firstRow.','.$page->listRows )->select();
        $this->assign('page',$show );
        $this->assign('currentname', $this->current );
        $this->assign('Member',$Member);
        $this->display();
    }
    
    /* 进入添加页面 */
    public function add(){
        $this->assign('currentname', $this->current );
        $this->display();
    }
    /* 进入修改页面 */
    public function edit(){
        $MemberM = M("Member");
        $Member_id = I("mid");
        if($Member_id!=null){
            $condition['mid'] = $Member_id;
            $Member = $MemberM->where($condition)->find();
        }
        $this->assign('currentname', $this->current );
        $this->assign('Member', $Member );//商品
        $this->display();
    }
    
    /* 保存  */
    public function save(){
        $MemberM = M("Member");
        if(IS_POST){
            if($MemberM->create($_POST)){
                //更新操作
                if($_POST['mid']!=null){
                    $result = $MemberM->save(); // 写入数据到数据库
                //新增    
                }else{
                    $PurchaseM->regdateymd = date('Y-m-d',time());
                    $PurchaseM->regdateline = time();
                    $result = $MemberM->add(); // 写入数据到数据库
                }
                if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值        
                    $insertId = $result;
                    $this->success('保存成功',U('Member/index'));
                }else{
                    $this->error('保存失败',U('Member/index'));
                }
            }else{
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($MemberM->getError(),U('Member/add'));
            }
        }
    }
    /* 删除  */
    public function delete(){
        $MemberM = M("Member");
        $id = I('mid');
        if($id!=null){
            $MemberM->state = 3;//状态0停用 1可用 3删除
            $result = $MemberM->where('mid='.$id)->save();
            if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                $insertId = $result;
                $this->redirect('Member/index');
            }else{
                $this->error('保存失败',U('Member/index'));
            }
        }
    }
    /* 更改状态 */
    public function status(){
        $MemberM = M("Member");
        $id = I('mid');
        $status = I('status');
        if($id!=null){
            $MemberM->state = $status;//状态0停用 1可用 3删除
            $result = $MemberM->where('mid='.$id)->save();
            if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                $insertId = $result;
                $this->redirect('Member/index');
            }else{
                $this->error('保存失败',U('Member/index'));
            }
        }
    }
}