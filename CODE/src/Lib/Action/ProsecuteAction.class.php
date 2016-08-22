<?php
class ProsecuteAction extends Action{
	public function prosecute()
	{
		$Data = D('Prosecute');
		if($Data->create())
		{
			if($Data->add())
			{
				$this->success('Thank you for your prosecution','__ROOT__/index.php/Index/index');
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
