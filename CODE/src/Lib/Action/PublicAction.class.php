<?php
class PublicAction extends Action{
	public function check_login(){
		session_start();
		if(isset($_SESSION["login"]) && $_SESSION["login"] == 1)
			$this->display();
		else
			$this->error('You has not logined','../Login/loginForm');

	}
}
?>
