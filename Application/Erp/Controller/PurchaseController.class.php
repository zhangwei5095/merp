<?php
namespace Erp\Controller;
use Think\Controller;
use Think\Model;
/* 采购管理 */
class PurchaseController extends BaseController {
    
    public  $current = 'Purchase';
    
    public function index(){
        $PurchaseM = M("Purchase");
        $condition['isdel'] = 0;
        //分页查询
        $count = $PurchaseM->where($condition)->count();
        $page = new \Think\Page($count, 10);
        $show = $page->show();
        $orderby['dateline']='desc';
        $Purchase = $PurchaseM->where($condition)->order($orderby)->limit( $page->firstRow.','.$page->listRows )->select();
        $this->assign('page',$show );
        $this->assign('currentname', $this->current );
        $this->assign('Purchase',$Purchase);
        $this->display();
    }
    
    /* 进入添加页面 */
    public function add(){
        $GoodsM = M("Goods");
        $PurchaseM = M("Purchase");
        $goods_id = I("goods_id");
        $id = I("id");
        $ac = I("ac");
        //加库存
        if($ac=='add'){
            if($id!=null){
                $condition['id'] = $id;
                $Purchase = $PurchaseM->where($condition)->find();
            }
            
        }else{//新增库存
            if($goods_id!=null){
                $condition['goods_id'] = $goods_id;
                $Purchase = $GoodsM->where($condition)->find();
            }
        }
        $this->assign('Purchase', $Purchase );//商品
        $this->assign('currentname', $this->current );
        $this->assign('ac', $ac );
        $this->display();
    }
    public function edit(){
        $GoodsM = M("Goods");
        $PurchaseM = M("Purchase");
        $goods_id = I("goods_id");
        $id = I("id");
        $ac = I("ac");
        //加库存
        if($id!=null){
            $condition['id'] = $id;
            $Purchase = $PurchaseM->where($condition)->find();
        }
        $this->assign('Purchase', $Purchase );//商品
        $this->assign('currentname', $this->current );
        $this->assign('ac', $ac );
        $this->display();
    }
    
    //选择商品 进行入库
    public function addnew(){
        $GoodsM = M("Goods");
        $condition['t_goods.isdel'] = 0;
        //分页查询
        $count = $GoodsM->where($condition)->count();
        $page = new \Think\Page($count, 10);
        $show = $page->show();
        $orderby['creatymd']='desc';
        $Goods = $GoodsM->field("t_goods.*,t_category.cat_id,t_category.cat_name")->where($condition)->join('LEFT JOIN t_category ON t_category.cat_id = t_goods.cat_id')->order($orderby)->limit( $page->firstRow.','.$page->listRows )->select();
        $this->assign('page',$show );
        $this->assign('currentname', $this->current );
        $this->assign('Goods',$Goods);
        $this->display();
    }
    
    /* 保存  */
    public function save(){
        $PurchaseM = M("Purchase");
        $GoodsM = M("Goods");
        $type = "unkown";
        if(IS_POST){
            if($PurchaseM->create($_POST)){
                $ac = $_POST['ac'];
                $in_num_old = $_POST['in_num_old'];
                $in_num = $_POST['in_num'];
                $PurchaseM->dateymd = date('Y-m-d',time());//进货时间
                $PurchaseM->dateline = time();
                $PurchaseM->isdel = 0;//是否可用1不可用 0可用
                //追加库存
                if($ac=='add'){
                	$Inc = $in_num;
                	$type = "increase";
                    $PurchaseM->in_num = $in_num + $in_num_old;
                    $result = $PurchaseM->save(); 
                    //修改
                }else if($ac=='edit'){
                    if($in_num_old>$in_num){
                        $Dec = $in_num_old - $in_num;
                        $type = "decrease";
                    }else if($in_num_old<$in_num){
                        $Inc = $in_num - $in_num_old;
                        $type = "increase";
                    }
                    $result = $PurchaseM->save(); 
                    //新增库存
                }else{
                	 $Inc = $in_num;
                    $type = "increase";
                    $result = $PurchaseM->add(); 
                }
                if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值        
                    $insertId = $result;
                    $Model = new Model();
                    $sql = "SELECT sum(in_price*in_num)/sum(in_num) AS in_price from t_purchase where goods_id=".$_POST['goods_id'];
                    $in_price = $Model->query($sql);
                    $sql1 = "update t_goods set in_price = ".$in_price[0]['in_price']." where goods_id=".$_POST['goods_id'];
                    $GoodsM->execute($sql1);
                    //加库存
                    if($type=='decrease'){
                        $GoodsM->where('goods_id='.$_POST['goods_id'])->setDec('stock',$Dec);
                    }else if($type=='increase'){
                        $GoodsM->where('goods_id='.$_POST['goods_id'])->setInc('stock',$Inc);
                    }
                    $this->success('保存成功',U('Purchase/index'));
                }else{
                    $this->error('保存失败',U('Purchase/index'));
                }
            }
        }
    }
    /* 删除  */
    public function delete(){
        $PurchaseM = M("Purchase");
        $id = I('id');
        if($id!=null){
            $PurchaseM->isdel = 1;//是否可用1不可用 0可用
            $result = $PurchaseM->where('id='.$id)->save(); 
            if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值        
                $insertId = $result;
                $this->redirect('Purchase/index');
            }else{
                $this->error('保存失败',U('Purchase/index'));
            }
        }
    }
    /* 更改订单状态  */
    public function status(){
        $PurchaseM = M("Purchase");
        $id = I('id');
        $order_status = I('order_status');
        if($id!=null){
            $PurchaseM->order_status = $order_status;//0已确认；1 已付款；2已发货；3已完成；4退货中；5退货完成
            $result = $PurchaseM->where('id='.$id)->save(); 
            if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值        
                $insertId = $result;
                $this->redirect('Purchase/index');
            }else{
                $this->error('保存失败',U('Purchase/index'));
            }
        }
    }
    
    /* 导出 */
    function export(){//导出Excel
        $condition['isdel'] = 0;
        $xlsModel = M('Purchase');
        $xlsData  = $xlsModel->Field('goods_id,goods_name,goods_sn,in_num,in_price,creatymd')->where($condition)->select();
    
        $filename="采购信息";
        $headArr=array("商品ID","商品名称","商品代码","采购数量","采购价","创建日期");
        $this->exportExcel($filename,$headArr,$xlsData);
    }
}