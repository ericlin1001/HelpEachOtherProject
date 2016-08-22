<?php
class LoginAction extends Action{
	public function login(){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$Login = new Model();
		$Data = $Login->query('select uid,username,password,gpp from think_user_info where username="'.$username.'"');
		echo "123" == 123;
		if($Data)
		{
			$Password = $Data[0]["password"];
			if($Password == $password)
			{
				session_start();
				$_SESSION["uid"] = $Data[0]["uid"];
				$_SESSION["username"] = $Data[0]["username"];
				$_SESSION["gpp"] = $Data[0]["gpp"];
				$_SESSION["login"] = 1;
				$this->success("Login successfully","../Index/index");
			}
			else
			{
				$this->error("Password error");
			}
		}
		else
		{
			$this->error("Username ".$username." not found");
		}
	}
}
?>
