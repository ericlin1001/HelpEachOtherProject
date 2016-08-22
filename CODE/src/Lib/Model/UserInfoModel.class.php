<?php
class UserInfoModel extends Model{
	protected $_validate = array(
		array('username','require','No Username'),
		array('username','','Account exits',0,'unique',1),
		array('password','require','No password'),
		array('confirm','password','Password cannot match',0,'confirm'),
		array('email','require','No email'),
		array('email','email','Email format error'),
	);
}
?>
