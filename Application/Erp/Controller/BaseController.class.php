<?php
namespace Erp\Controller;
use Think\Controller;
class BaseController extends Controller {
    
    public $user;
    
    public function _initialize(){
        $user = $this->saveCurrentUserSession();
        $user_gid = $this->getCurrentUserSession();
        $actionName = strtolower(ACTION_NAME);
        //登录信息为null
        if (empty($user)) {
            if (!in_array($actionName, array("login", "checklogin"))) {
                header("location: " . U("Login/login"));
                exit;
            } 
        }else if($user_gid!=1){//1：超级管理员  2：普通管理员
            if (!in_array($actionName, array("index","index","editpwd","savepwd","logout","login","checklogin","detail"))) {
                //header("location: " . U("Login/login"));
                $this->error('权限不足',U('Home/index'));
                exit;
            }
        }
          $this->user = $user;
      }
      function saveCurrentUserSession() {
            return isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] :null;
      }
      function getCurrentUserSession() {
            return isset($_SESSION['admin_gid']) ? $_SESSION['admin_gid'] :null;
      }
      
      
      public function exportExcel($filename,$headArr,$data){
          //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
          import("Org.Util.PHPExcel");
          import("Org.Util.PHPExcel.Writer.Excel5");
          import("Org.Util.PHPExcel.IOFactory.php");
          $this->getExcel($filename,$headArr,$data);
      }
      
      private	function getExcel($fileName,$headArr,$data){
          //对数据进行检验
          if(empty($data) || !is_array($data)){
              die("data must be a array");
          }
          //检查文件名
          if(empty($fileName)){
              exit;
          }
      
          $date = date("Y_m_d H:i:s",time());
          $fileName .= "_{$date}.xls";
      
          //创建PHPExcel对象，注意，不能少了\
          $objPHPExcel = new \PHPExcel();
          $objProps = $objPHPExcel->getProperties();
          	
          //设置表头
          $key = ord("A");
          foreach($headArr as $v){
              $colum = chr($key);
              $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
              $key += 1;
          }
          $objPHPExcel->getActiveSheet()->getColumnDimension("B")->setWidth(20000);  
          $objPHPExcel->getActiveSheet()->getColumnDimension("A")->setWidth(10000);  
          $column = 2;
          $objActSheet = $objPHPExcel->getActiveSheet();
          foreach($data as $key => $rows){ //行写入
              $span = ord("A");
              foreach($rows as $keyName=>$value){// 列写入
                  $j = chr($span);
                  $objActSheet->setCellValue($j.$column, $value);
                  $span++;
              }
              $column++;
          }
      
          $fileName = iconv("utf-8", "gb2312", $fileName);
          //重命名表
          // $objPHPExcel->getActiveSheet()->setTitle('test');
          //设置活动单指数到第一个表,所以Excel打开这是第一个表
          $objPHPExcel->setActiveSheetIndex(0);
          header('Content-Type: application/vnd.ms-excel');
          header("Content-Disposition: attachment;filename=\"$fileName\"");
          header('Cache-Control: max-age=0');
      
          $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
          $objWriter->save('php://output'); //文件通过浏览器下载
          exit;
      }
}