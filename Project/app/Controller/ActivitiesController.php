<?php

 class ActivitiesController extends AppController{
 	public $helpers = array ('html','form','Js'=>array('Jquery'));
 	public $name = 'Activities';
 	var $scaffold;
 	
 	
 	public function index(){
		$this->set('title_for_layout', 'Atividades');
 		$this -> layout = 'base';
 		$this -> set ('activities', $this-> Activity->find('all', array('conditions'=> array('Activity.removed !=' => 1))));
 		$this -> set('attachments', $this->Activity->Attachment->find('all'), array('conditions'=>array('Attachment.removed !=' => 1)));
		$this -> set ('entries', $this-> Activity-> Entry-> find('all', array('conditions'=> array('Entry.removed !=' => 1))));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));		
 				 
 	}
 	
	public function AjaxListConsultant(){
		$name = $this->Activity->Consultant->findAll();
		return $name['Consultant'];
	}
	
	public function AjaxListFiles($id){
		$this->layout = 'ajax';
		$attachments = $this->Activity->Attachment->find('all',array('conditions' => array('Attachment.activity_id =' =>$id, 'Attachment.removed !='=> 1)));
		$this-> set('attachments', $attachments);
		
	}
		
	public function AjaxAttachFiles(){
		
	
	}
	
	public function add(){
	 	$this->layout = 'base';
		$this-> set ('projects',$this->Activity->Project->find('all'), array('conditions'=> array('Project.removed !=' => 1)));
		$this-> set ('consultants',$this->Activity->Consultant->find('all'), array('conditions'=> array('Consultant.removed !=' => 1)));
	 	$this -> set('attachments', $this->Activity->Attachment->find('all'), array('conditions'=>array('Attachment.removed !=' => 1)));
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
		$this-> set ('tipo_usuario',$this->Auth->user('type'));	
		$this->layout = 'base';
		$Atividade =  $this->Activity->findById($id);
		$this -> set ('consultor1', $this-> Nome_Consultor($Atividade['Activity']['consultant1_id']));
		$this -> set ('consultor2', $this-> Nome_Consultor($Atividade['Activity']['consultant2_id']));
		$this -> set ('consultor3', $this-> Nome_Consultor($Atividade['Activity']['consultant3_id']));
		$this -> set ('consultor4', $this-> Nome_Consultor($Atividade['Activity']['consultant4_id']));
		$this -> set ('entries', $this-> Activity-> Entry-> find('all', array('conditions'=> array('Entry.removed !=' => 1, 'Entry.activity_id = ' => $id))));
 		$this -> set ('activities', $this-> Activity->find('all', array('conditions'=> array('Activity.removed !=' => 1))));
		
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
