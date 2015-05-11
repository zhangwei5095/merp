<?php
namespace Erp\Controller;
use Think\Controller;
class HelperController extends BaseController {
    
 public  $current = 'Helper';
    
    
    public function index(){
        $this->assign('currentname', $this->current );
        $this->display();
    }
    public function link(){
        $this->assign('currentname', $this->current );
        $this->display();
    }
    public function feedback(){
        $this->assign('currentname', $this->current );
        $this->display();
    }
    public function aboutus(){
        $this->assign('currentname', $this->current );
        $this->display();
    }
    public function buy(){
        $this->assign('currentname', $this->current );
        $this->display();
    }
    public function instruction(){
        $this->assign('currentname', $this->current );
        $this->display();
    }
    public function feedbacksubmit(){
        $title = I("title");
        $content = I("content");
        $contact = I("contact");
        $person = I("person");
        $title = "【进销存系统意见反馈】".$title;
        $content = "<br><strong>反馈内容：</strong><br>".$content."<br><br><br><strong>反馈人：</strong>".$person."<br><br><strong>反馈人联系方式：</strong>".$contact."";
        $result = SendMail($title,$content)?true:$mail->ErrorInfo;
        if($result){
            $this->success('提交成功',U('Helper/feedback'));
        }else{
            $this->error('提交失败',U('Helper/feedback'));
        }
    }
    
    
}