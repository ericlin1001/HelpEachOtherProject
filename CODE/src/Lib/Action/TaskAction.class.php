<?php
	class TaskAction extends Action{
		public function poseTaskForm(){
			session_start();
			if(isset($_SESSION["login"]) && $_SESSION["login"] == 1)
			{
				$PANEL = "poseTask";
				$this->assign('panel',$PANEL);
				$this->display("Index:index");
			}
			else
				$this->error('You has not logined','../Login/loginForm');
		}
		
		public function poseTask(){
			$Data = D('TaskInfo');
			if($Data->create())
			{
				if($Data->add())
				{
					$PANEL = "index";
					$this->assign('panel',$PANEL);
					$this->success("Operation successfully","__ROOT__/index.php/Index/index");
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

		public function receiveTask()
		{
			$TID = $_POST["tid"];
			$SQL = new Model();
			$sql = 'select pid,rid from think_task_info where tid ="'.$TID.'"';
			$Data = $SQL->query($sql);
			if($Data)
			{
				$RID = $Data[0]["rid"];
				$PID = $Data[0]["pid"];
				if($RID != -1)
				{
					$this->error("This Task has been received","__ROOT__/index.php/Index/index");
				}
				else if($PID == $_SESSION["uid"])
				{
					$this->error("You cannot receive task posed by yourself","__ROOT__/index.php/Index/index");
				}
				else
				{
					$sql = 'update think_task_info set rid ="'.$_SESSION["uid"].'",status="Received" where tid ="'.$TID.'"';
					$result = $SQL->execute($sql);
					if($result)
						$this->success("You have received this task successfully","__ROOT__/index.php/Index/index");
					else
						$this->error("Error","__ROOT__/index.php/Index/index");
				}
			}
			else
				$this->error("Error","__ROOT__/index.php/Index/index");
			//$this->display("Index:index");
		}

		public function viewTaskForm()
		{
			session_start();
			if(isset($_SESSION["login"]) && $_SESSION["login"] == 1)
			{
				$PANEL = "viewTask";
				$this->assign('panel',$PANEL);
				$this->display("Index:index");
			}
			else
				$this->error('You has not logined','../Login/loginForm');
		}

		public function viewTask()
		{
			$result = $this->searchTask($_POST["key"],$_POST["type"],$_POST["status"],$_POST["viewTask"]);
			$count = $result[0];
			$Data = $result[1];
			if($Data)
			{
				$PANEL = "viewTask";
				$this->assign('data',$Data);
				$this->assign('count',$count);
				$this->assign('panel',$PANEL);
				$this->display("Index:index");
			}
			else
				$this->display("Index:index");
		}

		public function searchTask($key,$type = "all_type",$status = "all_sataus",$viewTask = "View Task")
		{
			$SQL = new Model();
			$search_key = '"%'.$key.'%"';
			$where = 'from think_task_info,think_user_info as poser,think_user_info as receiver where ( think_task_info.pid = poser.uid ) and ( think_task_info.rid = receiver.uid ) and ( title like '.$search_key.' or description like '.$search_key.' or note like '.$search_key.' or poser.username like '.$search_key.' or receiver.username like '.$search_key.')';
			if($type != "all_type")
				$where = $where.' and type = "'.$_POST["type"].'"';
			if($status != "all_status")
				$where = $where.' and status = "'.$_POST["status"].'"';
			if($viewTask == 'View My Pose Task')
				$where = $where.' and pid ="'.$_SESSION["uid"].'"';
			if($viewTask == 'View My Received Task')
				$where = $where.' and rid ="'.$_SESSION["uid"].'"';
			$select = 'tid,pid,rid,title,description,availabletime,accomplishtime,taskgpp,note,status,poser.username as poser_name,receiver.username as receiver_name';
			$select2 = 'title';
			$sql = 'select '.$select.' '.$where;
			$sql2 = 'select count('.$select2.') as count '.$where;
			$Data = $SQL->query($sql);
			$count = $SQL->query($sql2);
			return array($count,$Data);
		}

		public function deleteTask()
		{
			$TID = $_POST["tid"];
			$SQL = new Model();
			$sql = 'delete from think_task_info where tid = "'.$TID.'"';
			$result = $SQL->execute($sql);
			if($result)
			{
				$this->success("Delete This Task successfully","__ROOT__/index.php/Index/index");
			}
		}
		
		public function searchUserForm()
		{
			session_start();
			if(isset($_SESSION["login"]) && $_SESSION["login"] == 1)
			{
				$PANEL = "searchUser";
				$this->assign('panel',$PANEL);
				$this->display("Index:index");
			}
			else
				$this->error('You has not logined','../Login/loginForm');
		}

		public function searchUser()
		{
			$USER = $_POST["user"];
			$SQL = new Model();
			$search_key = '"%'.$USER.'%"';
			$where = 'where uid != -1 and username like '.$search_key;
			$sql = 'select * from think_user_info '.$where;
			$sql2 = 'select count(*) as count from think_user_info '.$where;
			$Data = $SQL->query($sql);
			$count = $SQL->query($sql2);
			if($Data)
			{
				$PANEL = "searchUser";
				$this->assign('user',$Data);
				$this->assign('user_count',$count);
				$this->assign('panel',$PANEL);
				$this->display("Index:index");
			}
			else
				$this->display("Index:index");
		}
		
		public function agreeCancelTask()
		{
			$MID = $_POST["mid"];
			$MTYPE = $_POST["mtype"];
			$MTID = $_POST["mtid"];
			$SQL = new Model();
			$sql = 'update think_task_info set rid = "-1",status = "NewPose" where tid = "'.$MTID.'"';
			$sql2 = 'delete from think_message where mid = "'.$MID.'"';
			$result = $SQL->execute($sql);
			$result = $SQL->execute($sql2);
			if($result)
			{
				if($MTYPE == "10")
					$this->success("You have cancel your posed task","__ROOT__/index.php/Index/index");
				else if($MTYPE == "20")
					$this->success("You have cancel your received task","__ROOT__/index.php/Index/index");

			}
			else
			{
				$this->error("Error","__ROOT__/index.php/Index/index");
			}
		}
		
		public function disagreeCancelTask()
		{
			$deductGPP = 5;
			$MID = $_POST["mid"];
			$MTYPE = $_POST["mtype"];
			$MTID = $_POST["mtid"];
			$MSID = $_POST["msid"];
			$SQL = new Model();
			$sql = 'update think_task_info set rid = "-1",status = "NewPose" where tid = "'.$MTID.'"';
			$sql2 = 'delete from think_message where mid = "'.$MID.'"';
			$sql3 = 'update think_user_info set gpp = gpp - '.$deductGPP.' where uid = "'.$MSID.'"';
			$result = $SQL->execute($sql);
			$result = $SQL->execute($sql2);
			$result = $SQL->execute($sql3);

			if($result)
			{
				if($MTYPE == "10")
					$this->success('You disagree the request,but the task is still be cancelled,and the poser has been punished.',"__ROOT__/index.php/Index/index");
				else if($MTYPE == "20")
					$this->success('You disagree the request,but the task is still be cancelled,and the receiver has been punished.',"__ROOT__/index.php/Index/index");
			}
			else
			{
				$this->error("error","__ROOT__/index.php/Index/index");
			}
			
		}

		public function accomplishTask()
		{
			$TID = $_POST["tid"];
			$SQL = new Model();
			$sql = 'update think_task_info set status = "Accomplished" where tid = "'.$TID.'"';
			$result = $SQL->execute($sql);
			if($result)
			{
				$this->success("Task Accomplished","__ROOT__/index.php/Index/index");
			}
			else
			{
				$this->error("error","__ROOT__/index.php/Index/index");
			}
		}
    }
?>
