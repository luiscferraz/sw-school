<?php
/*
 * Created on 24/12/2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class HomeController extends AppController{

       public function index ($id = null) {
				
			   if(($this->request->is('post')) and (isset($this->request->data['Project']['id']))){
        	   		$id = $this->request->data['Project']['id'];
            	}
               $this->layout =  'main';
			   $this-> set ('tipo_usuario',$this->Auth->user('type'));			 		
			   $this-> set ('nome_usuario',$this->Auth->user('username'));		
			    $this -> set ('projects', $this-> Home -> Project->find('all', array('conditions'=> array('Project.removed !=' => 1),'order'=>array('Project.name'))));	 		
				if($id == null){
					$this -> set ('projectsPais', $this-> Home -> Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.parent_project_id =' => null))));
				}
				else{
					$this -> set ('projectsPais', $this-> Home -> Project->find('all', array('conditions'=> array('Project.id'=>$id,'Project.removed !=' => 1))));
				}

				$this -> set ('projectsFilhos', $this-> Home -> Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.parent_project_id !=' => null))));
				$this -> set ('projectsNetos', $this-> Home -> Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.parent_project_id !=' => null))));
				if ($this -> request -> is('post')) {
					if (array_key_exists('date_submit', $_POST)) {
						$date =  $_POST['date_submit'];
						$this -> set('date_submit', $date);
					}
				}

				//Tuplas da posicao do consultor 1
				$consultor1PadraoId = $this->Home->Activity->query('select activities.project_id, activities.start_hours, activities.end_hours, activities.start_date, activities.description, consultants.name, consultants.acronym, consultants.acronym_color from consultants, activities where activities.status = "Planejada" and activities.consultant1_id = consultants.id and activities.removed != 1 and activities.consultant1_id is not null');			
				$arrayConsultor1 = array();
				foreach ($consultor1PadraoId as $consultor1) {
					
					if ($consultor1['activities']['start_hours'] < '12:00:00'){
						$mt = 'M';
						$padraoID = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['start_date'].'.'.'1';
						$descricao = $consultor1['activities']['description'];
						$sigla = $consultor1['consultants']['acronym'];
						$cor = $consultor1['consultants']['acronym_color'];
						$arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);							
					}
					if ($consultor1['activities']['end_hours'] > '12:00:00'){
						$mt = 'T';
						$padraoID = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['start_date'].'.'.'1';
						$descricao = $consultor1['activities']['description'];
						$sigla = $consultor1['consultants']['acronym'];
						$cor = $consultor1['consultants']['acronym_color'];
						$arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);								
					}
				}
				$this -> set ('arrayConsultor1',$arrayConsultor1);
				
				//Tuplas da posicao do consultor 2
				$consultor2PadraoId = $this->Home->Activity->query('select activities.project_id, activities.start_hours, activities.end_hours, activities.start_date, activities.description, consultants.name, consultants.acronym, consultants.acronym_color from consultants, activities where activities.status = "Planejada" and activities.consultant2_id = consultants.id and activities.removed != 1 and activities.consultant2_id is not null');			
				$arrayConsultor2 = array();				
				foreach ($consultor2PadraoId as $consultor2) {
							
					if ($consultor2['activities']['start_hours'] < '12:00:00'){
						$mt = 'M';
						$padraoID = $consultor2['activities']['project_id'].'.M.'.$consultor2['activities']['start_date'].'.'.'2';
						$descricao = $consultor2['activities']['description'];
						$sigla = $consultor2['consultants']['acronym'];
						$cor = $consultor2['consultants']['acronym_color'];
						$arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);						
					}
					if ($consultor2['activities']['end_hours'] > '12:00:00'){
						$mt = 'T';
						$padraoID = $consultor2['activities']['project_id'].'.T.'.$consultor2['activities']['start_date'].'.'.'2';
						$descricao = $consultor2['activities']['description'];
						$sigla = $consultor2['consultants']['acronym'];
						$cor = $consultor2['consultants']['acronym_color'];
						$arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);							
					}
				}
				$this -> set ('arrayConsultor2',$arrayConsultor2);
				
				//Tuplas da posicao do consultor 3
				$consultor3PadraoId = $this->Home->Activity->query('select activities.project_id, activities.start_hours, activities.end_hours, activities.start_date, activities.description, consultants.name, consultants.acronym, consultants.acronym_color from consultants, activities where activities.status = "Planejada" and activities.consultant3_id = consultants.id and activities.removed != 1 and activities.consultant3_id is not null');			
				$arrayConsultor3 = array();
				foreach ($consultor3PadraoId as $consultor3) {
							
					if ($consultor3['activities']['start_hours'] < '12:00:00'){
						$mt = 'M';
						$padraoID = $consultor3['activities']['project_id'].'.M.'.$consultor3['activities']['start_date'].'.'.'3';
						$descricao = $consultor3['activities']['description'];
						$sigla = $consultor3['consultants']['acronym'];
						$cor = $consultor3['consultants']['acronym_color'];
						$arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);						
					}
					if ($consultor3['activities']['end_hours'] > '12:00:00'){
						$mt = 'T';
						$padraoID = $consultor3['activities']['project_id'].'.T.'.$consultor3['activities']['start_date'].'.'.'3';
						$descricao = $consultor3['activities']['description'];
						$sigla = $consultor3['consultants']['acronym'];
						$cor = $consultor3['consultants']['acronym_color'];
						$arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);							
					}
				}
				$this -> set ('arrayConsultor3',$arrayConsultor3);
				
				//Tuplas da posicao do consultor 4
				$consultor4PadraoId = $this->Home->Activity->query('select activities.project_id, activities.start_hours, activities.end_hours, activities.start_date, activities.description, consultants.name, consultants.acronym, consultants.acronym_color from consultants, activities where activities.status = "Planejada" and activities.consultant4_id = consultants.id and activities.removed != 1 and activities.consultant4_id is not null');			
				$arrayConsultor4 = array();
				foreach ($consultor4PadraoId as $consultor4) {
							
					if ($consultor4['activities']['start_hours'] < '12:00:00'){
						$mt = 'M';
						$padraoID = $consultor4['activities']['project_id'].'.M.'.$consultor4['activities']['start_date'].'.'.'4';
						$descricao = $consultor4['activities']['description'];
						$sigla = $consultor4['consultants']['acronym'];
						$cor = $consultor4['consultants']['acronym_color'];
						$arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);						
					}
					if ($consultor4['activities']['end_hours'] > '12:00:00'){
						$mt = 'T';
						$padraoID = $consultor4['activities']['project_id'].'.T.'.$consultor4['activities']['start_date'].'.'.'4';
						$descricao = $consultor4['activities']['description'];
						$sigla = $consultor4['consultants']['acronym'];
						$cor = $consultor4['consultants']['acronym_color'];
						$arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);								
					}
				}
				$this -> set ('arrayConsultor4',$arrayConsultor4);
				
        }
	
	public function edition_agenda($string){	
		$this->layout = 'edition_agenda';	
		$stringFatiada = explode('.' , $string);
		$projeto_id = $stringFatiada[0];
		$turno = $stringFatiada[1];
		$data = $stringFatiada[2];
		$data= str_replace("-", "/", $data);
		$consultor = $stringFatiada[3];
		$sigla = $stringFatiada[4];
		
		if ($this->search_abbreviation($sigla)){	
		
			if ($this->search_activity($projeto_id, $data, $turno)){
				$this->edition_activity($projeto_id, $data, $turno, $this->search_abbreviation($sigla), $consultor);
			}
			else{
				$this->insert_activity($projeto_id, $turno, $data, $consultor, $this->search_abbreviation($sigla));
			}
			$retorno = array();
			$retorno['mensagem'] = 'ok';
			echo json_encode($retorno);
		}
		elseif ($sigla == 'NULO') {
			if ($this->search_activity($projeto_id, $data, $turno)){
				$this->edition_activity($projeto_id, $data, $turno, NULL, $consultor);

				if (!$this->check_consultant($projeto_id, $data, $turno)) {
					$this->delete_activity($projeto_id, $data, $turno);
				}
			}
			$retorno = array();
			$retorno['mensagem'] = 'ok';
			echo json_encode($retorno);
		}
		else{
			$retorno = array();
			$retorno['mensagem'] = 'Sigla inexistente!';
			echo json_encode($retorno);
			
		}
	}
	
	private function search_abbreviation($sigla){
		$consultor = $this->Home->Consultant->query("SELECT * FROM consultants where acronym = '".$sigla."'");
		if ($consultor){				
			return $consultor[0]['consultants']['id'];
		}else{		
			return FALSE;
		}
	}
	
	private function insert_activity($projeto_id, $turno, $data, $consultor, $sigla){
		if ($turno == 'M'){	
			$this->Home->Activity->query("INSERT INTO `activities`(`description`,`start_hours`, `end_hours`, `start_date`, `status`, `project_id`, `consultant".$consultor."_id`) VALUES ('-Indefinida-','08:00','12:00','".$data."','Planejada','".$projeto_id."','".$sigla."')");

		}else{
			$this->Home->Activity->query("INSERT INTO `activities`(`description`,`start_hours`, `end_hours`, `start_date`, `status`, `project_id`, `consultant".$consultor."_id`) VALUES ('-Indefinida-','13:00','17:00','".$data."','Planejada','".$projeto_id."','".$sigla."')");
		}
	}

		private function search_activity($project_id, $date, $time){

        	if ($time == 'M') {
        		$hours_initial = '01:00';
        		$hours_end = '12:00';
        	}
        	else{
        		$hours_initial = '12:00';
        		$hours_end = '23:59';
        	}

        	if ($this->Home->Activity->query('SELECT * FROM activities WHERE activities.start_date = "'.$date.'" AND activities.start_hours >= "'.$hours_initial.'" AND activities.end_hours <= "'.$hours_end.'" AND activities.project_id = '.$project_id)) {
        		return TRUE;
        	}
        	else{
        		return FALSE;
        	}

        }

        private function edition_activity($project_id, $date, $time, $consultant_id, $number_consultant){

        	if ($time == 'M') {
        		$hours_initial = '01:00';
        		$hours_end = '12:00';
        	}
        	else{
        		$hours_initial = '12:00';
        		$hours_end = '23:59';
        	}

        	if (!$consultant_id) {
        		$this->Home->Activity->query('UPDATE activities SET activities.consultant'.$number_consultant.'_id = NULL WHERE activities.start_date = "'.$date.'" AND activities.start_hours >= "'.$hours_initial.'" AND activities.end_hours <= "'.$hours_end.'" AND activities.project_id = '.$project_id);
        	}
        	else{
        		$this->Home->Activity->query('UPDATE activities SET activities.consultant'.$number_consultant.'_id = '.$consultant_id.' WHERE activities.start_date = "'.$date.'" AND activities.start_hours >= "'.$hours_initial.'" AND activities.end_hours <= "'.$hours_end.'" AND activities.project_id = '.$project_id);
        	}

        } 

        private function check_consultant($project_id, $date, $time){

        	if ($time == 'M') {
        		$hours_initial = '01:00';
        		$hours_end = '12:00';
        	}
        	else{
        		$hours_initial = '12:00';
        		$hours_end = '23:59';
        	}

        	if ($this->Home->Activity->query('SELECT * FROM activities WHERE (activities.consultant1_id IS NOT NULL OR activities.consultant2_id IS NOT NULL OR activities.consultant3_id IS NOT NULL OR activities.consultant4_id IS NOT NULL) AND activities.start_date = "'.$date.'" AND activities.start_hours >= "'.$hours_initial.'" AND activities.end_hours <= "'.$hours_end.'" AND activities.project_id = '.$project_id)) {
        		return TRUE;
        	}
        	else{
        		return FALSE;
        	}

        }

        private function delete_activity($project_id, $date, $time){

        	if ($time == 'M') {
        		$hours_initial = '01:00';
        		$hours_end = '12:00';
        	}
        	else{
        		$hours_initial = '12:00';
        		$hours_end = '23:59';
        	}

        	if ($this->Home->Activity->query('DELETE FROM activities WHERE activities.start_date = "'.$date.'" AND activities.start_hours >= "'.$hours_initial.'" AND activities.end_hours <= "'.$hours_end.'" AND activities.project_id = '.$project_id)) {
        		return TRUE;
        	}
        	else{
        		return FALSE;
        	}
        }
 
	public function AjaxListConsultants(){
		$this->layout = 'ajax';
		$this -> set ('consultants', $this->Home->Consultant->find('all', array('conditions'=> array('Consultant.removed !=' => 1),'order'=>array('Consultant.name'))));
		
	}
	
	public function AjaxListConsultantNome($name){
		$this->layout = 'ajax';
		$consultants = $this->Home->Consultant->query("SELECT * FROM consultants WHERE LOWER(name) like LOWER('%" . $name . "%')");
		$this-> set('consultants', $consultants);
	}
 }

?>