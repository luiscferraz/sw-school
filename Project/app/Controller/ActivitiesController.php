<?php

 class ActivitiesController extends AppController{
 	public $helpers = array ('html','form');
 	public $name = 'Activities';
 	var $scaffold;
 	
 	
 	public function index(){
		$this->set('title_for_layout', 'Activities');
 		$this -> layout = 'index';
 		$this -> set ('activities', $this-> Activity->find('all', array('conditions'=> array('Activity.removed !=' => 1))));
 				 
 	}
 	
	public function AjaxListConsultant(){
		$name = $this->Activity->Consultant->findAll();
		return $name['Consultant'];
	}
 }
?>
