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
			

				function buscar_atividade($string) {
					$stringFatiada = explode('.' , $string);
					$id_projeto = $stringFatiada[0];
					$turno = $stringFatiada[1];
					$data = $stringFatiada[2];
					$consultor = $stringFatiada[3];
					return $consultor;
				}
								
				
				//function buscar_cor($string){
				//	$sigla_consultor = buscar_atividade($string);
				//	$consultor_encontrado = $this -> Consultant->findByAcronym($sigla_consultor);	
				//	$cor_consultor = $consultor_encontrado['Consultant']['Acronym_Color'];								
				//	return $cor_consultor;
				//}
				
				
        }
     		
 }
?>