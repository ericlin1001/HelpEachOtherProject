<?php
class MessageAction extends Action
{
	public function sendMessageAtom($msid,$mrid,$mtid,$mtype,$content)
	{
		$SQL = new Modle();
		$sql = 'insert into think_message(msid,mrid,mtid,mtype,content) values("'.$msid.'","'.$rid.'","'.$tid.'","'.$mtype.'","'.$content.'"';
		$result = $SQL->execute($sql);
	}

	public function sendMessage()
	{
		$Data = D('Message');
		if($Data->create())
		{
			if($Data->add())
			{
				$MTYPE = $_POST["mtype"];
				if($MTYPE == "1000")
					$this->success("Send Message Successfully","__ROOT__/index.php/Index/index");
				else if($MTYPE == "10" || $MTYPE == "20")	//cancel posed task
					$this->success("Send Request Successfully","__ROOT__/index.php/Index/index");
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

	public function viewMessage()
	{
		$SQL = new Model();
		$where = 'from think_message,think_user_info where think_message.msid = think_user_info.uid and mrid = "'.$_SESSION["uid"].'"';
		$sql = 'select * '.$where;
		$sql2 = 'select count(*) as count '.$where;
		$sql3 = 'update think_message set mtype = "1001" where mtype = "1000" and mrid = "'.$_SESSION["uid"].'"';
		$Data = $SQL->query($sql);
		$count = $SQL->query($sql2);
		$result = $SQL->execute($sql3);
		if($Data)
		{
			$PANEL = "message";
			$this->assign('message',$Data);
			$this->assign('message_count',$count);
			$this->assign('panel',$PANEL);
			$this->display('Index:index');
		}
		else
		{
			$this->display('Index:index');
		}
	}

	public function checkMessage()
	{
		$SQL = new Model();
		$sql = 'select * from think_message where mrid = "'.$_SESSION["uid"].'" and mtype != "1001"';
		$Data = $SQL->query($sql);
		if($Data)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
}
?>
