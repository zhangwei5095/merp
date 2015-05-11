<?php
namespace Erp\Controller;
use Think\Controller;
class HomeController extends BaseController {
    
    public  $current = 'Home';
    
    public function index(){
        $refresh = I('refresh');
        $HomeData = S('HomeData');
        $isRefresh = false;
        if($refresh==1||$HomeData==null){
            S('HomeData',null);
            $Goods = M("Goods");
            $OrderGoodsM = M("OrderGoods");
            $condition['isdel'] = 0;
            $goodscount = $Goods->count();
            //库存总金额
            $countamount = $Goods->query('select sum(stock*in_price) as countamount ,sum(stock) as stock from t_goods ');
            $countamount = $countamount[0]['countamount'];
            $stock = $Goods->sum('stock');
            $countamount = round($countamount ,2);
            $salesamount = $OrderGoodsM->query('select sum((num-num_refund)*price) as salesamount from t_order_goods LIMIT 1');
            $salesamount = $salesamount[0]['salesamount'];
            $salesamount = round($salesamount ,2);
            $sql = "SELECT t_goods.goods_name, t_order_goods.goods_id,sum(t_order_goods.num-t_order_goods.num_refund) as a,sum((t_order_goods.num-t_order_goods.num_refund)*t_order_goods.price) as b FROM `t_order_goods` left join t_goods on t_goods.goods_id = t_order_goods.goods_id where t_goods.isdel=0 group by (goods_id) ORDER BY a desc LIMIT 5   ";
            $salestop = $OrderGoodsM->query($sql);
//             $salestop = $OrderGoodsM->field('goods_id,sum(goods_id*(num-num_refund) as a ')->group('goods_id')->order(' a desc')->limit(5)->select();
            $goodsstock = $Goods->field('goods_name,goods_id,stock')->where($condition)->where("stock<=warn_stock")->limit(5)->select();

            //添加数据到缓存
            $HomeData['goodscount'] = $goodscount;
            $HomeData['stock'] = $stock;
            $HomeData['countamount'] = $countamount;
            $HomeData['salesamount'] = $salesamount;
            $HomeData['salestop'] = $salestop;
            $HomeData['goodsstock'] = $goodsstock;
            S('HomeData',$HomeData,300);
        }else{//从缓存中获取数据
            $goodscount = $HomeData['goodscount'];
            $stock = $HomeData['stock'];
            $countamount = $HomeData['countamount'];
            $salesamount = $HomeData['salesamount'];
            $salestop = $HomeData['salestop'];
            $goodsstock = $HomeData['goodsstock'];
        }
        $this->assign('goodscount',$goodscount);//商品總數
        $this->assign('stock',$stock);//库存總數
        $this->assign('countamount',$countamount);//库存商品总价
        $this->assign('salesamount',$salesamount);//销售的总金额
        $this->assign('salestop',$salestop);//销售排行
        $this->assign('goodsstock',$goodsstock);//缺貨商品
        $this->assign('currentname', $this->current );
        $this->display();
    }
    
}