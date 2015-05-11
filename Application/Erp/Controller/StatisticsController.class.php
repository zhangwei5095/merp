<?php
namespace Erp\Controller;

use Think\Controller;

class StatisticsController extends BaseController {
    
    public  $current = 'Statistics';
    
    public function index(){
        $this->assign('currentname', $this->current );
        $this->display();
    }
    
    //销售数量统计
    public function sales(){
        $OrderGoodsM = M("OrderGoods");
        $act = I("act");
        $op = I("op");
        $begintime = I("begintime");
        $begintimestr = "";
        $endtime = I("endtime");
        $endtimestr = "";
        if($endtime==null){
            $endtime = date('Y-m-d',time());
            $endtimestr = " DATE_FORMAT('".$endtime."','%Y-%m-%d')";
        }else{
            $endtimestr = " DATE_FORMAT('".$endtime."','%Y-%m-%d')";
        }
        if($begintime==null){
            $new = date('Y-m-d',strtotime("$endtime-1 year"));
            $begintime = $new;
            $begintimestr = " DATE_FORMAT(date_sub('".$endtime."',interval 1 year),'%Y-%m-%d')";
        }else{
            $begintimestr = " DATE_FORMAT('".$begintime."','%Y-%m-%d')";
        }
        if($act==1){
            $actstr = "%Y-%m-%d";
        }else{
            $actstr = "%Y-%m";
        }
        $sql1 = '';
        if($op=='salesnum'){//销售数量
            $sql1 = 'num_total';
        }else if($op=='salesamount'){//销售金额
            $sql1 = 'amount_total-amount_refund+amount_freight';
        }else if($op=='salesprofit'){//销售利润
            $sql1 = 'amount_total-amount_refund-amount_in_price+amount_freight';
        }else if($op=='refundnum'){//退货数量
            $sql1 = 'num_refund';
        }else if($op=='refundamount'){//退货金额
            $sql1 = 'amount_refund';
        }
        $sql = "select DATE_FORMAT(order_time,'".$actstr."') as month,sum(".$sql1.") as total from t_order where order_time <= ".$endtimestr." and order_time >= ".$begintimestr." group by month order by month";
        $OrderGoods = $OrderGoodsM ->query($sql);
        $line = '';
        $m = 0;
        if (is_array ( $OrderGoods )) {
            $a = array();
            foreach ( $OrderGoods as $value ) {
                $a[$value['month']] = $value['total'];
                $line .= "['". $value['month']."','". $value['total']."'],";
            }
            $m = intval(max($a))+intval(max($a))*0.1;
            $min = intval(min($a));
        }
        if($min>0){
            $min = 0;
        }
        $this->assign('line',$line);
        $this->assign('act',$act!=null?$act:1);
        $this->assign('currentname', $this->current );
        $this->assign('begintime',$begintime);
        $this->assign('endtime',$endtime);
        $this->assign('op',$op);
        $this->assign('m',$m);
        $this->assign('min',$min);
        $this->assign('OrderGoods',$OrderGoods);
        $this->assign('msg',json_encode($OrderGoods));
        $this->display($op);
    }
    //商品
    public function goods(){
        $OrderGoodsM = M("OrderGoods");
        $op = I("op");
        $begintime = I("begintime");
        $begintimestr = "";
        $endtime = I("endtime");
        $endtimestr = "";
        if($endtime==null){
            $endtime = date('Y-m-d',time());
            $endtimestr = " DATE_FORMAT('".$endtime."','%Y-%m-%d')";
        }else{
            $endtimestr = " DATE_FORMAT('".$endtime."','%Y-%m-%d')";
        }
        if($begintime==null){
            $new = date('Y-m-d',strtotime("$endtime-1 year"));
            $begintime = $new;
            $begintimestr = " DATE_FORMAT(date_sub('".$endtime."',interval 1 year),'%Y-%m-%d')";
        }else{
            $begintimestr = " DATE_FORMAT('".$begintime."','%Y-%m-%d')";
        }
        $sql1 = '';
        if($op=='goodsnum'){//销售数量
            $sql1 = 'num';
        }else if($op=='goodsamount'){//销售金额
            $sql1 = 'num*price+t_order.amount_freight';
        }else if($op=='goodsprofit'){//销售利润
            $sql1 = 'num * (t_order_goods.price-t_goods.in_price)+t_order.amount_freight';
        }
        $sql = "select 	t_order_goods.goods_id,	t_goods.goods_name,sum(".$sql1.") as total from t_order LEFT JOIN t_order_goods ON t_order_goods.order_id = t_order.order_id LEFT JOIN t_goods on t_goods.goods_id = t_order_goods.goods_id where order_time <= ".$endtimestr." and order_time >= ".$begintimestr." group by goods_id order by total";
        $OrderGoods = $OrderGoodsM ->query($sql);
        $line = '';
        $line2 = '';
        $m = 0;
        if (is_array ( $OrderGoods )) {
            $a = array();
            foreach ( $OrderGoods as $value ) {
                $a[$value['goods_name']] = $value['total'];
                $line .= "['". $value['goods_name']."','". $value['total']."'],";
                $line2 .= "['". $value['goods_name']."',". $value['total']."],";
            }
            $m = intval(max($a))+intval(max($a))*0.1;
            $min = intval(min($a));
        }
        if($min>0){
            $min = 0;
        }
        $this->assign('line',$line);
        $this->assign('line2',$line2);
        $this->assign('act',$act!=null?$act:1);
        $this->assign('currentname', $this->current );
        $this->assign('begintime',$begintime);
        $this->assign('endtime',$endtime);
        $this->assign('op',$op);
        $this->assign('m',$m);
        $this->assign('min',$min);
        $this->assign('OrderGoods',$OrderGoods);
        $this->assign('msg',json_encode($OrderGoods));
        $this->display($op);
    }
    
