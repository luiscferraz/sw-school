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

        }
     		
 }
?>