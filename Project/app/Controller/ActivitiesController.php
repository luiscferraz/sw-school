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
	
	public function AjaxListFiles(){
		$this->layout = 'ajax';
		$file = $this->Activity->Attachment->findAll();
		return $file['file_name'];
	}
		
	public function AjaxAttachFiles(){
		
	
	}
	
	public function add(){
	 	$this->layout = 'base';
		$this-> set ('projects',$this->Activity->Project->find('all'), array('conditions'=> array('Project.removed !=' => 1)));
		$this-> set ('consultants',$this->Activity->Consultant->find('all'), array('conditions'=> array('Consultant.removed !=' => 1)));
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
		$this-> set ('consultants',$this->Activity->Consultant->find('all'), array('conditions'=> array('Consultant.removed !=' => 1)));
		$this->Activity->id = $id;
		
		if ($this->request->is('get')) {
			$this->request->data = $this->Activity->read();
		}
		else{
			$this->Activity->id = $id;
			if ($this->Activity->saveAll($this->request->data)) {
				
				$this->Session->setFlash($this->flashSuccess('Atividade foi editada.'));
				$this->redirect(array('action' => 'index'));
			}
			else {
				$this->redirect(array('action' => 'index'));
			}
			
		}
	   
	}
	
	public function view($id){

		$this->Activity->id = $id;
		$this->layout = 'base';
		$Atividade =  $this->Activity->findById($id);
		$this -> set ('consultor1', $this-> Nome_Consultor($Atividade['Activity']['consultant1_id']));
		$this -> set ('consultor2', $this-> Nome_Consultor($Atividade['Activity']['consultant2_id']));
		$this -> set ('consultor3', $this-> Nome_Consultor($Atividade['Activity']['consultant3_id']));
		$this -> set ('consultor4', $this-> Nome_Consultor($Atividade['Activity']['consultant4_id']));
		
	    if ($this->request->is('get')) {
	        $this->set('activities', $this->Activity->read());
	    }
	}

	private function Nome_Consultor($id){
		$name = $this->Activity->Consultant->findById($id);
			if ($name){
				return $name['Consultant']['name'];
 		 	}else{
				return '';
			}
		}
	 
	 	
}
?>
