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
    
    
    
    
    public function dbback(){
        // 备份数据库
        $host = C('DB_HOST');
        $user = C('DB_USER'); //数据库账号
        $password = C('DB_PWD'); //数据库密码
        $dbname = C('DB_NAME'); //数据库名称
        // 这里的账号、密码、名称都是从页面传过来的
        if (!mysql_connect($host, $user, $password)) // 连接mysql数据库
        {
//             echo '数据库连接失败，请核对后再试';
            $this->error('数据库连接失败，请核对后再试',U('Home/index'));
            exit;
        }
        if (!mysql_select_db($dbname)) // 是否存在该数据库
        {
//             echo '不存在数据库:' . $dbname . ',请核对后再试';
            $this->error('不存在数据库:' . $dbname . ',请核对后再试',U('Home/index'));
            exit;
        }
        mysql_query("set names 'utf8'");
        $mysql = "set charset utf8;\r\n";
        $q1 = mysql_query("show tables");
        while ($t = mysql_fetch_array($q1))
        {
            $table = $t[0];
            $q2 = mysql_query("show create table `$table`");
            $sql = mysql_fetch_array($q2);
            $mysql .= $sql['Create Table'] . ";\r\n";
            $q3 = mysql_query("select * from `$table`");
            while ($data = mysql_fetch_assoc($q3))
            {
                $keys = array_keys($data);
                $keys = array_map('addslashes', $keys);
                $keys = join('`,`', $keys);
                $keys = "`" . $keys . "`";
                $vals = array_values($data);
                $vals = array_map('addslashes', $vals);
                $vals = join("','", $vals);
                $vals = "'" . $vals . "'";
                $mysql .= "insert into `$table`($keys) values($vals);\r\n";
            }
        }
        
        $filename = $dbname . time() . ".sql"; //存放路径，默认存放到项目最外层
        $fp = fopen($filename, 'w');
        fputs($fp, $mysql);
        fclose($fp);
        
//         echo "数据备份成功";
        $this->success('路径：'.$_SERVER['DOCUMENT_ROOT']."/".$filename,U('Home/index'),6);
        
    }
}