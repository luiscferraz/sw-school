<?php
/*
 * Created on 24/12/2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class ConsultantsController extends AppController {
 	public $helpers = array ('html','form');
 	public $name = 'Consultants';
 	var $scaffold;
 	
 	
 	
 	public function index(){
 		$this->set('title_for_layout', 'Consultores');
 		$this -> layout = 'index';
 		$this -> set ('consultants', $this-> Consultant->find('all', array('conditions'=> array('Consultant.removed !=' => 1),'order'=>array('Consultant.name'))));
		$this-> set ('tipo_usuario',$this->Auth->user('type'));		
 	}
 	
 	public function view($id = null){
 		 $this -> layout = 'base';
		 $this-> set ('tipo_usuario',$this->Auth->user('type'));	
 		 if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
 		$consultant =  $this->Consultant->findById($id);
 		 if (!$consultant) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this ->set('projects', $this->Consultant->ProjectConsultant->query('SELECT projects.id, projects.name, projects.description, projects.acronym FROM projects, project_consultants WHERE project_consultants.consultant_id = ' .$id. ' AND project_consultants.project_id = projects.id AND projects.removed != 1'));
        $this ->set('consultant',$consultant);
 	}
 	
 	public function add()
   {
   	 $this -> layout = 'base';
      if($this->request->is('post'))
      {
         if($this->Consultant->saveAll($this->request->data))
         {
           $this->Session->setFlash($this->flashSuccess('O usuário foi adicionado.'));
           $this->redirect(array('action' => 'index'));
         } 
      }
   }
   public function edit($id = NULL)
   {
		$this->layout = 'base';
		$this->Consultant->id = $id;
		if (!$id) {
        	throw new NotFoundException(__('Invalid post'));
	    }
	
	    $consult = $this->Consultant->findById($id);
	    if (!$consult) {
	        throw new NotFoundException(__('Invalid post'));
	    }
		if ($this->request->is('get')) {
			$this->request->data = $this->Consultant->read();
		} 
		else {
			$this->Consultant->id = $id;
			if ($this->Consultant->saveAll($this->request->data)) {
				
				$this->Session->setFlash($this->flashSuccess('Consultor foi editado.'));
				$this->redirect(array('action' => 'index'));
			}
		}
   }
   public function delete($id = NULL)
   {
		$this->Consultant->id = $id;
		if($this->Consultant->saveField("removed", "true")){
			$this->Session->setFlash($this->flashSuccess('O consultor foi deletado!'));
			$this->redirect(array('action' => 'index'));
		}
   }



   public function ReportPayment(){
      $this -> layout = 'base';
      if ($this-> request-> is('POST')) {
        echo 'erick';
      }
      else {
        $this -> set ( 'consultants' ,$this-> Consultant -> find('all'));
      }
   }



   
   //Chamada ajax
   public function ajaxMsg($obj=null){
   		$this->layout='ajax';
   		//Fazer verificação do obj de entrada enviado, ser for :
   		//uma abreviação sera 2 digitos;
   		//uma abreviação de cor sera 6 digitos;
   		//um cpf sera 14 digitos, isso por causa da mascara    	   		
   		if(strlen($obj) == 2 ) {
   			//Esse "findBy" acompanhado do nome do campo da tabela faz um seletec, com um where nele.
   			if($this->Consultant->findByAcronym($obj)){
   			$this->set('mensagem', 'true');}
   			else{
   			$this->set('mensagem','false');
   		}
   		}
   		else if(strlen($obj) == 6){
   			$obj = '#'.$obj;
   			if ($this->Consultant->findByAcronym_color($obj))
   			{
   			$this->set('mensagem', 'true');
   			}
   			else{
   			$this->set('mensagem','false');
   			}
   		}
   		else if(strlen($obj) == 14){
   			if($this->Consultant->findByCpf($obj)){
   			$this->set('mensagem','true');}
   			else{
   			$this->set('mensagem','false');
   		}
   		}	
   		else{
   			$this->set('mensagem','true');
   		}
   }
 	
 }
?>
