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
			   $this-> set ('projects',$this->Home->Project->find('all', array('conditions'=> array('Project.removed !=' => 1))));
        }
     
		public function atividades_agenda($id_projeto) {
			$this->layout = 'atividades_agenda';
			//procura a primeira atividade que achar para o projeto escolhido
			$activities = $this->Home->Activity->find('all',array('conditions'=> array('Activity.removed !=' => 1, 'Activity.project_id =' => $id_projeto)));						
			//cria uma lista que vai conter tuplas, Ex: (descricao:escola,data:01-01-2000,horas:9)
			$atividade = array(); 
			
			foreach ($activities as $activity){
				$atividade[] = $activity['Activity']['id'];	
			}
			//retorna os ids de todas as atividades de determinado projeto
			//print_r ($atividade);
			echo json_encode($atividade);
		}
			
		public function mostrar_atividade($id_atividade){
			$this->layout = 'atividades_agenda';
			$atividade = array();
			$activity = $this->Home->Activity->find('first',array('conditions'=> array('Activity.removed !=' => 1, 'Activity.id =' => $id_atividade)));						
			
			//definindo uma tupla descricao dentro do array ativdade para ser a descricao da primeira atividade que ele encontrou
			$atividade['descricao'] = $activity['Activity']['description'];
			$atividade['data'] = $activity['Activity']['date'];
			$atividade['hora_inicio'] = $activity['Activity']['start_hours'];
			$atividade['hora_final'] = $activity['Activity']['end_hours'];
			
			
			//retorna o array para o ajax
			echo json_encode($atividade);
		}		
 }
?>