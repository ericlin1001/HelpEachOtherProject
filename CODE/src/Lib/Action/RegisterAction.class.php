<?php
class RegisterAction extends Action{
	public function register(){
		$Register = D('UserInfo');
		if($Register->create())
		{
			if($Register->add())
			{
				$this->success("Operate successfully","../Login/loginForm");
			}
			else
			{
				$this->error("Operate error");
			}
		}
		else
		{
			$this->error($Register->getError());
		}
	}
}
?>
