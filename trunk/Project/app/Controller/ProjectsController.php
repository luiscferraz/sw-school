<?php
/*
 * Created on 08/01/2013
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class ProjectsController extends AppController{
 	public $helpers = array ('Html','Form');
 	public $name = 'Projects';
 	var $scaffold;
 	
 	
 	public function index(){
		$this->set('title_for_layout', 'Projetos');
 		$this -> layout = 'base';
 		$this -> set ('projects', $this-> Project->find('all', array('conditions'=> array('Project.removed !=' => 1))));
 		$this -> set ('projectsPais', $this-> Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.parent_project_id =' => null))));
 		$this -> set ('projectsFilhos', $this-> Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.parent_project_id !=' => null))));
 		$this -> set ('activities', $this-> Project-> Activity->find('all', array('conditions'=> array('Activity.removed !=' => 1))));
 		$this -> set ('consultants', $this-> Project-> Consultant->find('all', array('conditions'=> array('Consultant.removed !=' => 1),'order'=>array('Consultant.name'))));
 		$this -> set('companies', $this-> Project-> Company->find('all', array('conditions'=> array('Company.removed !=' => 1))));
 		$this -> set ('tipo_usuario',$this-> Auth->user('type'));	
 		//$this -> set ('entries', $this -> Project->Activity->Entry->find('all', array('conditions' => array('Entry.removed !=' => 1))));
 	}
 

 	public function index2(){
 		$this->set('title_for_layout', 'Relatório');
 		$this -> layout = 'index';
 		$this -> set ('projects', $this-> Project->find('all', array('conditions'=> array('Project.removed !=' => 1,'Project.parent_project_id =' => null))));
		$this -> set ('activities', $this-> Project->Activity->find('all', array('conditions'=> array('Activity.removed !=' => 1))));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));	
 	}

 	public function relatorio(){
 		$this -> layout = 'base';
		$this-> set ('tipo_usuario',$this->Auth->user('type'));	
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
 				$this-> set ('projects',$this->Project->find('all', array('conditions'=> array('Project.removed !=' => 1))));
 		}
 	}
	
	public function edit($id = NULL){
		$this->layout = 'base';
		$this->Project->id = $id;
		
	
		if ($this->request->is('get')) {
			$this->request->data = $this->Project->read();
			$this-> set ('projects',$this->Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.id !=' => $id))));
			$this-> set ('companies',$this->Project->Company->find('all', array('conditions'=> array('Company.removed !=' => 1))));
		}
		else{
			$this->Project->id = $id;
			if ($this->Project->saveAll($this->request->data)) {
				
				$this->Session->setFlash($this->flashSuccess('Projeto foi editado.'));
				$this->redirect(array('action' => 'index'));
			}
			else {
				$this->redirect(array('action' => 'index'));
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
		$this-> set ('tipo_usuario',$this->Auth->user('type'));	
 		if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

 		$Projects =  $this->Project->findById($id);
 		
 		if (!$Projects) {
            throw new NotFoundException(__('Invalid post'));
        }
        
        $this -> set('nameCompany', $this->GetNameCompany($Projects['Project']['company_id']));
        $this -> set('nameProjectFather', $this->GetNameProjectFather($Projects['Project']['parent_project_id']));
        $this -> set('nameConsultant', $this->GetNameGerent($Projects['Project']['consultant_id']));
        $this -> set('projects', $this->Project->find('all',array('conditions' =>array('Project.parent_project_id =' =>$id))));
	$this -> set ('activities', $this-> Project-> Activity->find('all', array('conditions'=> array('Activity.removed !=' => 1, 'Activity.project_id = ' => $id)))); 
        $this ->set('project',$Projects);
 	}
 	
 	public function alocados($id=null){
 		$this -> layout = 'base';
 		if($this->request->is('post')){
	 			if($this->Project->saveAll($this->request->data)){
	 				$this->Session->setFlash($this->flashSuccess('Projeto adicionado com sucesso.'));
	           		$this->redirect(array('action' => 'index'));
	 			}
 			
 		}
 		else {
 			
	 		$this-> set('consultants',$this->Project->ProjectConsultant->find('all',array('conditions'=> array('project_id =' => $id))));
	 		$this -> set('nameConsultants', $this->Project->Consultant->find('all'));
	 		$this -> set('nameProject',$this->GetNameProjectFather($id));
	 		$this -> set('id_projeto',$id);
 		}	
 	}

 	public function deleteconsultor($id){
 		$pro = $this->Project->ProjectConsultant->findById($id);
 		$this->Project->ProjectConsultant->delete($id);
 		$this->Session -> setFlash($this-> flashSuccess('Apagado Com Sucesso'));
 		$this->redirect(array('action' => 'alocados/'.$pro['ProjectConsultant']['project_id']));
 	}
 	
 	public function saveProjectConsultant(){
 		
 	}

 	
 	//verificar se existe um projeto cadastrado com a mesmo nome e empresa.
 	private function exist($nome, $idEmpresa){
		$foundProject = $this->Project->find('first',array('conditions'=> array('Project.name =' => $nome,'Project.company_id =' => $idEmpresa)));
		if (count($foundProject) == 0){
			return true;
		}
		
		else{
			return false;
		}
	}


	public function Reports($id = null){
		$this -> layout = 'base';
		$this -> set( 'idproject', $id);
		$this -> set('filters', false);

		if ($this -> request -> is('post')) {
			$report =  $_POST['report'];
			if ($report['time'] == 'all') {
				$this -> ReportsAll($report['id']);
			}
			else {
				$this -> ReportsDate($report['id'], $report['dateInit'], $report['dateEnd']);
			}
		}
	}

	public function ReportsAll($idProject){
		$consulting_A = $this->Project->query('SELECT * FROM activities, projects, consultants, entries WHERE entries.type_consulting = "A" AND entries.activity_id = activities.id AND entries.consultant_id = consultants.id AND activities.project_id = projects.id AND projects.id = '.$idProject);
 		$consulting_B = $this->Project->query('SELECT * FROM activities, projects, consultants, entries WHERE entries.type_consulting = "B" AND entries.activity_id = activities.id AND entries.consultant_id = consultants.id AND activities.project_id = projects.id AND projects.id = '.$idProject);
 		$consulting_C = $this->Project->query('SELECT * FROM activities, projects, consultants, entries WHERE entries.type_consulting = "C" AND entries.activity_id = activities.id AND entries.consultant_id = consultants.id AND activities.project_id = projects.id AND projects.id = '.$idProject);
 		$hours_A_ind = $this->Project->query('SELECT projects.id, projects.a_hours_individual AS hours_a_contracted_individual, SUM(entries.hours_worked) AS hours_a_performed_individual, (projects.a_hours_individual - SUM(entries.hours_worked)) AS balance_hours_a_individual FROM activities ,entries, projects WHERE entries.type = "Individual" AND entries.type_consulting = "A" AND entries.activity_id = activities.id AND activities.project_id = projects.id AND projects.id = '.$idProject);
 		$hours_A_group = $this->Project->query('SELECT projects.id, projects.a_hours_group AS hours_a_contracted_group, SUM(entries.hours_worked) AS hours_a_performed_group, (projects.a_hours_group - SUM(entries.hours_worked)) AS balance_hours_a_group FROM activities ,entries, projects WHERE entries.type = "Grupo" AND entries.type_consulting = "A" AND entries.activity_id = activities.id AND activities.project_id = projects.id AND projects.id = '.$idProject);
 		$hours_B_ind = $this->Project->query('SELECT projects.id, projects.b_hours_individual AS hours_b_contracted_individual, SUM(entries.hours_worked) AS hours_b_performed_individual, (projects.b_hours_individual - SUM(entries.hours_worked)) AS balance_hours_a_individual FROM activities ,entries, projects WHERE entries.type = "Individual" AND entries.type_consulting = "B" AND entries.activity_id = activities.id AND activities.project_id = projects.id AND projects.id = '.$idProject);
 		$hours_B_group = $this->Project->query('SELECT projects.id, projects.b_hours_group AS hours_b_contracted_group, SUM(entries.hours_worked) AS hours_b_performed_group, (projects.b_hours_group - SUM(entries.hours_worked)) AS balance_hours_b_group FROM activities ,entries, projects WHERE entries.type = "Grupo" AND entries.type_consulting = "B" AND entries.activity_id = activities.id AND activities.project_id = projects.id AND projects.id = '.$idProject);
 		$hours_C_ind = $this->Project->query('SELECT projects.id, projects.c_hours_individual AS hours_c_contracted_individual, SUM(entries.hours_worked) AS hours_c_performed_individual, (projects.c_hours_individual - SUM(entries.hours_worked)) AS balance_hours_c_individual FROM activities ,entries, projects WHERE entries.type = "Individual" AND entries.type_consulting = "C" AND entries.activity_id = activities.id AND activities.project_id = projects.id AND projects.id = '.$idProject);
 		$hours_C_group = $this->Project->query('SELECT projects.id, projects.c_hours_group AS hours_c_contracted_group, SUM(entries.hours_worked) AS hours_c_performed_group, (projects.c_hours_group - SUM(entries.hours_worked)) AS balance_hours_c_group FROM activities ,entries, projects WHERE entries.type = "Grupo" AND entries.type_consulting = "C" AND entries.activity_id = activities.id AND activities.project_id = projects.id AND projects.id = '.$idProject);
 		$this->set('consulting_A', $consulting_A);
 		$this->set('consulting_B', $consulting_B);
 		$this->set('consulting_C', $consulting_C);
 		$this->set('hours_A_ind', $hours_A_ind);
 		$this->set('hours_B_ind', $hours_B_ind);
 		$this->set('hours_C_ind', $hours_C_ind);
 		$this->set('hours_A_group', $hours_A_group);
 		$this->set('hours_B_group', $hours_B_group);
 		$this->set('hours_C_group', $hours_C_group);

		$this -> set('filters', true);
	}
	public function ReportsDate($idProject,$dateInit = NULL, $dateEnd = NULL){
		if ($dateInit != NULL and $dateEnd != NULL) {
 			$hours_per_date = $this->Project->query('SELECT consultants.id, consultants.name, projects.id AS project_id, projects.description AS projects_description,activities.date, entries.hours_worked FROM consultants, activities, entries, projects WHERE consultants.id = entries.consultant_id AND activities.id = entries.activity_id AND activities.project_id = projects.id ORDER BY consultants.id');
 		}
 		elseif ($dateEnd == NULL) {
 			
 		}
 		elseif ($dateInit == NULL) {
 			
 		}
		$this -> set('filters', true);
	}
	
	//Funções em para respostas ajax
	//lista de consultores para ser gerente
	public function AjaxListConsultant(){
		$this->layout = 'ajax';
		$consultants = $this->Project->Consultant->find('all');
		$this-> set('consultants', $consultants);
	}
	public function AjaxListConsultantNome($name){
		$this->layout = 'ajax';
		$consultants = $this->Project->Consultant->query("SELECT * FROM consultants WHERE LOWER(name) like LOWER('%" . $name . "%')");
		$this-> set('consultants', $consultants);
	}
	public function AjaxListConsultantCpf($cpf){
		$this->layout = 'ajax';
		$consultants = $this->Project->Consultant->query("SELECT * FROM consultants WHERE cpf like '%" . $cpf . "%'");
		$this-> set('consultants', $consultants);
	}
	//fim
	//lista de consultores para ser alocados
	public function AjaxListConsultants(){
		$this->layout = 'ajax';
		$consultants = $this->Project->Consultant->find('all');
		$this-> set('consultants', $consultants);
	}
	
	public function AjaxAddConsultant($project_id = null,$consultant_id = null){
		$this->layout = 'ajax';
		$this->Project->ProjectConsultant->query("INSERT INTO project_consultants  (project_id,consultant_id) VALUES ('" . $project_id . "', '" . $consultant_id. "')");
		$query = $this->Project->ProjectConsultant->find('all',array('conditions'=> array('project_id =' => $project_id)));
		$this->set('retorno', $query);

	}
	public function AjaxEditConsultant($id,
										$value_hour_a_individual, $value_hour_b_individual, $value_hour_c_individual,
										$value_hour_a_group, $value_hour_b_group, $value_hour_c_group){
		$this->layout = 'ajax';
		$this->Project->ProjectConsultant->query("UPDATE project_consultants SET value_hour_a_individual = '" . $value_hour_a_individual . "', value_hour_b_individual = '" . $value_hour_b_individual . "',
												value_hour_c_individual = '" . $value_hour_c_individual . "', value_hour_a_group = '" . $value_hour_a_group . "',
												value_hour_b_group = '" . $value_hour_b_group . "', value_hour_c_group = '" . $value_hour_c_group . "'
												WHERE id = '" . $id . "' ");
	}

	//lista de consultores para ser alocados
	public function AjaxListCompanies(){
		$this->layout = 'ajax';
		$companies = $this->Project->Company->find('all');
		$this-> set('companies', $companies);
	}



	//Finanças do projeto
 	public function financial($id =  null){
 		$this -> layout = 'base';

		$this -> set ('financials', $this -> Project -> Expense -> find ('all', array( 'conditions' => array ('Expense.project_id =' => $id))));
		$this -> set ('id', $id);
 	}

	public function addfinancial(){
 		
 		if($this->request->is('post')){
	 			if($this->Project->Expense->saveAll($this->request->data)){
	 				$this->Session->setFlash($this->flashSuccess('Adicionado com sucesso.'));
	           		$this->redirect(array('action' => 'financial', $this->request->data['Expense']['project_id']));
	 			}
 			}

 		
 	}
 	public function deletefinancial($id){

 		$project_id = $this->Project->Expense->query('SELECT expenses.project_id FROM expenses WHERE expenses.id = '.$id);

 		if($this->Project->Expense->delete($id)){
   			$this->Session->setFlash($this->flashSuccess('Despesa deletada!'));
   			$this->redirect(array('action' => 'financial/'.$project_id[0]['expenses']['project_id']));
		}
		$this->Session->setFlash($this->flashError('Despesa não deletada!'));
		$this->redirect(array('action' => 'financial/'.$project_id[0]['expenses']['project_id']));
 	}





	
 	//Funções de ajuda
 	
 	//retorna em string nome da empresa
 	private function GetNameCompany($id){
 		$name = $this->Project->Company->findById($id);
 		return $name['Company']['name'];
 		
 	}

 	//Retornar em string nome do projeto pai
 	private function GetNameGerent($id){
 		if ($this->Project->Consultant->findById($id)){
 			$name = $this->Project->Consultant-> findById($id);
 			return $name['Consultant']['name'];
 		}
 		else{
 			return '';
 		}
 		
 	}
 	
 	//Retornar em string nome do projeto pai
 	private function GetNameProjectFather($id){
 		if ($this->Project->findById($id)){
 			$name = $this->Project->findById($id);
 			return $name['Project']['name'];
 		}
 		else{
 			return '';
 		}
 		
 	}

 }
?>
