<?php
class EntriesController extends AppController{
	
	public $helpers = array ('html','form');
 	public $name = 'Entries';
 	var $scaffold;
 	
 	public function index(){
		$this->set('title_for_layout', 'Entries');
 		$this -> layout = 'index';
 		$this -> set ('entries', $this-> Pointing->find('all', array('conditions'=> array('Entry.removed !=' => 1)))); 				 
 	}
 	
 	public function add(){
	 	$this->layout = 'base';
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
 	
 	public function delete($id = NULL){
		$this->Entry->id = $id;
		if($this->Entry->saveField("removed", "true")){
			$this->Session->setFlash('O apontamento foi removido com sucesso!');
			$this->redirect(array('action' => 'index'));
		}
	}	 	
 	
}
?>
