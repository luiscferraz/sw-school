<?php


class CompaniesController extends AppController {
	
	public $uses = 'Company';
	public $name = 'Companies';
	
	public function index(){
		$this->set('title_for_layout', 'Empresas');
		$this -> layout = 'index';
		$this->set('companies', $this->Company->find('all', array('conditions'=> array('Company.removed !=' => 1))));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));				
	}
	
	public function add(){
		$this->set('title_for_layout', 'Empresas');
		$this -> layout = 'basemodalint';
		if($this->request->is('post')){
			if($this->Company->saveAll($this->request->data)){
				$this->Session->setFlash($this->flashSuccess('Empresa cadastrada com sucesso!'));
				$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash($this->flashError('Erro ao cadastrar empresa!'));
			}
		}
		else{			
			$this->Session->setFlash($this->Session->setFlash($this->flashError('A empresa não foi cadastrada. Tente novamente!')));			
		}
		
	}
	public function edit($id = NULL){
		$this->set('title_for_layout', 'Empresas');

		$this->layout = 'base';

		$this->Company->id = $id;

		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}

		$comp = $this->Company->findById($id);

		if (!$comp) {
			throw new NotFoundException(__('Invalid post'));
		}

		if ($this->request->is('get')) {
			$this->request->data = $this->Company->read();
			}
			else {
				$this->Company->id = $id;

				if ($this->Company->saveAll($this->request->data)) {
					$this->Session->setFlash($this->flashSuccess('Empresa atualizada!'));
					$this->redirect(array('action' => 'index'));
					}
				}
	}

	
	
	public function delete($id = NULL){
		$this->Company->id = $id;
		$this->Company->saveField('removed',1);
		$this->Session->setFlash($this->flashSuccess('Empresa removida com sucesso!'));
		$this->redirect('/Companies');
	}
	

	public function view($id){
		$this->set('title_for_layout', 'Empresas');
		$this->Company->id = $id;
		$this->layout = 'basemodalint';
		$this-> set ('tipo_usuario',$this->Auth->user('type'));	
		
	    if ($this->request->is('get')) {
	        $this->set('company', $this->Company->read());
	    }
	}
	
	public function report(){
		$this->set('title_for_layout', 'Empresas');
		$this -> layout = 'index';
		$this->set('companies', $this->Company->find('all', array('conditions'=> array('Company.removed !=' => 1))));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));				
	}

}


?>
