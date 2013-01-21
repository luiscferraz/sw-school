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
		$this-> set ('projects',$this->Activity->Project->find('all'), array('conditions'=> array('Project.removed !=' => 1)));
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
	
	public function edit($id = NULL){
		$this->layout = 'base';
		$this-> set ('projects',$this->Activity->Project->find('all'), array('conditions'=> array('Project.removed !=' => 1)));
		$this->Activity->id = $id;
		
		if (!$id) {
        	throw new NotFoundException(__('Invalid post'));
	    }
	    
	    $activity = $this->Activity->findById($id);
	    
	    if (!$activity) {
			throw new NotFoundException(__('Invalid post'));
		}
		
		if ($this->request->is('get')) {
			$this->request->data = $this->Activity->read();
		}
		else{
			$this->Activity->id = $id;
			if ($this->Activity->saveAll($this->request->data)) {
				
				$this->Session->setFlash($this->flashSuccess('A atividade foi editada.'));
				$this->redirect(array('action' => 'index'));
			}
		}		
	   
	}
	
	public function view($id){

		$this->Activity->id = $id;
		$this->layout = 'base';
		
	    if ($this->request->is('get')) {
	        $this->set('activities', $this->Activity->read());
	    }
	}
	
	
	 
	 	
}
?>
