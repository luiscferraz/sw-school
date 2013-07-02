<?php
class AttachmentsController extends AppController{
 	public $helpers = array ('Html','Form','Js'=>array('Jquery'));
 	public $name = 'Attachments';
 	public $useTable = 'attachments';
 	var $scaffold;
 	
 	
 	public function index(){
		$this->set('title_for_layout', 'Anexos');
 		$this -> layout = 'base';
 		$this -> set ('attachments', $this-> Attachment->find('all', array('conditions'=> array('Attachment.removed !=' => 1))));
 	}
}
?>
