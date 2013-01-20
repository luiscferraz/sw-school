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
	
	public function add(){
	 	$this->layout = 'base';
	 	if($this->request->is('post')){
	 		if($this->Activity->saveAll($this->request->data)){
	 			$this->Session->setFlash('A atividade foi adicionada com sucesso.');
          		$this->redirect(array('action' => 'index'));
	 		}
	 		else{
				$this->Session->setFlash($this->flashError('Erro ao cadastrar atividade!'));
			}				
	 	}	 	
		else{			
			$this->Session->setFlash($this->Session->setFlash($this->flashError('A atividade não foi adicionada. Tente novamente!')));			
		}
	 	
	 }
	 
	public function delete($id = NULL){
		$this->Activity->id = $id;
		if($this->Activity->saveField("removed", "true")){
			$this->Session->setFlash('A atividade foi removida com sucesso!');
			$this->redirect(array('action' => 'index'));
		}
	}
	 
	 	
}
?>
