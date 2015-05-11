<?php
namespace Erp\Controller;
use Think\Controller;
class GoodsController extends BaseController {
    public  $current = 'Goods';
    
    
    public function index(){
        $GoodsM = M("Goods");
        $condition['t_goods.isdel'] = 0;
        //分页查询
        $count = $GoodsM->where($condition)->count();
        $page = new \Think\Page($count, 10);
        $show = $page->show();
        $orderby['goods_id']='desc';
        $Goods = $GoodsM->field("t_goods.*,t_category.cat_id,t_category.cat_name")->where($condition)->join('LEFT JOIN t_category ON t_category.cat_id = t_goods.cat_id')->order($orderby)->limit( $page->firstRow.','.$page->listRows )->select();
        $this->assign('page',$show );
        $this->assign('currentname', $this->current );
        $this->assign('Goods',$Goods);
        $this->display();
    }
    
    /* 进入添加页面 */
    public function add(){
        //获取分类信息
        $CategoryM = M("Category");
        $condition['isdel'] = 0;
        $orderby['cat_id']='desc';
        $Category = $CategoryM->field("cat_id as id, pid as pId, cat_name as name")->where($condition)->order($orderby)->select();
        $result = array();
        foreach ($Category as $value){
            $items = array();
            $items['id'] = $value['id'];
            $items['pId'] = $value['pid'];
            $items['name'] = $value['name'];
            array_push($result, $items);
        }
        $this->assign('category', json_encode($result));
        $this->assign('currentname', $this->current );
        $this->display();
    }
    /* 进入修改页面 */
    public function edit(){
        $GoodsM = M("Goods");
        $goods_id = I("goods_id");
        if($goods_id!=null){
            $condition['goods_id'] = $goods_id;
            $Goods = $GoodsM->field("t_goods.*,t_category.cat_id,t_category.cat_name")->where($condition)->join('LEFT JOIN t_category ON t_category.cat_id = t_goods.cat_id')->find();
        }
        //获取分类信息
        $CategoryM = M("Category");
        $condition['isdel'] = 0;
        $orderby['cat_id']='desc';
        $Category = $CategoryM->field("cat_id as id, pid as pId, cat_name as name")->where($condition)->order($orderby)->select();
        $result = array();
        foreach ($Category as $value){
            $items = array();
            $items['id'] = $value['id'];
            $items['pId'] = $value['pid'];
            $items['name'] = $value['name'];
            array_push($result, $items);
        }
        $this->assign('category', json_encode($result));
        $this->assign('currentname', $this->current );
        $this->assign('Goods', $Goods );//商品
        $this->display();
    }
    /* 进入查看页面 */
    public function detail(){
        $GoodsM = M("Goods");
        $goods_id = I("goods_id");
        if($goods_id!=null){
            $condition['goods_id'] = $goods_id;
            $Goods = $GoodsM->field("t_goods.*,t_category.cat_id,t_category.cat_name")->where($condition)->join('LEFT JOIN t_category ON t_category.cat_id = t_goods.cat_id')->find();
        }
        $this->assign('currentname', $this->current );
        $this->assign('Goods', $Goods );//商品
        $this->assign('act', 'detail' );//detail 查看
        $this->display("edit");
    }
    
    /* 保存  */
    public function save(){
        $GoodsM = M("Goods");
        if(IS_POST){
            $out_price = $_POST['out_price'];
            $market_price = $_POST['market_price'];
            if(($market_price==null||$market_price=='')&&$out_price!=null){
                $market_price = $out_price*1.2;
            }else if($out_price==null){
                $market_price = 0;
            }
            $_POST['market_price'] = $market_price;
            if($GoodsM->create($_POST)){
                //更新操作
                if($_POST['goods_id']!=null){
                    $result = $GoodsM->save(); // 写入数据到数据库
                //新增    
                }else{
                    $GoodsM->stock = $_POST['in_num'];//入库数即为库存数
                    $GoodsM->dateymd = date('Y-m-d',time());
                    $GoodsM->dateline = time();
//                     $GoodsM->countamount = $GoodsM->stock*$GoodsM->in_price;//库存总额
//                     $GoodsM->salesamount = 0;//销售总额
                    $result = $GoodsM->add(); // 写入数据到数据库
                }
                if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值        
                    $insertId = $result;
                    $this->success('保存成功',U('Goods/index'));
                }else{
                    $this->error('保存失败',U('Goods/index'));
                }
            }
        }
    }
    /* 删除  */
    public function delete(){
        $GoodsM = M("Goods");
        $id = I('goods_id');
        if($id!=null){
            $GoodsM->isdel = 1;//是否可用1不可用 0可用
            $result = $GoodsM->where('goods_id='.$id)->save();
            if($result){        // 如果主键是自动增长型 成功后返回值就是最新插入的值
                $insertId = $result;
                $this->redirect('Goods/index');
            }else{
                $this->error('保存失败',U('Goods/index'));
            }
        }
    }
    /* 导出 */
    function export(){//导出Excel
        $xlsModel = M('Goods');
        $xlsData  = $xlsModel->Field('goods_id,goods_name,goods_sn,stock,unit,specification,out_price,in_price,creatymd')->select();
        
        $filename="商品信息";
        $headArr=array("商品ID","商品名称","商品代码","库存","单位","规格","销售价","进价","创建日期");
        $this->exportExcel($filename,$headArr,$xlsData);
    }
    
}