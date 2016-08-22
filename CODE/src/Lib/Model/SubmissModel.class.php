<?php
class SubmissModel extends Model{
	protected $_validate = array(
		array('subcontent','require','No Submission Content'),
				);
}
?>
