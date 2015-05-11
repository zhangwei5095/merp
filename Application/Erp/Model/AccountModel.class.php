<?php 
namespace Erp\Model;
use Think\Model;
class AccountModel extends Model {
    
    protected $tableName = 'account';
    
    protected $_validate = array(     
        array('admin_name','require','帐号名称不能为空！'), //默认情况下用正则进行验证     
//         array('admin_name','[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*','账号必须使用英文或数字！'), //默认情况下用正则进行验证     
//         array('admin_name','english','账号必须使用英文！'), //默认情况下用正则进行验证     
        array('admin_realname','require','真实姓名不能为空！'), //默认情况下用正则进行验证     
        array('admin_pwd','require','密码不能为空！'), //默认情况下用正则进行验证     
        array('admin_pwd_re','require','确认密码不能为空！'), //默认情况下用正则进行验证     
        array('admin_name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一     
//         array('email','email','Email格式错误'), // 在新增的时候验证name字段是否唯一     
        array('admin_pwd_re','admin_pwd','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致     
        //array('value',array(1,2,3),'值的范围不正确！',2,'in'), // 当值不为空的时候判断是否在一个范围内     
        //array('password','checkPwd','密码格式不正确',0/* ,'function' */), // 自定义函数验证密码格式   
    );
    protected $rules = array(
        array('admin_pwd','require','密码不能为空！'), //默认情况下用正则进行验证
        array('admin_pwd_re','require','确认密码不能为空！'), //默认情况下用正则进行验证
        array('admin_pwd_re','admin_pwd','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
        array('admin_pwd_old','checkPwd','旧密码错误',0,'callback'), // 自定义函数验证密码格式
    );
	// 删除
	public function delAccount($where) {
		if($where){
			return $this->where($where)->delete();
		}else{
			return false;
		}
	}
	public function checkPwd($admin_pwd_old) {
	    echo '<script language="javascript">alert("'.$admin_pwd_old.'");</script>';
	    if($admin_pwd_old){
	        $admin_id = $_SESSION['admin_id'];
	        $condition['admin_id'] = $admin_id;
	        $condition['admin_pwd'] = md5($admin_pwd_old);
	        $AccountM = D("Account");
	        $res = $AccountM->where($condition)->find();
	        if($res){
	            return true;
	        }else{
	            return false;
	        }
	    }else{
	        return false;
	    }
	}
}