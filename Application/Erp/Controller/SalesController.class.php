<?php
namespace Erp\Controller;
use Think\Controller;
class SalesController extends BaseController {
 
    public  $current = 'Sales';
    
    public function index(){
        $OrderM = M("Order");
        $condition['t_order.state'] = 1;//状态0停用1可用 3删除
        //分页查询
        $count = $OrderM->where($condition)->count();
        $page = new \Think\Page($count, 10);
        $show = $page->show();
        $orderby['dateline']='desc';
        $Order = $OrderM->field("t_order.*,t_member.realname")->where($condition)->join('LEFT JOIN t_member ON t_member.mid = t_order.mid')->where($condition)->order($orderby)->limit( $page->firstRow.','.$page->listRows )->select();
        $this->assign('page',$show );
        $this->assign('currentname', $this->current );
        $this->assign('Order',$Order);
        $this->display();
    }
    
    /* 进入添加页面 */
    public function add(){
        $GoodsM = M("Goods");
        $condition['t_goods.isdel'] = 0;
        $condition['t_goods.stock'] = array('gt',0);
        $orderby['creatymd']='desc';
        $Goods = $GoodsM->field("t_goods.*,t_category.cat_id,t_category.cat_name")->where($condition)->join('LEFT JOIN t_category ON t_category.cat_id = t_goods.cat_id')->order($orderby)->select();
        $MemberM = M("Member");
        $condition0['t_member.state'] = array('neq',3);//状态0停用 1可用 3删除
        $orderby0['lastdateline']='desc';
        $Member = $MemberM->where($condition0)->order($orderby0)->select();
        $this->assign('Member',$Member);
        $this->assign('Goods',$Goods);
        $this->assign('currentname', $this->current );
        $this->display();
    }
    /* 进入修改页面 */
    public function edit(){
        
        $id = I('id');
        
        $GoodsM = M("Goods");
        $condition['t_goods.stock'] = array('gt',0);
        $condition['t_goods.isdel'] = 0;
        $orderby['creatymd']='desc';
//         $Goods = $GoodsM->field("t_goods.*,t_category.cat_id,t_category.cat_name")->where($condition)->join('LEFT JOIN t_category ON t_category.cat_id = t_goods.cat_id')->order($orderby)->select();
        
        $MemberM = M("Member");
        $condition0['t_member.state'] = array('neq',3);//状态0停用 1可用 3删除
        $orderby0['lastdateline']='desc';
        $Member = $MemberM->where($condition0)->order($orderby0)->select();
        
        $OrderM = M("Order");
        $condition1['order_id'] = $id;
        $Order = $OrderM->where($condition1)->find();
        
        $OrderGoodsM = M("OrderGoods");
        $condition2['order_id'] = $id;
        $OrderGoods = $OrderGoodsM ->field("t_goods.*,t_order_goods.*,t_order_goods.num + t_goods.stock as stock_old,t_category.cat_id,t_category.cat_name")->where($condition)->where($condition2)->join('LEFT JOIN t_goods ON t_goods.goods_id = t_order_goods.goods_id')->join('LEFT JOIN t_category ON t_category.cat_id = t_goods.cat_id')->order($orderby)->select();
        
        $this->assign('Member',$Member);
//         $this->assign('Goods',$Goods);
        $this->assign('Order',$Order);
        $this->assign('OrderGoods',$OrderGoods);
        $this->assign('currentname', $this->current );
        $this->display();
    }
    /* 进入查看页面 */
    public function detail(){
        
        $id = I('id');
        
        $GoodsM = M("Goods");
        $condition['t_goods.stock'] = array('gt',0);
        $condition['t_goods.isdel'] = 0;
        $orderby['creatymd']='desc';
//         $Goods = $GoodsM->field("t_goods.*,t_category.cat_id,t_category.cat_name")->where($condition)->join('LEFT JOIN t_category ON t_category.cat_id = t_goods.cat_id')->order($orderby)->select();
        
        $MemberM = M("Member");
        $condition0['t_member.state'] = array('neq',3);//状态0停用 1可用 3删除
        $orderby0['lastdateline']='desc';
        $Member = $MemberM->where($condition0)->order($orderby0)->select();
        
        $OrderM = M("Order");
        $condition1['order_id'] = $id;
        $Order = $OrderM->where($condition1)->find();
        
        $OrderGoodsM = M("OrderGoods");
        $condition2['order_id'] = $id;
        $OrderGoods = $OrderGoodsM ->field("t_goods.*,t_order_goods.*,t_order_goods.num + t_goods.stock as stock_old,t_category.cat_id,t_category.cat_name")->where($condition)->where($condition2)->join('LEFT JOIN t_goods ON t_goods.goods_id = t_order_goods.goods_id')->join('LEFT JOIN t_category ON t_category.cat_id = t_goods.cat_id')->order($orderby)->select();
        
        $this->assign('Member',$Member);
//         $this->assign('Goods',$Goods);
        $this->assign('Order',$Order);
        $this->assign('OrderGoods',$OrderGoods);
        $this->assign('currentname', $this->current );
        $this->assign('act', 'detail' );
        $this->display('edit');
    }
    /* 进入退货页面 */
    public function refund(){
        
        $id = I('id');
        
        $GoodsM = M("Goods");
        $condition['t_goods.stock'] = array('gt',0);
        $condition['t_goods.isdel'] = 0;
        $orderby['creatymd']='desc';
//         $Goods = $GoodsM->field("t_goods.*,t_category.cat_id,t_category.cat_name")->where($condition)->join('LEFT JOIN t_category ON t_category.cat_id = t_goods.cat_id')->order($orderby)->select();
        
        $MemberM = M("Member");
        $condition0['t_member.state'] = array('neq',3);//状态0停用 1可用 3删除
        $orderby0['lastdateline']='desc';
        $Member = $MemberM->where($condition0)->order($orderby0)->select();
        
        $OrderM = M("Order");
        $condition1['order_id'] = $id;
        $Order = $OrderM->where($condition1)->find();
        
        $OrderGoodsM = M("OrderGoods");
        $condition2['order_id'] = $id;
        $OrderGoods = $OrderGoodsM ->field("t_goods.*,t_order_goods.*,t_order_goods.num + t_goods.stock as stock_old,t_category.cat_id,t_category.cat_name")->where($condition)->where($condition2)->join('LEFT JOIN t_goods ON t_goods.goods_id = t_order_goods.goods_id')->join('LEFT JOIN t_category ON t_category.cat_id = t_goods.cat_id')->order($orderby)->select();
        
        $goods_ids = "";
        foreach ($OrderGoods as $value){
            $goods_ids = $goods_ids.$value['goods_id'].",";
        }
        $goods_ids = substr($goods_ids,0,-1);
        $this->assign('Member',$Member);
//         $this->assign('Goods',$Goods);
        $this->assign('Order',$Order);
        $this->assign('goods_ids',$goods_ids);
        $this->assign('OrderGoods',$OrderGoods);
        $this->assign('currentname', $this->current );
        $this->display();
    }
    /* 保存  */
    public function save(){
        $OrderM = M("Order");
        $GoodsM = M("Goods");
        $OrderGoodsM = M("OrderGoods");
        if(IS_POST){
            if($OrderM->create($_POST)){
                $OrderM->dateymd = date('Y-m-d',time());
                $OrderM->dateline = time();
                $OrderM->state = 1;//状态0停用1可用 3删除
                //更新
                if($_POST['order_id']!=null){
                    $result = $OrderM->save();
                }else{
                    $result = $OrderM->add(); 
                    if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值        
                        $insertId = $result;
                        $goods_ids = I("goods_ids");
                        $goods_ids_array = split(",",$goods_ids);
                        for ($i = 0; $i < sizeof($goods_ids_array); $i++) {
                            $goodsId = $goods_ids_array[$i];
                            if($goodsId!=null&&$goodsId!=''){
                                $goodsNum = I("deliveredNum".$goodsId);
                                $outPrice = I("outPrice".$goodsId);
                                //添加订单商品关系表
                                $dataList[] = array('order_id'=>$insertId,'goods_id'=>$goodsId,'num'=>$goodsNum,'price'=>$outPrice);
                                //减库存
                                $GoodsM->where('goods_id='.$goodsId)->setDec('stock',$goodsNum);
                            }
                        }
                        $result = $OrderGoodsM->addAll($dataList);
                    }
                }
                if($result){
                    $this->success('保存成功',U('Sales/index'));
                }else{
                    $this->error('保存失败',U('Sales/index'));
                }
            }else{
                $this->error('保存失败',U('Sales/index'));
            }
        }
    }
    /* 保存  */
    public function saverefund(){
        $OrderM = M("Order");
        $GoodsM = M("Goods");
        $OrderGoodsM = M("OrderGoods");
        $order_id = I("order_id");
        if(IS_POST){
            if($OrderM->create($_POST)){
                $OrderM->refund_time = date('Y-m-d',time());
                //更新
                $result = $OrderM->save(); 
                if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值        
                    $goods_ids = I("goods_ids");
                    $goods_ids_array = split(",",$goods_ids);
                    for ($i = 0; $i < sizeof($goods_ids_array); $i++) {
                        $goodsId = $goods_ids_array[$i];
                        if($goodsId!=null&&$goodsId!=''){
                            $refundNum = I("num_refund".$goodsId);
                            $goodsNum = I("deliveredNum".$goodsId);
                            $outPrice = I("outPrice".$goodsId);
                            //添加订单商品关系表
                            $dataList[] = array('order_id'=>$order_id,'goods_id'=>$goodsId,'num'=>$goodsNum,'price'=>$outPrice,'num_refund'=>$refundNum);
                            //加库存
                            $GoodsM->where('goods_id='.$goodsId)->setInc('stock',$refundNum);
                        }
                    }
                    //先删后加
                    $condition = 'order_id='.$order_id;
                    $result = $OrderGoodsM->where($condition)->delete();
                    //批量保存
                    $result = $OrderGoodsM->addAll($dataList);
                }
                if($result){
                    $this->success('保存成功',U('Sales/index'));
                }else{
                    $this->error('保存失败',U('Sales/index'));
                }
            }else{
                $this->error('保存失败',U('Sales/index'));
            }
        }
    }
    /* 删除  */
    public function delete(){
        $OrderM = M("Order");
        $id = I('order_id');
        if($id!=null){
            $OrderM->state = 3;//状态0停用1可用 3删除
            $result = $OrderM->where('order_id='.$id)->save(); 
            if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值        
                $insertId = $result;
                $this->redirect('Sales/index');
            }else{
                $this->error('保存失败',U('Sales/index'));
            }
        }
    }
    /* 更改订单状态  */
    public function status(){
        $OrderM = M("Order");
        $id = I('id');
        $order_status = I('order_status');
        if($id!=null){
            $OrderM->order_status = $order_status;//0已确认；1 已付款；2已发货；3已完成；4退货中；5退货完成
            $result = $OrderM->where('order_id='.$id)->save(); 
            if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值        
                $insertId = $result;
                $this->redirect('Sales/index');
            }else{
                $this->error('保存失败',U('Sales/index'));
            }
        }
    }
    /* 更改支付状态  */
    public function paystatus(){
        $OrderM = M("Order");
        $id = I('id');
        $pay_status = I('pay_status');
        if($id!=null){
            $OrderM->pay_status = $pay_status;//0已确认；1 已付款；2已发货；3已完成；4退货中；5退货完成
            $result = $OrderM->where('order_id='.$id)->save(); 
            if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值        
                $insertId = $result;
                $this->redirect('Sales/index');
            }else{
                $this->error('保存失败',U('Sales/index'));
            }
        }
    }
    /* 导出 */
    function export(){//导出Excel
        $condition['isdel'] = 0;
        $xlsModel = M('Order');
        $xlsData  = $xlsModel->Field('order_no,mid,order_type,order_status,pay_status,pay_type,num_total,amount_total,order_time')->where($condition)->select();
    
        $filename="订单信息";
        $headArr=array("订单号","用户信息","订单类型","订单状态","支付状态","支付类型","合计数量","合计金额","订单时间");
        $this->exportExcel($filename,$headArr,$xlsData);
    }
}