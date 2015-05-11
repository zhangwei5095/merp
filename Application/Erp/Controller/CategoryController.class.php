<?php
namespace Erp\Controller;
use Think\Controller;
class CategoryController extends BaseController {
    
    public  $current = 'Category';
    
    
    public function index(){
        $CategoryM = M("Category");
        $PID = I("pid");
        $backParent = false;
        $backParentId = I("backParentId");
        $condition['isdel'] = 0;
        if($PID==null||$PID==0){
            $condition['pid'] = 0;
            $backParent = false;
        }else{
            $condition['pid'] = $PID;
            $backParent = true;
        }
        //分页查询
        $count = $CategoryM->where($condition)->count();
        $page = new \Think\Page($count, 10);
        $show = $page->show();
        $orderby['cat_id']='desc';
        $Category = $CategoryM->where($condition)->order($orderby)->limit( $page->firstRow.','.$page->listRows )->select();
        $this->assign('page',$show );
        $this->assign('currentname', $this->current );
        $this->assign('category',$Category);
        $this->assign('backParentId',$backParentId);
        $this->assign('pid',$PID);
        $this->assign('backParent',$backParent);
        $this->display();
    }
    
    /* 进入添加页面 */
    public function add(){
        $CategoryM = M("Category");
        $PID = I("pid");
        //上级分类
        if($PID!=null&&$PID!=0){
            $condition['cat_id'] = $PID;
            $Category = $CategoryM->where($condition)->find();
        }else{
            $Category['cat_name'] = '顶级分类';
            $Category['cat_id'] = '0';
        }
        $this->assign('currentname', $this->current );
        $this->assign('CategoryP', $Category );//上级分类
        $this->display();
    }
    
    /* 进入修改页面 */
    public function edit(){
        $CategoryM = M("Category");
        $cat_id = I("cat_id");
        if($cat_id!=null){
            $condition['cat_id'] = $cat_id;
            $Category = $CategoryM->where($condition)->find();
            if($Category){
                $PID = $Category['pid'];
                //上级分类
                if($PID!=null&&$PID!=0){
                    $condition['cat_id'] = $PID;
                    $CategoryP = $CategoryM->where($condition)->find();
                }else{
                    $CategoryP['cat_id'] = '0';
                    $CategoryP['cat_name'] = '顶级分类';
                }
            }
        }
        $this->assign('currentname', $this->current );
        $this->assign('CategoryP', $CategoryP );//上级分类
        $this->assign('Category', $Category );//分类
        $this->display();
    }
    
    /* 保存分类  */
    public function save(){
        $CategoryM = M("Category");
        if(IS_POST){
            if($CategoryM->create($_POST)){
                //更新操作
                if($_POST['cat_id']!=null){
                    $result = $CategoryM->save(); // 写入数据到数据库
                //新增    
                }else{
                    $result = $CategoryM->add(); // 写入数据到数据库
                }
                if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值        
                    $insertId = $result;
                    $this->success('保存成功',U('Category/index', array('pid' => $_POST['pid'])));
                }else{
                    $this->error('保存失败',U('Category/index', array('pid' => $_POST['pid'])));
                }
            }
        }
    }
    /* 删除  */
    public function delete(){
        $CategoryM = M("Category");
        $id = I('cat_id');
        if($id!=null){
            $CategoryM->isdel = 1;//是否可用1不可用 0可用
            $result = $CategoryM->where('cat_id='.$id)->save();
            $result = $CategoryM->where('pid='.$id)->save();
            if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                $insertId = $result;
                $this->redirect('Category/index');
            }else{
                $this->error('保存失败',U('Category/index'));
            }
        }
    }
    /* 更改状态 */
    public function status(){
        $CategoryM = M("Category");
        $id = I('cat_id');
        $status = I('status');
        if($id!=null){
            $CategoryM->is_show = $status;//状态0停用 1可用 3删除
            $result = $CategoryM->where('cat_id='.$id)->save();
            if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                $insertId = $result;
                $this->redirect('Category/index');
            }else{
                $this->error('保存失败',U('Category/index'));
            }
        }
    }
    
}