    //消费统计
    public function consume(){
        $OrderGoodsM = M("OrderGoods");
        $op = I("op");
        $begintime = I("begintime");
        $begintimestr = "";
        $endtime = I("endtime");
        $endtimestr = "";
        if($endtime==null){
            $endtime = date('Y-m-d',time());
            $endtimestr = " DATE_FORMAT('".$endtime."','%Y-%m-%d')";
        }else{
            $endtimestr = " DATE_FORMAT('".$endtime."','%Y-%m-%d')";
        }
        if($begintime==null){
            $new = date('Y-m-d',strtotime("$endtime-1 year"));
            $begintime = $new;
            $begintimestr = " DATE_FORMAT(date_sub('".$endtime."',interval 1 year),'%Y-%m-%d')";
        }else{
            $begintimestr = " DATE_FORMAT('".$begintime."','%Y-%m-%d')";
        }
        $sql1 = '';
        if($op=='consumenum'){//会员消费数量
            $sql1 = 'num_total';
        }else if($op=='consumeamount'){//销售金额
            $sql1 = 'amount_total-amount_refund+amount_freight';
        }else if($op=='consumeprofit'){//销售利润
            $sql1 = 'amount_total-amount_refund-amount_in_price+amount_freight';
        }
        $sql = "select t_member.realname AS name,t_member.mid,sum(".$sql1.") as total from t_order left JOIN t_member on t_member.mid = t_order.mid  where order_time <= ".$endtimestr." and order_time >= ".$begintimestr."  group by mid order by total";
        
        $OrderGoods = $OrderGoodsM ->query($sql);
        $line = '';
        $line2 = '';
        $m = 0;
        if (is_array ( $OrderGoods )) {
            
            $a = array();
            foreach ( $OrderGoods as $value ) {
                $a[$value['name']] = $value['total'];
                $line .= "['". $value['name']."','". $value['total']."'],";
                $line2 .= "['". $value['name']."',". $value['total']."],";
            }
            $m = intval(max($a))+intval(max($a))*0.1;
            $min = intval(min($a));
        }
        if($min>0){
            $min = 0;
        }
        $this->assign('line',$line);
        $this->assign('line2',$line2);
        $this->assign('currentname', $this->current );
        $this->assign('begintime',$begintime);
        $this->assign('endtime',$endtime);
        $this->assign('op',$op);
        $this->assign('m',$m);
        $this->assign('min',$min);
        $this->assign('OrderGoods',$OrderGoods);
        $this->assign('msg',json_encode($OrderGoods));
        $this->display($op);
    }
    
    //采购统计
    public function purchase(){
        $PurchaseM = M("Purchase");
        $act = I("act");
        $op = I("op");
        $begintime = I("begintime");
        $begintimestr = "";
        $endtime = I("endtime");
        $endtimestr = "";
        if($endtime==null){
            $endtime = date('Y-m-d',time());
            $endtimestr = " DATE_FORMAT('".$endtime."','%Y-%m-%d')";
        }else{
            $endtimestr = " DATE_FORMAT('".$endtime."','%Y-%m-%d')";
        }
        if($begintime==null){
            $new = date('Y-m-d',strtotime("$endtime-1 year"));
            $begintime = $new;
            $begintimestr = " DATE_FORMAT(date_sub('".$endtime."',interval 1 year),'%Y-%m-%d')";
        }else{
            $begintimestr = " DATE_FORMAT('".$begintime."','%Y-%m-%d')";
        }
        if($act==1){
            $actstr = "%Y-%m-%d";
        }else{
            $actstr = "%Y-%m";
        }
        $sql1 = '';
        if($op=='purchasenum'){
            $sql1 = 'in_num';
        }else if($op=='purchaseamount'){
            $sql1 = 'payment';
        }else if($op=='purchaseprofit'){
            $sql1 = 'amount_total-amount_refund';
        }
        $sql = "select DATE_FORMAT(dateymd,'".$actstr."') as month,sum(".$sql1.") as total from t_purchase where dateymd <= ".$endtimestr." and dateymd >= ".$begintimestr." group by month order by month";
        $Purchase = $PurchaseM ->query($sql);
        $line = '';
        $m = 0;
        if (is_array ( $Purchase )) {
            
            $a = array();
            foreach ( $Purchase as $value ) {
                $a[$value['month']] = $value['total'];
                $line .= "['". $value['month']."','". $value['total']."'],";
            }
            $m = intval(max($a))+5;
            $min = intval(min($a));
        }
        if($min>0){
            $min = 0;
        }
        $this->assign('line',$line);
        $this->assign('act',$act!=null?$act:1);
        $this->assign('Purchase',$Purchase);
        $this->assign('currentname', $this->current );
        $this->assign('begintime',$begintime);
        $this->assign('endtime',$endtime);
        $this->assign('m',$m);
        $this->assign('op',$op);
        $this->assign('min',$min);
        $this->assign('msg',json_encode($Purchase));
        $this->display($op);
    }
}