<?php
class MessageModel extends Model
{
	protected $_validate = array(
			array('content','1,255','String Length must be less than 255',0,'length'),
			array('mtype','checkUnique','This request has been sent',0,'function'),
				);
}

function checkUnique()
{
	if($_POST["mtype"] == "1000")
		return true;
	else
	{
		$SQL = new Model();
		$sql = 'select * from think_message where msid ="'.$_POST["msid"].'" and mrid = "'.$_POST["mrid"].'" and mtid = "'.$_POST["mtid"].'" and mtype = "'.$_POST["mtype"].'" and content = "'.$_POST["content"].'"';
		$Data = $SQL->query($sql);
		if($Data)
			return false;
		else
			return true;
	}
}
?>
