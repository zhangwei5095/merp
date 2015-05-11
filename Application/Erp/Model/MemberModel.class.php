<?php 
namespace Erp\Model;
use Think\Model;
class MemberModel extends Model {
    
    //protected $tableName = 'account';
    
    protected $_validate = array(     
        array('realname','require','真实姓名不能为空！'), //默认情况下用正则进行验证     
        /* array('membercardid','require','会员卡号不能为空！'), //默认情况下用正则进行验证      */
        /* array('zipcode','zip','邮编格式错误！'), //默认情况下用正则进行验证     
        array('email','email','Email格式错误'), // 在新增的时候验证name字段是否唯一      */
    );
    
    
	// 删除
	public function delAccount($where) {
		if($where){
			return $this->where($where)->delete();
		}else{
			return false;
		}
	}

}