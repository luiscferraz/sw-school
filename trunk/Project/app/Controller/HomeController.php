<?php
/*
 * Created on 24/12/2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class HomeController extends AppController{

        public function index () {
               $this->layout =  'main';
			   $this-> set ('tipo_usuario',$this->Auth->user('type'));			 		
				$this -> set ('projectsPais', $this-> Home -> Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.parent_project_id =' => null))));
				$this -> set ('projectsFilhos', $this-> Home -> Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.parent_project_id !=' => null))));
				$this -> set ('projectsNetos', $this-> Home -> Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.parent_project_id !=' => null))));
				if ($this -> request -> is('post')) {
					if (array_key_exists('date_submit', $_POST)) {
						$date =  $_POST['date_submit'];
						$this -> set('date_submit', $date);
					}
				}

				//Tuplas da posicao do consultor 1
				$consultor1PadraoId = $this->Home->Activity->query('select activities.project_id, activities.start_hours, activities.end_hours, activities.date, consultants.acronym, consultants.acronym_color from consultants, activities where activities.status = "Planejada" and activities.consultant1_id = consultants.id and activities.consultant1_id is not null');			
				$arrayConsultor1 = array();
				foreach ($consultor1PadraoId as $consultor1) {
							
					if ($consultor1['activities']['start_hours'] < '12:00:00'){
						$mt = 'M';
						$padraoID = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['date'].'.'.'1';
						$sigla = $consultor1['consultants']['acronym'];
						$cor = $consultor1['consultants']['acronym_color'];
						$arrayConsultor1[$padraoID]=array($sigla,$cor);							
					}
					if ($consultor1['activities']['end_hours'] > '12:00:00'){
						$mt = 'T';
						$padraoID = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['date'].'.'.'1';
						$sigla = $consultor1['consultants']['acronym'];
						$cor = $consultor1['consultants']['acronym_color'];
						$arrayConsultor1[$padraoID]=array($sigla,$cor);								
					}
				}
				$this -> set ('arrayConsultor1',$arrayConsultor1);
				
				//Tuplas da posicao do consultor 2
				$consultor2PadraoId = $this->Home->Activity->query('select activities.project_id, activities.start_hours, activities.end_hours, activities.date, consultants.acronym, consultants.acronym_color from consultants, activities where activities.status = "Planejada" and activities.consultant2_id = consultants.id and activities.consultant2_id is not null');			
				$arrayConsultor2 = array();				
				foreach ($consultor2PadraoId as $consultor2) {
							
					if ($consultor2['activities']['start_hours'] < '12:00:00'){
						$mt = 'M';
						$padraoID = $consultor2['activities']['project_id'].'.M.'.$consultor2['activities']['date'].'.'.'2';
						$sigla = $consultor2['consultants']['acronym'];
						$cor = $consultor2['consultants']['acronym_color'];
						$arrayConsultor2[$padraoID]=array($sigla,$cor);						
					}
					if ($consultor2['activities']['end_hours'] > '12:00:00'){
						$mt = 'T';
						$padraoID = $consultor2['activities']['project_id'].'.T.'.$consultor2['activities']['date'].'.'.'2';
						$sigla = $consultor2['consultants']['acronym'];
						$cor = $consultor2['consultants']['acronym_color'];
						$arrayConsultor2[$padraoID]=array($sigla,$cor);							
					}
				}
				$this -> set ('arrayConsultor2',$arrayConsultor2);
				
				//Tuplas da posicao do consultor 3
				$consultor3PadraoId = $this->Home->Activity->query('select activities.project_id, activities.start_hours, activities.end_hours, activities.date, consultants.acronym, consultants.acronym_color from consultants, activities where activities.status = "Planejada" and activities.consultant3_id = consultants.id and activities.consultant3_id is not null');			
				$arrayConsultor3 = array();
				foreach ($consultor3PadraoId as $consultor3) {
							
					if ($consultor3['activities']['start_hours'] < '12:00:00'){
						$mt = 'M';
						$padraoID = $consultor3['activities']['project_id'].'.M.'.$consultor3['activities']['date'].'.'.'3';
						$sigla = $consultor3['consultants']['acronym'];
						$cor = $consultor3['consultants']['acronym_color'];
						$arrayConsultor3[$padraoID]=array($sigla,$cor);						
					}
					if ($consultor3['activities']['end_hours'] > '12:00:00'){
						$mt = 'T';
						$padraoID = $consultor3['activities']['project_id'].'.T.'.$consultor3['activities']['date'].'.'.'3';
						$sigla = $consultor3['consultants']['acronym'];
						$cor = $consultor3['consultants']['acronym_color'];
						$arrayConsultor3[$padraoID]=array($sigla,$cor);							
					}
				}
				$this -> set ('arrayConsultor3',$arrayConsultor3);
				
				//Tuplas da posicao do consultor 4
				$consultor4PadraoId = $this->Home->Activity->query('select activities.project_id, activities.start_hours, activities.end_hours, activities.date, consultants.acronym, consultants.acronym_color from consultants, activities where activities.status = "Planejada" and activities.consultant4_id = consultants.id and activities.consultant4_id is not null');			
				$arrayConsultor4 = array();
				foreach ($consultor4PadraoId as $consultor4) {
							
					if ($consultor4['activities']['start_hours'] < '12:00:00'){
						$mt = 'M';
						$padraoID = $consultor4['activities']['project_id'].'.M.'.$consultor4['activities']['date'].'.'.'4';
						$sigla = $consultor4['consultants']['acronym'];
						$cor = $consultor4['consultants']['acronym_color'];
						$arrayConsultor4[$padraoID]=array($sigla,$cor);						
					}
					if ($consultor4['activities']['end_hours'] > '12:00:00'){
						$mt = 'T';
						$padraoID = $consultor4['activities']['project_id'].'.T.'.$consultor4['activities']['date'].'.'.'4';
						$sigla = $consultor4['consultants']['acronym'];
						$cor = $consultor4['consultants']['acronym_color'];
						$arrayConsultor4[$padraoID]=array($sigla,$cor);								
					}
				}
				$this -> set ('arrayConsultor4',$arrayConsultor4);
				
        }
     		
 }
?>