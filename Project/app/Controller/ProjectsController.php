<?php
/*
 * Created on 08/01/2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class ProjectsController extends AppController{
 	public $helpers = array ('html','form');
 	public $name = 'Projects';
 	var $scaffold;
 	
 	
 	public function index(){
		$this->set('title_for_layout', 'Projetos');
 		$this -> layout = 'index';
 		$this -> set ('projects', $this-> Project->find('all', array('conditions'=> array('Project.removed !=' => 1))));
 		$this-> set ('companies',$this->Project->Company->find('all', array('conditions'=> array('Company.id =' => 'Project.company_id'))));		 
 	}
 	
 	public function add(){
 		$this->layout = 'base';
 		
 		if($this->request->is('post')){
 			if ($this->exist($this->request->data['Project']['name'],$this->request->data['Project']['company_id'])){
	 			if($this->Project->saveAll($this->request->data)){
	 				$this->Session->setFlash($this->flashSuccess('Projeto adicionado com sucesso.'));
	           		$this->redirect(array('action' => 'index'));
	 			}
 			}
 			else {
 				$this->Session->setFlash($this->flashError('Projeto ja existe no banco de dados. Favor tentar novamente.'));
				$this->redirect(array('action'=>'add'));
 			}
 		}
 		else{
 				$this-> set ('companies',$this->Project->Company->find('all', array('conditions'=> array('Company.removed !=' => 1))));
 				$this-> set ('projects',$this->Project->find('all'), array('conditions'=> array('Project.removed !=' => 1)));
 		}
 	}
	
	public function edit($id = NULL){
		$this->layout = 'base';
		$this->Project->id = $id;
		if (!$id) {
        	throw new NotFoundException(__('Invalid post'));
	    }
	
	    $consult = $this->Project->findById($id);
	    if (!$consult) {
	        throw new NotFoundException(__('Invalid post'));
	    }
		if ($this->request->is('get')) {
			$this->request->data = $this->Project->read();
			$this-> set ('projects',$this->Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.id !=' => $id))));
			$this-> set ('companies',$this->Project->Company->find('all', array('conditions'=> array('Company.removed !=' => 1))));
		}
		else{
			$this->Project->id = $id;
			if ($this->Project->saveAll($this->request->data)) {
				$this->Session->setFlash($this->flashSuccess('Projeto editado com sucesso.'));
				$this->redirect(array('action' => 'index'));
			}
			else{
				$this->Session->setFlash($this->flashError('Erro ao editar projeto.'));
			}
		}
	}
	
	public function delete($id = NULL){
		$this->Project->id = $id;
		if($this->Project->saveField("removed", "true")){
			$this->Session->setFlash($this->flashSuccess('Projeto excluido com sucesso!'));
			$this->redirect(array('action' => 'index'));
		}
		else {
			$this->Session->setFlash($this->flashError('Erro ao excluir projeto.'));
		}
	}
 	
 	
 	public function view($id = null){
		$this -> layout = 'base';
 		if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

 		$Projects =  $this->Project->findById($id);
 		
 		if (!$Projects) {
            throw new NotFoundException(__('Invalid post'));
        }
        
        $this -> set('nameCompany', $this->GetNameCompany($Projects['Project']['company_id']));
        $this -> set('nameProjectFather', $this->GetNameProjectFather($Projects['Project']['parent_project_id']));
        $this ->set('project',$Projects);
 	}
 	
 	
 	private function GetNameCompany($id){
 		$name = $this->Project->Company->findById($id);
 		return $name['Company']['name'];
 		
 	}
 	private function GetNameProjectFather($id){
 		$name = $this->Project->findById($id);
 		return $name['Project']['name'];
 		
 	}
 	
 	private function exist($nome, $idEmpresa){
		$foundProject = $this->Project->find('first',array('conditions'=> array('Project.name =' => $nome,'Project.company_id =' => $idEmpresa)));
		if (count($foundProject) == 0){
			return true;
		}
		
		else{
			return false;
		}
	}
 }
?>
