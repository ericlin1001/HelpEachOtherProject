<?php
	class SubmissAction extends Action{
		public function submissForm()
		{
			session_start();
			if(isset($_SESSION["login"]) && $_SESSION["login"] == 1)
			{
				$PANEL = "submiss";
				$this->assign('panel',$PANEL);
				$this->display("Index:index");
			}
			else
				$this->error('You has not logined','../Login/loginForm');
		}

		public function submiss()
		{
			$Data = D('Submiss');
			if($Data->create())
			{
				$Data->subuid = $_SESSION["uid"];
				if($Data->add())
				{
					$PANEL = "index";
					$this->assign('panel',$PANEL);
					$this->success('Thank you for your submission','__ROOT__/index.php/Index/index');
				}
				else
				{
					$this->error($Data->getError());
				}
			}
			else
			{
				$this->error($Data->getError());
			}
		}
	}
?>
