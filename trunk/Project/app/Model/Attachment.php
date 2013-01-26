<?php
class Attachment extends AppModel{
	
	public $name = 'Attachment';
	public $useTable = 'attachments';
	var $belongsTo = array('Activities');
	
}
?>
