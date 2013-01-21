<?php
class EntriesController extends AppController{
	
	public $helpers = array ('html','form');
 	public $name = 'Entries';
 	var $scaffold;
 	
 	public function index(){
		$this->set('title_for_layout', 'Entries');
 		$this -> layout = 'index';
 		$this -> set ('entries', $this-> Entry->find('all', array('conditions'=> array('Entry.removed !=' => 1)))); 				 
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
	
	public function edit($id = NULL){
		$this->layout = 'base';
		$this->Entry->id = $id;
		
		if (!$id) {
        	throw new NotFoundException(__('Invalid post'));
	    }
	    
	    $entry = $this->Entry->findById($id);
	    
	    if (!$entry) {
			throw new NotFoundException(__('Invalid post'));
		}
		
		if ($this->request->is('get')) {
			$this->request->data = $this->Entry->read();
		}
		else{
			$this->Entry->id = $id;
			if ($this->Entry->saveAll($this->request->data)) {
				
				$this->Session->setFlash($this->flashSuccess('O apontamento foi editado.'));
				$this->redirect(array('action' => 'index'));
			}
		}		
	   
	}
	
	public function view($id){

		$this->Entry->id = $id;
		$this->layout = 'base';
		
	    if ($this->request->is('get')) {
	        $this->set('entries', $this->Activity->read());
	    }
	}	 	
 	
}
?>
