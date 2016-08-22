<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		session_start();
		if(isset($_SESSION["login"]) && $_SESSION["login"] == 1)
		{
			$PANEL = "index";
			$this->assign('panel',$PANEL);
			$this->display();
		}
		else
			$this->error('You has not logined','../Login/loginForm');
    }

	public function logout(){
		session_start();
		unset($_SESSION["login"]);
		unset($_SESSION["uid"]);
		unset($_SESSION["username"]);
		unset($_SESSION["gpp"]);
		session_destroy();
		$this->error('You has not logined','../Login/loginForm');
	}
}
