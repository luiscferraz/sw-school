<?php
class EntriesController extends AppController{
	
	public $helpers = array ('html','form');
 	public $name = 'Entries';
 	var $scaffold;
 	
 	public function index(){
		$this->set('title_for_layout', 'Apontamento');
 		$this -> layout = 'index';
 		$this -> set ('entries', $this-> Entry->find('all', array('conditions'=> array('Entry.removed !=' => 1),'order'=>array('Activity.description','Consultant.name','Entry.type_consulting','Entry.hours_worked DESC','Entry.date DESC')))); 
		$this-> set ('consultants',$this->Entry->Consultant->find('all', array('conditions'=> array('Consultant.id =' => 'Entry.consultant_id'))));		 
		$this-> set ('activities',$this->Entry->Activity->find('all', array('conditions'=> array('Activity.id =' => 'Entry.activity_id'))));	
		$this-> set ('tipo_usuario',$this->Auth->user('type'));		
 	}
 	
 	public function add(){
	 	$this->layout = 'base';
		$this-> set ('activities',$this->Entry->Activity->find('all'), array('conditions'=> array('Activity.removed !=' => 1)));
		$this-> set ('consultants',$this->Entry->Consultant->find('all', array('conditions'=> array('Consultant.removed !=' => 1))));		 
		$this-> set ('id_consultor_logado',$this->Auth->user('consultant_id'));
		$this -> set ('nome_consultor_logado', $this-> Nome_Consultor_Logado($this->Auth->user('consultant_id')));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));
		
	 	if($this->request->is('post')){
	 		if($this->Entry->saveAll($this->request->data)){
	 			$this->Session->setFlash('O apontamento foi adicionado com sucesso.');
          		$this->redirect(array('action' => 'index'));
	 		}
	 		else{
				$this->Session->setFlash($this->flashError('Erro ao cadastrar apontamento!'));
			}				
	 	}
	 	else{
	 		$this->Session->setFlash($this->Session->setFlash($this->flashError('O apontamento não foi adicionado. Tente novamente!')));			
		
	 	}
 	}
	
	 	private function Nome_Consultor_Logado($id){
			$name = $this->Entry->Consultant->findById($id);
			if (!$name){
			return '';
			}
			else{
			return $name['Consultant']['name'];
 		 	}
		}
			
		private function Nome_Atividade($id){
			$name = $this->Entry->Activity->findById($id);
			return $name['Activity']['description'];
 		 	}
			
 	
 	public function delete($id = NULL){
		$this->Entry->id = $id;
		if($this->Entry->saveField("removed", "true")){
			$this->Session->setFlash('O apontamento foi removido com sucesso!');
			$this->redirect(array('action' => 'index'));
		}
	}

 	public function approve($id = NULL){
		$this->Entry->id = $id;
		if($this->Entry->saveField("approved",1)){
			$this->Session->setFlash('O apontamento foi aprovado!');
			$this->redirect(array('action' => 'index'));
		}
	}
	
	public function edit($id = NULL){
		$this->layout = 'base';
		$this-> set ('activities',$this->Entry->Activity->find('all'), array('conditions'=> array('Activity.removed !=' => 1)));
		$this-> set ('consultants',$this->Entry->Consultant->find('all', array('conditions'=> array('Consultant.removed !=' => 1))));
		$this-> set ('id_consultor_logado',$this->Auth->user('consultant_id'));
		$this -> set ('nome_consultor_logado', $this-> Nome_Consultor_Logado($this->Auth->user('consultant_id')));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));
		$this->Entry->id = $id;
		
		if ($this->request->is('get')) {
			$this->request->data = $this->Entry->read();
		}
		else{
			$this->Entry->id = $id;
			if ($this->Entry->saveAll($this->request->data)) {
				
				$this->Session->setFlash($this->flashSuccess('Atividade foi editada.'));
				$this->redirect(array('action' => 'index'));
			}
			else {
				$this->redirect(array('action' => 'index'));
			}
			
		}	   
	}
	
	public function view($id){

		$this->Entry->id = $id;
		$this->layout = 'base';
		$Apontamento =  $this->Entry->findById($id);
		$this -> set ('nome_consultor_logado', $this-> Nome_Consultor_Logado($Apontamento['Entry']['consultant_id']));
		$this -> set ('nome_atividade', $this-> Nome_Atividade($Apontamento['Entry']['activity_id']));
		
		
		
	    if ($this->request->is('get')) {
	        $this->set('entries', $this->Entry->read());
	    }
	}	 	
 	
}
?>
