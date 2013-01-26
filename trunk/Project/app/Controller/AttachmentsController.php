<?php
class AttachmentsController extends AppController{
 	public $helpers = array ('html','form');
 	public $name = 'Attachments';
 	var $scaffold;
 	
 	
 	public function index(){
		$this->set('title_for_layout', 'Attachments');
 		$this -> layout = 'index';
 		$this -> set ('attachments', $this-> Attachment->find('all', array('conditions'=> array('Attachment.removed !=' => 1))));
 	}
}
?>
